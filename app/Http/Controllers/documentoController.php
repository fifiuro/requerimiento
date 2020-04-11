<?php

namespace App\Http\Controllers;

use App\configuracion\Documento;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarDocumentoRequest;

class documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documento.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionDocumento  $configuracionDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Documento::where('documento', 'like', '%'.$request->documento.'%')->get();

        if(!is_null($find)){
            return view('documento.buscar')->with('find', $find)
                                            ->with('estado', '1')
                                            ->with('mensaje', '');
        }else{
            return view('documento.buscar')->with('find', $find)
                                            ->with('estado', '0')
                                            ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->documento);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documento.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarDocumentoRequest $request)
    {
        $find = new Documento;

        $find->documento = $request->documento;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('documento.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionDocumento  $configuracionDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Documento::find($id);
        
        if(!is_null($find)){
            return view('documento.editar')->with('find', $find)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('documento.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionDocumento  $configuracionDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarDocumentoRequest $request)
    {
        $find = Documento::find($request->id_doc);

        if(!is_null($find)){
            $find->documento = $request->documento;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('documento.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDocumento  $configuracionDocumento
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Documento::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('documento.confirma')->with('id', $find->id_doc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDocumento  $configuracionDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Documento::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('documento.buscar');
    }
}
