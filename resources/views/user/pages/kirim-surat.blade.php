@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Kirim Surat'])
    <div class="card bg-slate-400 mx-4">
        <div class="card-body">
            <h5 class="card-title"> Form Kirim Surat</h5>
            <form>
            <div class="form-group">
                <label for="exampleInputPenerima">Penerima</label>
                <input type="penerima" class="form-control" id="exampleInputEmail1" aria-describedby="penerimaHelp" placeholder="Masukkan Nama Penerima">

            </div>

            <div class="form-group">
                <label for="exampleInputSubjek">Subjek</label>
                <input type="subjek" class="form-control" id="exampleInputEmail1" aria-describedby="subjekHelp" placeholder="Masukkan Subjek">

            </div>

            <div class="form-group">
                <label for="exampleInputText">Pesan</label>
                <input type="pesan" class="form-control" id="exampleInputPesan" aria-describedby="subjekHelp" placeholder="Masukkan Pesan">

            </div>

            
            <label for="exampleInputText">Lampiran</label>

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                
            </div>

            <div>


                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#exampleModal"> Kirim
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="shadow mb-5 bg-body rounded">
                    <!-- <div class="modal-header">
                        <button type="button" class="justify-content-end" data-dismiss="modal">&times;</button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                    <div class="modal-body">
                        <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
                        </div>

                        <div class="my-0">
                            <p class="font">Kirim surat telah berhasil</p>
                        </div>
                    </div>
                    

                    </div>
                </div>
                </div>

            </div>

            </form>

        </div>

    </div>
    
    <style>
        .font{
            font-size: small;
            font-weight: 600;
            text-align: center;
        }
    </style>

    <div class="container-fluid py-4">
        @include('admin.layouts.partials.footer')
    </div>
@endsection