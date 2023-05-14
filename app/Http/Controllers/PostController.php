<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function userView()
    {
        $posts = Post::all();
        return view('user.pages.post', compact('posts'));
    }

    public function store(Request $request)
    {

        // $data = Post::create($request->all());
        $data = ' ';
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/post/', $request->file('gambar')->getClientOriginalName());
            $data = $request->file('gambar')->getClientOriginalName();
        }
        // dd($data);
        Post::create([
            'nama' => $request->nama,
            'poster' => Auth::user()->name,
            'ormawa' => 'HMIF',
            'gambar' => $data,
            'content' => $request->content,
        ]);
        Alert::success('Post Added', 'Postingan berhasil dibuat');

        return to_route('admin.posts.index');
    }

    public function viewModal()
    {
    }

    public function edit()
    {
    }
    public function update(Request $request, Post $post)
    {
        if (isset($request->content)) {
            $post->content = $request->content;
        }

        $post->update();
        Alert::success('Updated', 'Berhasil diUpdate');
        return back();
    }
    public function destroy(Post $post)
    {
        $post->delete();
        Alert::success('Post Deleted', 'Post berhasil dihapus');
        return back();
    }
}
