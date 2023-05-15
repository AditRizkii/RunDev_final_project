<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Bio;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request): View
    {
        $bio = Bio::where('npm', Auth::user()->id)->first();
        $profil = Bio::where('npm', Auth::user()->id)->first();

        if (empty($bio)) {
            Bio::create([
                'npm' => Auth::user()->id,
            ]);
        }

        return view('profile.profile', [
            'user' => $request->user(),
            'title' => 'Bio',
            'biodata' => $bio,
            'gambar' => $profil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $bio = Bio::where('id', $id)->where('npm', Auth::user()->id)->first();

        $bio->bio = isset($request->biodata) ? $request->biodata : $bio->bio;
        $bio->update();

        Alert::success('Bio Updated', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}