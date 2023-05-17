<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use ParagonIE\Sodium\Compat;
use RealRashid\SweetAlert\Facades\Alert;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role(['HMIF', 'HIMASTA', 'HIMAFAR', 'HIMATIKA', 'HMB', 'HMMI', 'HIMAFIS', 'BEM-FMIPA'])->get();
        return view('user.pages.kirim-surat', compact('users'));
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
        $request->validate([
            'file' => 'required|mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp',
            'subject' => ['string', 'max:255'],
            'pesan' => ['string', 'max:255'],
        ]);

        // if ($request->hasFile('file')) {
        //     $request->file('file')->move('assets/img/surat/', $request->file('file')->getClientOriginalName());
        //     $data = $request->file('file')->getClientOriginalName();
        //     dd($data);
        // }
        if ($request->hasFile('file')) {
            $uploadPath = public_path('kirimsurat');

            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $explode = explode('.', $file->getClientOriginalName());
            $originalName = $explode[0];
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $mime = $file->getClientMimeType();
            $filesize = $file->getSize();
            // dd($file);
            
            if ($file->move($uploadPath, $rename)) {
                $surat = new Surat();
                $surat->id_pengirim = Auth::user()->id;
                $surat->id_penerima = $request->id_penerima;
                $surat->subject = $request->subject;
                $surat->pesan = $request->pesan;
                $surat->name = $originalName;
                $surat->file = $rename;
                $surat->extension = $extension;
                $surat->size = $filesize;
                $surat->mime = $mime;
                $surat->save();

                Alert::success('Berhasil', 'Surat Berhasil Dikirim');

                return back();
            }
            Alert::warning('Error', 'file tidak ditemukan');

            return back();
        }
        Alert::error('Error', 'Surat gagal Dikirim');

        return back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::find($id);

        if($surat) {
            $file = public_path('kirimsurat/' . $surat->file);

            if(File::exists($file)) {
                File::delete($file);
            }

            $surat->delete();
            Alert::success('Berhasil', 'Surat berhasil dihapus');
            return back();
        }
        Alert::error('Error', 'Surat gagal Dihapus');

        return back();
        }

    public function kotakMasuk($id){
        $surats = Surat::where('id_penerima', $id)->get();
        return view('user.pages.surat.inbox', compact('surats'));
    }

    public function terkirim($id){
        $surats = Surat::where('id_pengirim', $id)->get();
        return view('user.pages.surat.terkirim', compact('surats'));
    }
}
