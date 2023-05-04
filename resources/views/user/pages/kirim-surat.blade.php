@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Kirim Surat'])
    <div class="card bg-slate-400 mx-4">
        <div class="card-body">
            <h5 class="card-title"> Form Kirim Surat</h5>
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputPenerima">Penerima</label>
                    <input type="penerima" class="form-control" id="exampleInputEmail1" aria-describedby="penerimaHelp"
                        placeholder="Masukkan Nama Penerima" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputSubjek">Subjek</label>
                    <input type="subjek" class="form-control" id="exampleInputEmail1" aria-describedby="subjekHelp"
                        placeholder="Masukkan Subjek" required>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea class="form-control" id="pesan" rows="3" placeholder="Masukkan Pesan" required></textarea>
                </div>

                <label for="exampleInputText">Lampiran</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#kirimsurat">
                        Kirim
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="kirimsurat" tabindex="-1" aria-labelledby="suratModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="shadow mb-5 bg-body rounded">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                class="w-80 h-auto" alt="close"></button>
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
        .font {
            font-size: small;
            font-weight: 600;
            text-align: center;
        }
    </style>

    <div class="container-fluid py-4">
        @include('admin.layouts.partials.footer')
    </div>
@endsection
