<?php

namespace App\Http\Controllers;

use App\requerimiento\DatoPersonal;
use App\configuracion\Departamento;
use App\configuracion\Estadocivil;
use App\configuracion\Afp;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\ValidarDatoPersonalRequest;

class datoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datoPersonal.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuracionDatoPersonal  $configuracionDatoPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = DatoPersonal::where(DB::raw('concat(datos_personales.nombre," ",datos_personales.paterno," ",datos_personales.materno)'), 'like', '%'.$request->nombre.'%')->get();

        if(!is_null($find)){
            if($request->data == '1'){
                return $find->toJson();
            }else{
                return view('datoPersonal.buscar')->with('find', $find)
                                                  ->with('estado', '1')
                                                  ->with('mensaje', '');
            }
        }else{
            return view('datoPersonal.buscar')->with('find', $find)
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
        $dep = Departamento::where('estado','=',true)->get();
        $est = Estadocivil::where('estado','=',true)->get();
        $afp = Afp::where('estado','=',true)->get();

        return view('datoPersonal.nuevo')->with('departamento', $dep)
                                         ->with('estado_civil', $est)
                                         ->with('afp', $afp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarDatoPersonalRequest $request)
    {
        $find = new DatoPersonal;

        $find->nombre = $request->nombre;
        $find->paterno = $request->paterno;
        $find->materno = $request->materno;
        $find->ci = $request->ci;
        $find->id_dep = $request->id_dep;
        $find->matricula = $request->matricula;
        $find->id_est = $request->id_est;
        $find->domicilio = $request->domicilio;
        $find->id_afp = $request->id_afp;
        $find->telefono = $request->telefono;
        $find->celular = $request->celular;
        $find->email = $request->email;

        $find->save();

        \toastr()->success('Se agrego correctamente el registro.');

        return view('datoPersonal.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuracionDatoPersonal  $configuracionDatoPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Departamento::where('estado','=',true)->get();
        $est = Estadocivil::where('estado','=',true)->get();
        $afp = Afp::where('estado','=',true)->get();
        $find = DatoPersonal::find($id);
        
        if(!is_null($find)){
            return view('datoPersonal.editar')->with('find', $find)
                                              ->with('departamento', $dep)
                                              ->with('estado_civil', $est)
                                              ->with('afp', $afp)
                                              ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('datoPersonal.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuracionDatoPersonal  $configuracionDatoPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarDatoPersonalRequest $request)
    {
        $find = DatoPersonal::find($request->id_per);

        if(!is_null($find)){
            $find->nombre = $request->nombre;
            $find->paterno = $request->paterno;
            $find->materno = $request->materno;
            $find->ci = $request->ci;
            $find->id_dep = $request->id_dep;
            $find->matricula = $request->matricula;
            $find->id_est = $request->id_est;
            $find->domicilio = $request->domicilio;
            $find->id_afp = $request->id_afp;
            $find->telefono = $request->telefono;
            $find->celular = $request->celular;
            $find->email = $request->email;

            $find->save();

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        return view('datoPersonal.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDatoPersonal  $configuracionDatoPersonal
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = DatoPersonal::find($id);

        if(is_null($find)){
            \toastr()->success('No se encontro el registro a Eliminar.');
        }

        return view('datoPersonal.confirma')->with('id', $find->id_per);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuracionDatoPersonal  $configuracionDatoPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $find = DatoPersonal::find($request->id);

        if(!is_null($find)){
            $find->delete();

            \toastr()->success('Se Eliminó correctamente el registro.');
        }else{
            \toastr()->error('No se encontro el registro a Eliminar.');
        }

        return view('datoPersonal.buscar');
    }
}
