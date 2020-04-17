<?php

namespace App\Http\Controllers;

use App\configuracion\Nivel;
use App\configuracion\Area;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarNivelRequest;

class nivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nivel.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionNivel  $configuracionNivel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->data == 1){
            $find = Nivel::where('id_are','=',$request->nivel)->get();
            return $find->toJson();
        }else{
            $find = Nivel::join('areas','areas.id_are','=','niveles.id_are')
                     ->where('niveles.nivel','like','%'.$request->nivel.'%')
                     ->get();

            if(!is_null($find)){
                return view('nivel.buscar')->with('find', $find)
                                                ->with('estado', '1')
                                                ->with('mensaje', '');
            }else{
                return view('nivel.buscar')->with('find', $find)
                                                ->with('estado', '0')
                                                ->with('mensaje', 'No se tiene resultado para la busqueda: '.$request->nivel);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::where('estado','=',true)->get();

        return view('nivel.nuevo')->with('area', $area);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarNivelRequest $request)
    {
        $find = new Nivel;

        $find->id_are = $request->id_are;
        $find->nivel = $request->nivel;
        $find->horas = $request->horas;
        $find->tiempo = $request->tiempo;
        $find->salario = $request->salario;
        $find->literal = $request->literal;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('nivel.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionNivel  $configuracionNivel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::where('estado','=',true)->get();
        $find = Nivel::find($id);
        
        if(!is_null($find)){
            return view('nivel.editar')->with('find', $find)
                                       ->with('area', $area)
                                       ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('nivel.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionNivel  $configuracionNivel
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarNivelRequest $request)
    {
        $find = Nivel::find($request->id_niv);

        if(!is_null($find)){
            $find->id_are = $request->id_are;
            $find->nivel = $request->nivel;
            $find->horas = $request->horas;
            $find->tiempo = $request->tiempo;
            $find->salario = $request->salario;
            $find->literal = $request->literal;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->danger('No se encontro el registro a Modificar.');
        }

        return view('nivel.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionNivel  $configuracionNivel
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Nivel::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('nivel.confirma')->with('id', $find->id_niv);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionNivel  $configuracionNivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Nivel::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('nivel.buscar');
    }
}
