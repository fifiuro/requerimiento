<?php

namespace App\Http\Controllers;

use App\configuracion\Estadocivil;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarEstadoCivilRequest;

class estadocivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estadocivil.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Estadocivil::where('estado_civil', 'like', '%'.$request->estadocivil.'%')->get();

        if(!is_null($find)){
            return view('estadocivil.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('estadocivil.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->estadocivil);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadocivil.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarEstadoCivilRequest $request)
    {
        $find = new Estadocivil;

        $find->estado_civil = $request->estadocivil;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('estadocivil.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Estadocivil::find($id);
        //dd($find);
        if(!is_null($find)){
            return view('estadocivil.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('estadocivil.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarEstadoCivilRequest $request)
    {
        $find = Estadocivil::find($request->id_est);

        if(!is_null($find)){
            $find->estado_civil = $request->estadocivil;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        

        return view('estadocivil.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Estadocivil::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('estadocivil.confirma')->with('id', $find->id_est);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Estadocivil::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('estadocivil.buscar');
    }
}
