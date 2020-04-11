<?php

namespace App\Http\Controllers;

use App\configuracion\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarDepartamentoRequest;

class departamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departamento.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionDepartamento  $configuracionDepartamento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Departamento::where('departamento', 'like', '%'.$request->departamento.'%')->get();
        return view('departamento.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarDepartamentoRequest $request)
    {
        $departamento = new Departamento;

        $departamento->departamento = $request->departamento;
        $departamento->sigla = $request->sigla;
        $departamento->estado = $request->estado;

        $departamento->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('departamento.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionDepartamento  $configuracionDepartamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Departamento::find($id);

        if(!is_null($find)){
            return view('departamento.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            return view('departamento.editar')->with('find', '')
                                              ->with('mensaje', 'No se encontro el registro a modificar.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionDepartamento  $configuracionDepartamento
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarDepartamentoRequest $request)
    {
        $find = Departamento::find($request->id_dep);

        $find->departamento = $request->departamento;
        $find->sigla = $request->sigla;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se modificó correctamente el registro.');

        return view('departamento.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDepartamento  $configuracionDepartamento
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $departamento = Departamento::find($id);

        return view('departamento.confirma')->with('id', $departamento->id_dep);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDepartamento  $configuracionDepartamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $departamento = Departamento::find($request->id);

        $departamento->delete();

        \toastr()->error('Se Eliminó correctamente el registro.');

        return view('departamento.buscar');
    }
}
