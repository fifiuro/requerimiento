<?php

namespace App\Http\Controllers;

use App\requerimiento\Paso;
use App\requerimiento\Requerimiento;
use App\requerimiento\DatoPersonal;
use App\configuracion\CentroSalud;
use App\configuracion\Cargo;
use App\configuracion\Nivel;

use Illuminate\Http\Request;
use App\Http\Requests\ValidarPasoRequest;

class pasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:paso-edit|paso-delete', ['only' => ['index','store']]);
         $this->middleware('permission:paso-create', ['only' => ['create','store']]);
         $this->middleware('permission:paso-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:paso-delete', ['only' => ['destroy','confirm']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index()
    {
        return view('paso.buscar');
    } */

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionPaso  $configuracionPaso
     * @return \Illuminate\Http\Response
     */
    /* public function show(Request $request)
    {
        
        $find = Paso::where('contrato', 'like', '%'.$request->contrato.'%')->get();

        if(!is_null($find)){
            return view('contrato.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('contrato.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->contrato);
        }
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $paso = Paso::where('id_req','=',$id)->get();
        
        $e = array();
        $cerrar;
        foreach($paso as $p){
            array_push($e,$p->estado);
            $cerrar = $p->permite;
        }

        $req = Requerimiento::join('datos_personales','datos_personales.id_per','=','requerimientos.id_per')
                            ->join('centro_salud','centro_salud.id_cen','=','requerimientos.id_cen')
                            ->join('cargos','cargos.id_car','=','requerimientos.id_car')
                            ->join('niveles','niveles.id_niv','=','requerimientos.id_niv')
                            ->join('departamentos','departamentos.id_dep','=','datos_personales.id_dep')
                            ->join('contratos','contratos.id_con','=','requerimientos.id_con')
                            ->select('requerimientos.id_req', 'datos_personales.nombre', 'datos_personales.paterno', 'datos_personales.materno', 'datos_personales.ci', 'departamentos.sigla as departamento', 'datos_personales.matricula', 'cargos.cargo', 'niveles.nivel', 'niveles.horas', 'niveles.tiempo', 'niveles.salario','centro_salud.nombre as centro_salud','contratos.contrato')
                            ->where('requerimientos.id_req','=',$id)
                            ->get();
        
        return view('paso.nuevo')->with('req',$req[0])
                                 ->with('paso',$paso)
                                 ->with('e', $e)
                                 ->with('cerrar',$cerrar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarPasoRequest $request)
    {
        $find = new Paso;

        $find->id_req = $request->id_req;
        $find->estado = $request->estado;
        $find->id_usr = \Auth::user()->id;
        $find->fecha = date("Y-m-d");
        $find->hora = date("H:i:s");
        $find->observaciones = $request->observaciones;
        $find->permite = true;
        $find->llave = true;

        $find->save();

        if($request->estado == 5){
            $find = Paso::where('id_req','=',$request->id_req)
                        ->update(['permite' => 0]);
        }

        $find = Paso::where('id_req','=',$request->id_req)
                    ->where('estado','!=',$request->estado)
                    ->update(['llave' => 0]);

        \toastr()->success('Se agrego correctamente el registro.');

        return \redirect('pasos/nuevo/'.$request->id_req);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\requerimientoPaso  $configuracionPaso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Paso::find($id);
        
        if(!is_null($find)){
            return view('paso.editar')->with('find', $find)
                                          ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('contrato.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\requerimientoPaso  $configuracionPaso
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarPasoRequest $request)
    {
        $find = Paso::find($request->id_pas);

        if(!is_null($find)){
            $find->estado = $request->estado;
            $find->id_usr = \Auth::user()->id;
            $find->fecha = date("Y-m-d");
            $find->hora = date("H:i:s");
            $find->observaciones = $request->observaciones;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return \redirect('pasos/nuevo/'.$find->id_req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\requerimientoPaso  $configuracionPaso
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Paso::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('paso.confirma')->with('id', $find->id_pas)
                                    ->with('id_req', $find->id_req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\requerimientoPaso  $configuracionPaso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Paso::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return \redirect('pasos/nuevo/'.$find->id_req);
    }
}
