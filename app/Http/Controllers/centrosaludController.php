<?php

namespace App\Http\Controllers;

use App\configuracion\Centrosalud;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarCentroSaludRequest;

class centrosaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('centrosalud.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionCentrosalud  $configuracionCentroSalud
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Centrosalud::where('nombre', 'like', '%'.$request->nombre.'%')->get();

        if(!is_null($find)){
            return view('centrosalud.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('centrosalud.buscar')->with('find', $find)
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
        return view('centrosalud.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarCentroSaludRequest $request)
    {
        $find = new Centrosalud;

        $find->codigo = $request->codigo;
        $find->nombre = $request->nombre;
        $find->direccion = $request->direccion;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('centrosalud.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionCentrosalud  $configuracionCentrosalud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Centrosalud::find($id);
        
        if(!is_null($find)){
            return view('centrosalud.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('centrosalud.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionCentrosalud  $configuracionCentrosalud
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarCentroSaludRequest $request)
    {
        $find = Centrosalud::find($request->id_cen);

        if(!is_null($find)){
            $find->codigo = $request->codigo;
            $find->nombre = $request->nombre;
            $find->direccion = $request->direccion;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('centrosalud.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionCentrosalud  $configuracionCentrosalud
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Centrosalud::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('centrosalud.confirma')->with('id', $find->id_cen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionCentrosalud  $configuracionCentrosalud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Centrosalud::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('centrosalud.buscar');
    }
}
