<?php

namespace App\Http\Controllers;

use App\configuracion\Afp;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarAfpRequest;

class afpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afp.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionAfp  $configuracionAfp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Afp::where('nombre', 'like', '%'.$request->nombre.'%')->get();

        if(!is_null($find)){
            return view('afp.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('afp.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->nombre);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('afp.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarAfpRequest $request)
    {
        $find = new Afp;

        $find->nombre = $request->nombre;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('afp.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionAfp  $configuracionAfp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Afp::find($id);

        if(!is_null($find)){
            return view('afp.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('afp.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionAfp  $configuracionAfp
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarAfpRequest $request)
    {
        $find = Afp::find($request->id_afp);

        if(!is_null($find)){
            $find->nombre = $request->nombre;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('afp.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionAfp  $configuracionAfp
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Afp::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('afp.confirma')->with('id', $find->id_afp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionAfp  $configuracionAfp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Afp::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('afp.buscar');
    }
}
