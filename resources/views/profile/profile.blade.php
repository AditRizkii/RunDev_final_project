@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Profile'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ Vite::asset('public/assets/img/profil.png') }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ Auth::user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Mahasiswa
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-app"></i>
                                    <span class="ms-2">App</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-email-83"></i>
                                    <span class="ms-2">Messages</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span class="ms-2">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-dark fw-bold fs-5 text-capitalize">Edit Profil</p>
                            {{-- <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan</button> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('patch')
                            <p class="text-uppercase text-dark fw-bolder text-sm">Informasi Akun</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="email" value="{{ Auth::user()->email }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2 mb-4">
                                    <select class="form-select" aria-label="select">
                                        @if ($kelamin == 'P')
                                            <option selected value="2" disabled>Perempuan</option>
                                            <option value="1">Laki-Laki</option>
                                        @else
                                            <option value="2">Perempuan</option>
                                            <option selected value="1" disabled>Laki-Laki</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="w-100"></div> {{-- break --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NPM</label>
                                        <input class="form-control" type="text" value="{{ Auth::user()->npm }}" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="w-100"></div> {{-- break --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Program Studi</label>
                                        <input class="form-control" type="text" value="{{ $prodi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Fakultas</label>
                                        <input class="form-control" type="text" value="{{ $fakultas }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Universitas</label>
                                        <input class="form-control" type="text" value="Universitas Syiah Kuala"
                                            readonly>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm ms-auto w-20 mr-20"
                                        type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <hr class="horizontal dark">
                        <form action="{{ route('alamat.update', $alamat->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <p class="text-uppercase text-dark fw-bolder text-sm">Informasi kontak</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        @if ($alamat->alamat == null)
                                        <textarea name="address" id="address" rows="4" class="form-control rounded-5"
                                        placeholder="Masukkan Detail Alamat"></textarea>
                                        @else
                                            <textarea name="address" id="address" rows="4" class="form-control rounded-5">{{ $alamat->alamat }}</textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-100"></div> {{-- break --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Provinsi</label>
                                        <select id="provinsi" name="provinsi" class="form-select"
                                            aria-label="Default select example">
                                            @if ($alamat->province == null)
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="{{ $alamat->province_id }}">{{ $alamat->province }}
                                                </option>
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kabupaten/Kota</label>
                                        <select id="kota" name="kota" class="form-select"
                                            aria-label="Default select example">
                                            @if ($alamat->regency == null)
                                                @if ($kotas == null)
                                                    <option value="">Kabupaten/Kota</option>
                                                @else
                                                    @foreach ($kotas as $kota)
                                                        <option value="{{ $kota->id }}">{{ $kota->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @else
                                                <option value="{{ $alamat->regency_id }}">{{ $alamat->regency }}
                                                </option>
                                                @foreach ($kotas as $kota)
                                                    <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kecamatan</label>
                                        <select id="kecamatan" name="kecamatan" class="form-select"
                                            aria-label="Default select example">
                                            @if ($alamat->district == null)
                                                @if ($kecamatans == null)
                                                    <option value="">Kecamatan</option>
                                                @else
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @else
                                                <option value="{{ $alamat->district_id }}">{{ $alamat->district }}
                                                </option>
                                                @foreach ($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Desa</label>
                                        <select id="desa" name="desa" class="form-select"
                                            aria-label="Default select example">
                                            @if ($alamat->village == null)
                                                @if ($desas == null)
                                                    <option value="">Desa</option>
                                                @else
                                                    @foreach ($desas as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @else
                                                <option value="{{ $alamat->village_id }}">{{ $alamat->village }}
                                                </option>
                                                @foreach ($desas as $desa)
                                                    <option value="{{ $desa->id }}">{{ $desa->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm ms-auto w-20 mr-20"
                                        type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <hr class="horizontal dark">
                        <form action="{{ route('bio.update', $bio->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                        <p class="text-uppercase text-dark fw-bolder text-sm">Tentang Saya</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Minat</label>
                                    @if ($bio->minat != null)
                                        <input name="minat" id="minat" type="text" class="form-control"
                                            value="{{ $bio->minat }}">
                                    @else
                                        <input name="minat" id="minat" type="text" class="form-control"
                                            placeholder="Tuliskan Minat Anda">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Bakat</label>
                                    @if ($bio->bakat != null)
                                        <input name="bakat" id="bakat" type="text" class="form-control"
                                            value="{{ $bio->bakat }}">
                                    @else
                                        <input name="bakat" id="bakat" type="text" class="form-control"
                                            placeholder="Tuliskan Bakat Anda">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="tentang">Tentang Saya</label>
                                    @if ($bio->tentang != null)
                                        <textarea name="tentang" id="tentang" rows="3" class="md-textarea form-control">{{ $bio->tentang }}</textarea>
                                    @else
                                        <textarea name="tentang" id="tentang" rows="3" class="md-textarea form-control"
                                            placeholder="Tuliskan Tentang Anda"></textarea>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-sm ms-auto w-20 mr-20"
                                    type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#provinsi").on('change', function() {
                        let id_provinsi = $('#provinsi').val();

                        $.ajax({
                            type: "POST",
                            url: "{{ route('kota') }}",
                            data: {
                                "id_prov": id_provinsi,
                                '_token': '{{ csrf_token() }}'
                            },
                            cache: false,

                            success: function(msg) {
                                $('#kota').html(msg);
                                $('#kecamatan').html(
                                    '<option selected disabled>Kecamatan</option>');
                                $('#desa').html('<option selected disabled>Desa</option>');
                            },

                            error: function(data) {
                                console.log('error', data);
                            },
                        })
                    });

                    $("#kota").on('change', function() {
                        let id_kota = $('#kota').val();

                        $.ajax({
                            type: "POST",
                            url: "{{ route('kecamatan') }}",
                            data: {
                                "id_kota": id_kota,
                                '_token': '{{ csrf_token() }}'
                            },
                            cache: false,

                            success: function(msg) {
                                $('#kecamatan').html(msg);
                                $('#desa').html('<option selected disabled>Desa</option>');
                            },

                            error: function(data) {
                                console.log('error', data);
                            },
                        })
                    });

                    $("#kecamatan").on('change', function() {
                        let id_kecamatan = $('#kecamatan').val();

                        $.ajax({
                            type: "POST",
                            url: "{{ route('desa') }}",
                            data: {
                                "id_kecamatan": id_kecamatan,
                                '_token': '{{ csrf_token() }}'
                            },
                            cache: false,

                            success: function(msg) {
                                $('#desa').html(msg);
                            },

                            error: function(data) {
                                console.log('error', data);
                            },
                        })
                    });
                });
            </script>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ Vite::asset('public/assets/img/bg-profile.jpg') }}" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="{{ Vite::asset('public/assets/img/profil.png') }}"
                                        class="rounded-circle img-fluid border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                    class="ni ni-collection"></i></a>
                            <a href="javascript:;"
                                class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                    class="ni ni-email-83"></i></a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">2000</span>
                                        <span class="text-sm opacity-8">Friends</span>
                                    </div>
                                    <div class="d-grid text-center mx-4">
                                        <span class="text-lg font-weight-bolder">10</span>
                                        <span class="text-sm opacity-8">Photos</span>
                                    </div>
                                    <div class="d-grid text-center">
                                        <span class="text-lg font-weight-bolder">89</span>
                                        <span class="text-sm opacity-8">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5>
                                {{ Auth::user()->name }}<span class="font-weight-light">, 17</span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Banda Aceh, Indonesia
                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Mahasiswa Informatika
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>Universitas Syiah Kuala
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.layouts.partials.footer')
        </div>
    @endsection
