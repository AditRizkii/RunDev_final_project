<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(['name'=>'required']);
        
        Permission::create($validation);
        return to_route('admin.permissions.index')->with('message', 'Permission Created Successfully');
    }

    public function edit(Permission $permission){
        $roles=Role::all();
        return view('admin.permissions.edit', compact('permission','roles'));
    }

    public function update(Request $request, Permission $permission){
        $validation = $request->validate(['name'=>'required']);
        $permission->update($validation);
        return to_route('admin.permissions.index')->with('message', 'Permission Updated Successfully');
    }

    public function destroy(Permission $permission){
        $nama=$permission->name;
        $permission->delete();
        return back()->with('message', 'Permission ' . $nama . ' Deleted');
    }

    public function assignRole(Request $request, Permission $permission){
        if ($permission->hasRole($request->role)) {
            return back()->with('message', 'Role exists');
        }

        $permission->assignRole($request->role);
        return back()->with('message', 'Role assign');
    }

    public function removeRole(Permission $permission, Role $role){
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role not exists');
    }
}
