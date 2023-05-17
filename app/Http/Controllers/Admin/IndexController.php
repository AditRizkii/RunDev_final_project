<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $surats = Surat::all()->count();
        $post = Post::all()->count();
        $ormawa = Role::whereNotIn('name', ['admin', 'mahasiswa'])->count();
        return view('admin.layouts.admin', compact(
            'users',
            'surats',
            'ormawa',
            'post',
        ));
    }
}
