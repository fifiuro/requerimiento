<?php

namespace App\Http\Controllers;

use App\configuracion\Config_contrato;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarConfigContratoRequest;

class ConfigContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('config_contrato.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracion\Config_contrato  $config_contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Config_contrato::where('gestion','like','%'.$request->gestion.'%')->get();

        if(!is_null($find)){
            return view('config_contrato.buscar')->with('find', $find)
                                                 ->with('estado', '1')
                                                 ->with('mensaje', '');
        }else{
            return view('config_contrato.buscar')->with('find', $find)
                                                 ->with('estado', '0')
                                                 ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->gestion);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config_contrato.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarConfigContratoRequest $request)
    {
        $find = new Config_contrato;

        $find->inicial = $request->inicial;
        $find->correlativo = $request->correlativo;
        $find->gestion = $request->gestion;
        $find->plantilla_contrato = $request->plantilla_contrato;
        $find->estado = true;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('config_contrato.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracion\Config_contrato  $config_contrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Config_contrato::find($id);
        
        if(!is_null($find)){
            return view('config_contrato.editar')->with('find', $find)
                                                 ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('config_contrato.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracion\Config_contrato  $config_contrato
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarConfigContratoRequest $request)
    {
        $find = Config_contrato::find($request->id_conf);

        if(!is_null($find)){
            $find->inicial = $request->inicial;
        $find->correlativo = $request->correlativo;
        $find->gestion = $request->gestion;
        $find->plantilla_contrato = $request->plantilla_contrato;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('config_contrato.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracion\Config_contrato  $config_contrato
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Config_contrato::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('config_contrato.confirma')->with('id', $find->id_conf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracion\Config_contrato  $config_contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Config_contrato::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('config_contrato.buscar');
    }
}
