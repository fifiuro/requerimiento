<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('roles.buscar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $find = Role::where('name','like','%'.$request->rol.'%')->get();

        if(!is_null($find)){
            return view('roles.buscar')->with('find', $find)
                                       ->with('estado', '1')
                                       ->with('mensaje', '');
        }else{
            return view('roles.buscar')->with('find', $find)
                                       ->with('estado', '0')
                                       ->with('mensaje', 'No se tiene resultado para ls busqueda: '.$request->rol);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::orderBy('name','ASC')->get();

        return view('roles.nuevo')->with('permission',$permission);
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
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $r = explode(',',$request->input('permission'));

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($r);

        \toastr()->success('Se agrego correctamente el registro.');

        return view('roles.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Role::find($id);
        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
                             ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                             ->all();
        
        if(!is_null($find)){
            return view('roles.editar')->with('find', $find)
                                       ->with('permission', $permission)
                                       ->with('rolePermissions', $rolePermissions)
                                       ->with('mensaje', '');
        }else{
            \toastr()->error('No se encontro el registro a Modificar.');

            return view('roles.buscar');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $r = explode(',',$request->input('permission'));
        $role = Role::find($request->id);

        if(!is_null($role)){
            $role->name = $request->input('name');
            $role->save();
        
            $role->syncPermissions($r);

            \toastr()->success('Se modificó correctamente el registro.');
        }else{
            \toastr()->success('No se encontro el registro a Modificar.');
        }
    
        return view('roles.buscar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $find = Role::find($id);
        
        if(is_null($find)){
            \toastr()->success('No se encotnro el registro a Eliminar.');
        }

        return view('roles.confirma')->with('id',$find->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table("roles")->where('id',$request->id)->delete();

        \toastr()->success('Se eliminó correctamente el registro.');

        return view('roles.buscar');
    }
}
