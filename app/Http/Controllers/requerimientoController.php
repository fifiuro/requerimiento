<?php

namespace App\Http\Controllers;

use App\requerimiento\Requerimiento;
use App\configuracion\Centrosalud;
use App\configuracion\Contrato;
use App\configuracion\Area;
use App\configuracion\Documento;
use App\configuracion\Cargo;
use App\configuracion\Nivel;
use App\requerimiento\Requisito;
use App\requerimiento\Paso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarRequrimientoRequest;

class requerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        
        return view('requerimiento.buscar')->with('centro',$centro);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        $find = Requerimiento::join('datos_personales','datos_personales.id_per','=','requerimientos.id_per')
                             ->join('centro_salud','centro_salud.id_cen','=','requerimientos.id_cen')
                             ->join('pasos','pasos.id_req','=','requerimientos.id_req')
                             ->where('pasos.estado','=',$request->estado.'%')
                             ->whereOr('datos_personales','like','%'.$request->ci.'%')
                             ->where('centro_salud.id_cen','=',$request->centro)
                             ->select('requerimientos.id_req',
                                      'centro_salud.nombre as centro',
                                      'datos_personales.nombre',
                                      'datos_personales.paterno',
                                      'datos_personales.materno',
                                      'pasos.estado',
                                      'nota_requerimiento')
                             ->get();
        if(!is_null($find)){
            return view('requerimiento.buscar')->with('find', $find)
                                               ->with('centro', $centro)
                                               ->with('estado', '1')
                                               ->with('mensaje', '');
        }else{
            return view('requerimiento.buscar')->with('find', $find)
                                               ->with('centro', $centro)
                                               ->with('estado', '0')
                                               ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->cargo);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centro = Centrosalud::where('estado','=',true)->get();
        $contrato = Contrato::where('estado','=',true)->get();
        $area = Area::where('estado','=',true)->get();
        $documento = Documento::where('estado', '=', true)->get();

        return view('requerimiento.nuevo')->with('centro',$centro)
                                          ->with('contrato',$contrato)
                                          ->with('area',$area)
                                          ->with('documento',$documento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarRequrimientoRequest $request)
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        $find = new Requerimiento;

        $find->id_per = $request->id_per;
        $find->id_cen = $request->id_cen;
        $find->id_con = $request->id_con;
        $find->id_car = $request->id_car;
        $find->id_niv = $request->id_niv;
        $find->motivo = $request->motivo;
        $find->fecha_inicio = $request->fecha_inicio;
        $find->fecha_fin = $request->fecha_fin;
        $find->nota_requerimiento = $request->nota_requerimiento;
        $find->fecha_nota_requerimiento = $request->fecha_nota_requerimiento;
        $find->observaciones = $request->observaciones;
        $find->estado = true;

        $find->save();
        // RECUPERANDO EL ID DEL ULTIMO REGISTRO GUARDADO
        $id = $find->id_req;
        // GUARDANDO REQUISITOS
        $doc = $request->documento;
        asort($doc);
        $requi = new Requisito;

        $requi->id_req = $id;
        $requi->documento = implode("-",$doc);
        $requi->estado = true;

        $requi->save();

        $paso = new Paso;

        $paso->id_req = $id;
        $paso->estado = 7;
        $paso->id_usr = \Auth::user()->id;
        $paso->fecha = date("Y-m-d");
        $paso->hora = date("H:i:s");
        $paso->observaciones = "Nuevo Requerimiento";
        $paso->save();

        \toastr()->success('Se agrego correctamente el registro.');
        
        return view('requerimiento.buscar')->with('centro',$centro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Requerimiento::join('cargos','cargos.id_car','=','requerimientos.id_car')
                             ->join('datos_personales','datos_personales.id_per','=','requerimientos.id_per')
                             ->where('requerimientos.id_req','=',$id)
                             ->get();
        $centro = Centrosalud::where('estado','=',true)->get();
        $contrato = Contrato::where('estado','=',true)->get();
        $area = Area::where('estado','=',true)->get();
        $cargo = Cargo::where('id_are','=',$find[0]->id_are)->get();
        $nivel = Nivel::where('id_are','=',$find[0]->id_are)->get();
        $documento = Documento::where('estado', '=', true)->get();
        $requisito = Requisito::where('id_req','=',$id)
                              ->select('documento')
                              ->get();
        
        $date1 = date('d/m/Y',strtotime($find[0]->fecha_inicio));
        $find[0]->fecha_inicio1 = $date1;

        $date2 = date('d/m/Y',strtotime($find[0]->fecha_fin));
        $find[0]->fecha_fin1 = $date2;

        if(count($requisito) > 0) {
            $req = explode('-',$requisito[0]->documento);
        }else{
            $req = [];
        }

        if(!is_null($find)){
            return view('requerimiento.editar')->with('find',$find[0])
                                               ->with('centro',$centro)
                                               ->with('contrato',$contrato)
                                               ->with('area',$area)
                                               ->with('cargo',$cargo)
                                               ->with('nivel',$nivel)
                                               ->with('documento',$documento)
                                               ->with('requisito',$req);
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('requerimiento.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarRequrimientoRequest $request)
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        $find = Requerimiento::find($request->id_req);

        if(!is_null($find)){
            $find->id_per = $request->id_per;
            $find->id_cen = $request->id_cen;
            $find->id_con = $request->id_con;
            $find->id_car = $request->id_car;
            $find->id_niv = $request->id_niv;
            $find->motivo = $request->motivo;
            $find->fecha_inicio = $request->fecha_inicio;
            $find->fecha_fin = $request->fecha_fin;
            $find->nota_requerimiento = $request->nota_requerimiento;
            $find->fecha_nota_requerimiento = $request->fecha_nota_requerimiento;
            $find->observaciones = $request->observaciones;
            $find->estado = $request->estado;

            $find->save();
            // GUARDANDO REQUISITOS
            $doc = $request->documento;
            asort($doc);
            $requi = Requisito::where('id_req','=',$request->id_req)
                              ->update(['documento'=>implode("-",$doc)]);

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }
        
        return view('requerimiento.buscar')->with('centro',$centro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        $find = Requerimiento::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('requerimiento.confirma')->with('id', $find->id_req);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $centro = CentroSalud::where('estado','=',true)->get();
        $find = Requerimiento::find($request->id);

        if(!is_null($find)){
            $requi = Requisito::where('id_req','=',$request->id)->delete();
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }
        
        return view('requerimiento.buscar')->with('centro',$centro);
    }
}
