<?php

namespace App\Http\Controllers;

use App\requerimiento\Impresion_contrato;
use App\configuracion\Config_contrato;
use App\requerimiento\DatoPersonal;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarImpresionContratoRequest;

class ImpresionContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\requerimiento\Impresion_contrato  $impresion_contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Impresion_contrato $impresion_contrato)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $imp = Impresion_contrato::where('id_req','=',$id)->get();

        if(count($imp) > 0){
            return view('imp_contratos.editar')->with('id',$id)
                                          ->with('contrato', $this->reemplazo($id))
                                          ->with('imp', $imp[0]);
        }else{
            return view('imp_contratos.nuevo')->with('id',$id)
                                          ->with('contrato', $this->reemplazo($id));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarImpresionContratoRequest $request)
    {
        $find = new Impresion_contrato;

        $find->id_req = $request->id_req;
        $find->correlativo = $this->correlativo();
        $find->contrato = $request->plantilla_contrato;
        $find->firma1 = $request->firma1;
        $find->cargo1 = $request->cargo1;
        $find->firma2 = $request->firma2;
        $find->cargo2 = $request->cargo2;
        $find->firma3 = $request->firma3;
        $find->cargo3 = $request->cargo3;
        $find->modifica= true;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('imp_contratos.nuevo')->with('id',$request->id_req)
                                          ->with('contrato', $this->reemplazo($request->id_req));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\requerimiento\Impresion_contrato  $impresion_contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Impresion_contrato $impresion_contrato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\requerimiento\Impresion_contrato  $impresion_contrato
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarImpresionContratoRequest $request)
    {
        $find = Impresion_contrato::find($request->id_imp);

        /* $find->id_req = $request->id_req; */
        /* $find->correlativo = $this->correlativo(); */
        $find->contrato = $request->plantilla_contrato;
        $find->firma1 = $request->firma1;
        $find->cargo1 = $request->cargo1;
        $find->firma2 = $request->firma2;
        $find->cargo2 = $request->cargo2;
        $find->firma3 = $request->firma3;
        $find->cargo3 = $request->cargo3;
        $find->modifica= true;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        $imp = Impresion_contrato::where('id_req','=',$request->id_req)->get();

        return view('imp_contratos.editar')->with('id',$request->id_req)
                                           ->with('contrato', $this->reemplazo($request->id_req))
                                           ->with('imp', $imp[0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\requerimiento\Impresion_contrato  $impresion_contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impresion_contrato $impresion_contrato)
    {
        //
    }

    private function reemplazo($id) {
        $imp = Impresion_contrato::where('id_req','=',$id)->get();
        $contrato = Config_contrato::where('estado','=',true)->select('plantilla_contrato')->get();
        $trabajador = DatoPersonal::join('departamentos','departamentos.id_dep','=','datos_personales.id_dep')
                                  ->join('estado_civil','estado_civil.id_est','=','datos_personales.id_est')
                                  ->join('requerimientos','requerimientos.id_per','=','datos_personales.id_per')
                                  ->join('cargos','cargos.id_car','=','requerimientos.id_car')
                                  ->join('centro_salud','centro_salud.id_cen','=','requerimientos.id_cen')
                                  ->join('niveles','niveles.id_niv','=','requerimientos.id_niv')
                                  ->join('contratos','contratos.id_con','=','requerimientos.id_con')
                                  ->select(
                                            \DB::raw('concat(datos_personales.nombre," ",datos_personales.paterno," ",datos_personales.materno) as nombre'),
                                            \DB::raw('concat(datos_personales.ci,"-",departamentos.sigla) as ci'),
                                            'datos_personales.domicilio',
                                            'datos_personales.matricula',
                                            'cargos.cargo',
                                            'centro_salud.nombre as centro',
                                            'niveles.salario',
                                            'niveles.literal',
                                            'niveles.nivel',
                                            'contratos.contrato',
                                            'requerimientos.nota_requerimiento',
                                            'requerimientos.fecha_nota_requerimiento'
                                        )
                                  ->where('requerimientos.id_req','=',$id)
                                  ->get();
        
        $otro = str_replace("Trabajador-nombre",$trabajador[0]->nombre,$contrato[0]->plantilla_contrato);
        $otro = str_replace("Trabajador-ci",$trabajador[0]->ci,$otro);
        $otro = str_replace("Trabajador-domicilio",$trabajador[0]->domicilio,$otro);
        $otro = str_replace("Trabajador-matricula",$trabajador[0]->matricula,$otro);
        $otro = str_replace("Trabajador-cargo",$trabajador[0]->cargo,$otro);
        $otro = str_replace("Trabajador-centro",$trabajador[0]->centro,$otro);
        $otro = str_replace("Trabajador-sueldo",$trabajador[0]->salario,$otro);
        $otro = str_replace("Trabajador-literal",$trabajador[0]->literal,$otro);
        $otro = str_replace("Trabajador-nivel",$trabajador[0]->nivel,$otro);
        $otro = str_replace("Trabajador-tipo",$trabajador[0]->contrato,$otro);
        $otro = str_replace("Trabajador-nota-requerimiento",$trabajador[0]->nota_requerimiento,$otro);
        $otro = str_replace("Trabajador-fecha-nota-requerimiento",$trabajador[0]->fecha_nota_requerimiento,$otro);
        
        if(count($imp)>0){
            $otro = str_replace("Firma-1",$imp[0]->firma1,$otro);
            $otro = str_replace("Cargo-1",$imp[0]->cargo1,$otro);
            $otro = str_replace("Firma-2",$imp[0]->firma2,$otro);
            $otro = str_replace("Cargo-2",$imp[0]->cargo2,$otro);
            $otro = str_replace("Firma-3",$imp[0]->firma3,$otro);
            $otro = str_replace("Cargo-3",$imp[0]->cargo3,$otro);
        }
        return $otro;
    }

    private function correlativo() {
        $con = Config_contrato::where('estado','=',true)->get();
        $suma = $con[0]->correlativo + 1;
        
        $con1 = Config_contrato::where('estado','=',true)->update(['correlativo' => $suma]);

        return $con[0]->inicial.'-'.$suma.'/'.substr($con[0]->gestion,-2);
    }
}
