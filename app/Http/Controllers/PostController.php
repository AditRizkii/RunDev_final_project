<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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

    public function userStore(Request $request)
    {

        // $data = Post::create($request->all());
        $data = ' ';
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/img/post/', $request->file('gambar')->getClientOriginalName());
            $data = $request->file('gambar')->getClientOriginalName();
        }
        // dd($data);
        $user = User::where('id', Auth::user()->id)->first();
        $roles = $user->getRoleNames()->toArray();
        $role = ' ';
        if (in_array('HMIF', $roles)) {
            $role = 'HMIF';
        } elseif (in_array('HIMAFAR', $roles)) {
            $role = 'HIMAFAR';
        } elseif (in_array('HIMAFIS', $roles)) {
            $role = 'HIMAFIS';
        } elseif (in_array('HIMASTA', $roles)) {
            $role = 'HIMASTA';
        } elseif (in_array('BEM-FMIPA', $roles)) {
            $role = 'BEM-FMIPA';
        } elseif (in_array('HIMATIKA', $roles)) {
            $role = 'HIMATIKA';
        } elseif (in_array('HMB', $roles)) {
            $role = 'HMB';
        } elseif (in_array('HMMI', $roles)) {
            $role = 'HMMI';
        }

        Post::create([
            'nama' => $request->nama,
            'poster' => Auth::user()->name,
            'ormawa' => $role,
            'gambar' => $data,
            'content' => $request->content,
        ]);
        Alert::success('Post Added', 'Postingan berhasil dibuat');

        return to_route('post');
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

    public function userUpdate(Request $request, Post $post)
    {
        if (isset($request->content)) {
            $post->content = $request->content;
        }

        $post->update();
        Alert::success('Updated', 'Berhasil diUpdate');
        return back();
    }
    public function userDestroy(Post $post)
    {
        $post->delete();
        Alert::success('Post Deleted', 'Post berhasil dihapus');
        return back();
    }
}
