<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use App\Models\dataNPM;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $users=User::all();
        $userNpm=Auth::user()->npm;
        $npm = dataNPM::where('npm', $userNpm)->first();
        if ($npm != null){
            $fakultas=$npm->fakultas;
            $kelamin=$npm->kelamin;
            $prodi=$npm->prodi;

        }

        $alamat = Alamat::where('npm', Auth::user()->id)->first();
        if(empty($alamat)){
            Alamat::create([
                'npm'=> Auth::user()->id,
            ]);
        }

        $provinces = Province::all();
        $kotas=null;
        if($alamat->province_id != null){
            $kotas = Regency::where('province_id', $alamat->province_id)->get();
        }

        $kecamatans=null;
        if ($alamat->regency_id) {
            $kecamatans = District::where('regency_id', $alamat->regency_id)->get();
        }
        $desas=null;
        if ($alamat->district_id) {
            $desas = Village::where('district_id', $alamat->district_id)->get();
        }
        $user =$request->user();
        return view('profile.profile', compact('user','fakultas','prodi','kelamin', 'alamat', 'provinces', 'kotas','kecamatans', 'desas'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
