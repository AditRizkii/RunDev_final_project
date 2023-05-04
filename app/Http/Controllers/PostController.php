<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(){
        return view('user.pages.post.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'nama'=>'required',
            'content'=>'required',
        ]);

        $data = Post::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('fotoOutput/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        
        return redirect('student')->with('status', 'Student Addedd!');
    }

}
