<?php

namespace App\Http\Controllers;

use App\configuracion\Area;
use App\configuracion\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarAreaRequest;

class areaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('area.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionArea  $configuracionArea
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Area::where('tipo', 'like', '%'.$request->area.'%')->get();

        if(!is_null($find)){
            return view('area.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('area.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->area);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarAreaRequest $request)
    {
        $find = new Area;

        $find->tipo = $request->tipo;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('area.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionArea  $configuracionArea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Area::find($id);
        
        if(!is_null($find)){
            return view('area.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('area.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionEstadocivil  $configuracionEstadocivil
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarAreaRequest $request)
    {
        $find = Area::find($request->id_are);

        if(!is_null($find)){
            $find->tipo = $request->tipo;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('area.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionArea  $configuracionArea
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Area::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('area.confirma')->with('id', $find->id_are);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionArea  $configuracionArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Area::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('area.buscar');
    }
}
