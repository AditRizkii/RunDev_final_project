<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $validated = $request->validate(['name'=> ['required', 'min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index')->with('message', 'Role Created Successfully');
    }

    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));
    }

    public function update(Request $request, Role $role){
        $validation = $request->validate(['name'=>'required', 'min:3']);
        $role->update($validation);
        return to_route('admin.roles.index')->with('message', 'Role Updated Successfully');
    }

    public function destroy(Role $role){
        $nama=$role->name;
        $role->delete();
        return back()->with('message', 'Role ' . $nama . ' Deleted');
    }

    public function givePermission(Request $request, Role $role){
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission Exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added');
    }

    public function revokePermission(Role $role, Permission $permission){
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission Removed');
        }
        return back()->with('message', 'Permission not exists');
    }
}
