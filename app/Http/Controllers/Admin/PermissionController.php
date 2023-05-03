<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.permissions.edit', compact('permission'));
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
}
