<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Alamat;
use App\Models\Bio;
use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use RealRashid\SweetAlert\Facades\Alert;


class AlamatController extends Controller
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
        return view('profile.profile', [
            'user' => $request->user(),
            'title' => 'Profile',
            'alamat' => $alamat,
            'provinces' => $provinces,
            'kotas' => $kotas,
            'kecamatans' => $kecamatans,
            'desas' => $desas,
        ]);
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
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, $id): RedirectResponse

    {
        $alamat = Alamat::where('id', $id)->where('npm', Auth::user()->id)->first();

        // $request->user()->fill($request->validated());
        // $validation = $request->validate(['name' => 'required', 'min:3']);

        $provinsi = Province::where('id', $request->provinsi)->first();
        $kota = Regency::where('id', $request->kota)->first();
        $kecamatan = District::where('id', $request->kecamatan)->first();
        $desa = Village::where('id', $request->desa)->first();
        
        $alamat->address = isset($request->address) ? $request->address: $alamat->address;

        $alamat->province = isset($provinsi->name) ? $provinsi->name: $alamat->province;
        $alamat->province_id = isset($request->provinsi) ? $request->provinsi: $alamat->province_id;

        $alamat->regency = isset($kota->name) ? $kota->name: $alamat->regency;
        $alamat->regency_id = isset($request->kota) ? $request->kota: $alamat->regency_id;

        $alamat->district = isset($kecamatan->name) ? $kecamatan->name: $alamat->district;
        $alamat->district_id = isset($request->kecamatan) ? $request->kecamatan: $alamat->district_id;

        $alamat->village = isset($desa->name) ? $desa->name: $alamat->village;
        $alamat->village_id = isset($request->desa) ? $request->desa: $alamat->village_id;
        $alamat->update();

        Alert::success('Profile Updated', 'Success');

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // $request->user()->save();
        return Redirect::route('profile.edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
