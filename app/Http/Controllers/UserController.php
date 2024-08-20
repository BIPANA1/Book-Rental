<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.pages.user.index' ,compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return view('admin.pages.user.create', compact('roles'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roles' => 'required|array',
            // 'roles.*' => 'exists:roles,id',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $rolesId) {
            DB::table('model_has_roles')->insert([
                'role_id' => $rolesId,
                'model_type' => User::class,
                'model_id' => $user->id,
            ]);
            // dd($rolesId);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        $userRole=[];
        $user = User::find($id);
        $roles = Role::pluck('name', 'id')->toArray();
        // $permission = Permission::get();

        // $rolePermissions = DB::table("model_has_roles")->where("model_has_roles.role_id",$id)
        //     ->pluck('model_has_roles.permission_id','model_has_roles.permission_id')
        //     ->all();

        // if(isset($user->roles)){
        //   $userRole = $user->roles->pluck('name', 'id')->toArray();
        // }

        $userRole = $user->roles->pluck('name', 'id')->toArray();
        return view('admin.pages.user.edit', compact('user', 'roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'roles' => 'required|array',
            // 'permission.*' => 'exists:permissions,id',
        ]);

        $user = User::findOrFail($id);
        $input = $request->all();

        if ($request->filled('password')) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user->update($input);
        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->where('model_type', User::class)
            ->delete();

        foreach ($request->input('roles') as $roleId) {
            DB::table('model_has_roles')->insert([
                'permission_id' => $roleId,
                'model_type' => User::class,
                'model_id' => $user->id,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');

    }
}
