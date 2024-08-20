<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class RoleController extends Controller
{
    function __construct()
    {
        // dd($this->middleware('permission:role-create'));

        // $this->middleware(['permission:role-list|role-create|role-edit|role-delete'],['only' =>['index','store']]);
        // $this->middleware(['permission:role-create'],['only' => ['create','store','index']]);
        // $this->middleware(['permission:role-edit'],['only' => ['edit','update','index']]);
        // $this->middleware(['permission:role-delete'],['only' =>['destroy','index']]);
    }

    public function index()
    {
        $roles = Role::with('permissions')->get();
        $breadcrumbs = [];
        $breadcrumbs[]  = ['name'=> 'Dashboard', 'url' => '/'];
        $breadcrumbs[]  = ['name'=> 'Roles', 'url' => '/roles']; //route('admin.role');

        // dd($roles);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id")->get();
        // dd($roles);
        return view('admin.pages.role.index', compact('roles', 'breadcrumbs'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('admin.pages.role.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        $permission = Permission::whereIn('id', $request->input('permission'))->get();

        if ($permission->count() !== count($request->input('permission'))) {
            return redirect()->back()->withErrors('Some permissions do not exist.');
        }

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($permission);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }


    public function show($id)
    {
        $roles = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id", $id)->get();
        // dd($rolePermissions);
        return view('admin.pages.role.show', compact('roles','rolePermissions'));

    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('admin.pages.role.edit',compact('role','permission','rolePermissions'));
    }
    public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required|unique:roles,name,' . $id,
        'permission' => 'required|array',
    ]);

    $role = Role::findOrFail($id);
    $permissions = Permission::whereIn('id', $request->input('permission'))->get();
    if ($permissions->count() !== count($request->input('permission'))) {
        return redirect()->back()->withErrors('Some permissions do not exist.');
    }
    $role->name = $request->input('name');
    $role->save();
    $role->syncPermissions($permissions);
    return redirect()->route('roles.index')->with('success', 'Role updated successfully');
}


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        // dd($role);
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }


}
