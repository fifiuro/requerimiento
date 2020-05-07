<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Hash;
use DB;
use App\configuracion\Centrosalud;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:users-list|users-create|users-delete', ['only' => ['index','store']]);
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['destroy','confirm']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('users.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = User::where('name','like','%'.$request->name.'%')->get();

        if(!is_null($find)){
            return view('users.buscar')->with('find',$find)
                                       ->with('estado','1')
                                       ->with('mensaje','');
        }else{
            return view('users.buscar')->with('find',$find)
                                       ->with('estado','0')
                                       ->with('mensaje'.'No se tiene resultado para la busqueda:'.$request->name);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centro = Centrosalud::where('estado','=',true)->select('nombre','id_cen')->get();
        $roles = Role::pluck('name','name')->all();
        
        return view('users.nuevo')->with('roles',$roles)
                                  ->with('centro',$centro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_usuario' => 'required|unique:users,nombre_usuario',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'id_cen' => 'required|exists:centro_salud,id_cen'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        /* dd($input["id_cen"]); */
    
        /* $user = User::create($input); */

        $user = new User;

        $user->nombre_usuario = $input["nombre_usuario"];
        $user->name = $input["name"];
        $user->email = $input["email"];
        $user->password = $input["password"];
        $user->id_cen = $input["id_cen"];

        $user->save();
        
        $user->assignRole($request->input('roles'));

        \toastr()->success('Se agrego correctamente el registro.');

        return view('users.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$id = Crypt::decrypt($id);

        $find = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $find->roles->pluck('name','name')->all();
        $centro = Centrosalud::where('estado','=',true)->select('nombre','id_cen')->get();
        
        if(!is_null($find)){
            return view('users.editar')->with('find',$find)
                                       ->with('roles',$roles)
                                       ->with('userRole',$userRole)
                                       ->with('centro',$centro)
                                       ->with('mensaje','');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('users.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nombre_usuario' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = \Arr::except($input, array('password'));
        }

        $user = User::find($request->id);

        if(!is_null($user)){
            if(\Auth::user()->hasRole('Admin')){
                $user->update($input);
            }else{
                $user->nombre_usuario = $input['nombre_usuario'];
                $user->email = $input['email'];
                $user->name = $input['name'];
                if(isset($input['password'])){
                    $user->password = $input['password'];
                }
                $user->save();
            }

            if(isset($input['roles'])){
                DB::table('model_has_roles')->where('model_id',$request->id)->delete();
                $user->assignRole($request->input('roles'));
            }

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }

        if(\Auth::user()->hasRole('Admin')){
            return view('users.buscar');
        }else{
            return view('template.inicio');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = User::find($id);
        
        if(is_null($find)){
            \toastr()->success('No se encotnro el registro a Eliminar.');
        }

        return view('users.confirma')->with('id',$find->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->id)->delete();

        \toastr()->success('Se eliminó correctamente el registro.');

        return view('users.buscar');
    }
}
