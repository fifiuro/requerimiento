<?php

namespace App\Http\Controllers;

use App\configuracion\Contrato;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarContratoRequest;

class contratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contrato.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionContrato  $configuracionContrato
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Contrato::where('contrato', 'like', '%'.$request->contrato.'%')->get();

        if(!is_null($find)){
            return view('contrato.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('contrato.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->contrato);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contrato.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarContratoRequest $request)
    {
        $find = new Contrato;

        $find->contrato = $request->contrato;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('contrato.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionContrato  $configuracionContrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Contrato::find($id);
        
        if(!is_null($find)){
            return view('contrato.editar')->with('find', $find)
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
     * @param  \App\configuracionContrato  $configuracionContrato
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarContratoRequest $request)
    {
        $find = Contrato::find($request->id_con);

        if(!is_null($find)){
            $find->contrato = $request->contrato;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('contrato.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionContrato  $configuracionContrato
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Contrato::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('contrato.confirma')->with('id', $find->id_con);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionContrato  $configuracionContrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Contrato::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('contrato.buscar');
    }
}
