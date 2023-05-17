@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Kirim Surat'])
    <div class="card bg-slate-400 mx-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title"> Form Kirim Surat</h5>
                <div>
                    <a href="{{ route('surat.terkirim', Auth::user()->id) }}" class="badge rounded-pill bg-primary">Surat Terkirim</a>
                    <a href="{{ route('surat.masuk', Auth::user()->id) }}" class="badge rounded-pill bg-secondary">Surat Masuk</a>
                </div>
            </div>
            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_penerima">Penerima</label>
                    <select id="id_penerima" name="id_penerima" class="form-select" aria-label="Default select example">
                        <option selected>Pilih Penerima</option>
                        @foreach ($users as $user)
                        @if ($user->name != 'admin' && $user->name != Auth::user()->name)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                            
                        @endif
                        @endforeach
                      </select>
                </div>

                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input id="subject" name="subject" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="subjekHelp"
                        placeholder="Masukkan Subjek" required>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Masukkan Pesan" required></textarea>
                </div>

                <label for="file">Lampiran</label>
                <div class="input-group mb-3">
                    <input id="file" name="file" type="file" class="form-control" id="inputGroupFile02">
                </div>

                <div>
                    <button type="submit" class="btn btn-primary my-4">
                        Kirim
                    </button>
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
