<?php

namespace App\Http\Controllers;

use App\configuracion\Cargo;
use App\configuracion\Area;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarCargoRequest;

class cargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $area = Area::find($id);
        $find = Cargo::where('id_are','=',$id)->get();

        //dd(count($find));

        if(count($find) > 0){
            return view('cargo.buscar')->with('titulo',$area->tipo)
                                       ->with('find', $find)
                                       ->with('id', $id)
                                       ->with('estado', '1')
                                       ->with('mensaje', '');
        }else{
            return view('cargo.buscar')->with('titulo',$area->tipo)
                                       ->with('find', $find)
                                       ->with('id', $id)
                                       ->with('estado', '0')
                                       ->with('mensaje', 'No se tiene Cargos asignados al área: '.$area->tipo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Cargo::where('id_are','=',$request->cargo)->get();

        if(!is_null($find)){
            return $find->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $area = Area::find($id);

        return view('cargo.nuevo')->with('area', $area->tipo)
                                  ->with('id', $area->id_are);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarCargoRequest $request)
    {
        $find = new Cargo;

        $find->id_are = $request->id_are;
        $find->cargo = $request->cargo;
        $find->estado = $request->estado;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return redirect('cargo/buscar/'.$request->id_are);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $ie)
    {
        $area = Area::find($ie);
        $find = Cargo::find($id);
        
        if(!is_null($find)){
            return view('cargo.editar')->with('find', $find)
                                       ->with('area', $area->tipo)
                                       ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('cargo.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarCargoRequest $request)
    {
        $find = Cargo::find($request->id_car);

        if(!is_null($find)){
            $find->id_are = $request->id_are;
            $find->cargo = $request->cargo;
            $find->estado = $request->estado;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return redirect('cargo/buscar/'.$request->id_are);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function confirm($id, $ie)
    {
        $find = Cargo::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('cargo.confirma')->with('id', $find->id_car)
                                     ->with('ie', $ie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionCargo  $configuracionCargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = Cargo::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return redirect('cargo/buscar/'.$request->ie);
    }
}
