<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use App\Models\Bio;
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
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $users = User::all();
        $userNpm = Auth::user()->npm;
        $npm = dataNPM::where('npm', $userNpm)->first();
        if ($npm != null) {
            $fakultas = $npm->fakultas;
            $kelamin = $npm->kelamin;
            $prodi = $npm->prodi;
        }

        $alamat = Alamat::where('npm', Auth::user()->id)->first();
        if (empty($alamat)) {
            Alamat::create([
                'npm' => Auth::user()->id,
            ]);
            Bio::create([
                'npm' => Auth::user()->id,
                'minat' => null,
                'bakat' => null,
                'tentang' => null,
            ]);
        }

        $provinces = Province::all();
        $kotas = null;
        if ($alamat->province_id != null) {
            $kotas = Regency::where('province_id', $alamat->province_id)->get();
        }

        $kecamatans = null;
        if ($alamat->regency_id) {
            $kecamatans = District::where('regency_id', $alamat->regency_id)->get();
        }
        $desas = null;
        if ($alamat->district_id) {
            $desas = Village::where('district_id', $alamat->district_id)->get();
        }

        $bio = Bio::where('npm', Auth::user()->id)->first();

        if (empty($bio)) {
        }

        $user = $request->user();
        return view('profile.profile', compact('user', 'fakultas', 'prodi', 'kelamin', 'alamat', 'provinces', 'kotas', 'kecamatans', 'desas', 'bio'));
    }

    public function getKota(request $request)
    {
        $id_provinsi = $request->id_prov;
        $kotas = Regency::where('province_id', $id_provinsi)->get();

        $opt = "<option selected disabled>Pilih Kabupaten/Kota</option>";
        foreach ($kotas as $kota) {
            $opt .= "<option value='$kota->id'>$kota->name</option>";
        }

        echo $opt;
    }

    public function getKecamatan(request $request)
    {
        $id_kota = $request->id_kota;
        $kecamatans = District::where('regency_id', $id_kota)->get();

        $opt = "<option selected disabled>Pilih Kecamatan</option>";
        foreach ($kecamatans as $kecamatan) {
            $opt .= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $opt;
    }

    public function getDesa(request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $desas = Village::where('district_id', $id_kecamatan)->get();

        $opt = "<option selected disabled>Pilih Desa</option>";
        foreach ($desas as $desa) {
            $opt .= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $opt;
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $alamat = Alamat::where('id', $id_alamat)->where('npm', Auth::user()->id)->first();
        // $bio = Bio::where('id', $id_bio)->where('npm', Auth::user()->id)->first();

        // dd($alamat);

        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = isset($request->name) ? $request->name : $user->name;
        $user->update();

        // $provinsi = Province::where('id', $request->provinsi)->first();
        // $kota = Regency::where('id', $request->kota)->first();
        // $kecamatan = District::where('id', $request->kecamatan)->first();
        // $desa = Village::where('id', $request->desa)->first();

        // $alamat->address = isset($request->address) ? $request->address: $alamat->address;

        // $alamat->province = isset($provinsi->name) ? $provinsi->name: $alamat->province;
        // $alamat->province_id = isset($request->provinsi) ? $request->provinsi: $alamat->province_id;

        // $alamat->regency = isset($kota->name) ? $kota->name: $alamat->regency;
        // $alamat->regency_id = isset($request->kota) ? $request->kota: $alamat->regency_id;

        // $alamat->district = isset($kecamatan->name) ? $kecamatan->name: $alamat->district;
        // $alamat->district_id = isset($request->kecamatan) ? $request->kecamatan: $alamat->district_id;

        // $alamat->village = isset($desa->name) ? $desa->name: $alamat->village;
        // $alamat->village_id = isset($request->desa) ? $request->desa: $alamat->village_id;
        // $alamat->update();

        // $bio->minat = isset($request->minat) ? $request->minat : $bio->minat;
        // $bio->bakat = isset($request->bakat) ? $request->bakat : $bio->bakat;
        // $bio->tentang = isset($request->tentang) ? $request->tentang : $bio->tentang;
        // $bio->update();
        Alert::success('Berhasil', 'Profile Updated');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
        // return view('profile.ts', compact('alamat'));
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
