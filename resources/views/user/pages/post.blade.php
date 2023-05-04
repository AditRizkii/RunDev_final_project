@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Postingan'])

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 g-5">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="assets/img/post/kunker.png" class="card-img-top"
                            style="height:350px; object-fit:cover; object-position:0 68%;" alt="Kunjungan Kerja">
                        <div class="card-body">
                            <p class="card-text">HMIF - USK</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-evenly">
                                    <div class="btn-group">
                                        @can('view-post')
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#kunkerModal">View</button>
                                        @endcan
                                            @can('edit-post')
                                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#edkunkerModal">Edit</button>
                                            @endcan
                                        
                                    </div>
                                    @can('delete-post')
                                    <div class="my-2 mx-4">
                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                    </div>
                                    @endcan
                                </div>
                                <small class="text-body-secondary">April 14</small>
                            </div>

                            <div class="modal fade" id="kunkerModal" tabindex="-1" aria-labelledby="exModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/kunker.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Putri Ulfayani</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4 border-bottom border-2">
                                                        <p class="fs-5 fw-medium">[ 𝐊𝐔𝐍𝐉𝐔𝐍𝐆𝐀𝐍 𝐊𝐄𝐑𝐉𝐀 ]</p>
                                                        <p class="fs-5 fw-medium">Halo teman-teman informatika!👋🏻</p>
                                                        <p class="fs-5 fw-medium">Himpunan Mahasiswa Informatika (HMIF)
                                                            telah melaksanakan kegiatan
                                                            kunjungan kerja nih ke Himpunan Mahasiswa Teknik Komputer
                                                            (HIMATEKKOM)</p>
                                                        <p class="fs-5 fw-medium">Kunjungan kerja ini bertujuan untuk
                                                            sharing dan diskusi mengenai
                                                            program kerja masing-masing himpunan</p>
                                                        <p class="fs-5 fw-medium">Yuk, lihat beberapa keseruan acaranya 😆
                                                            <br>See u di 𝐊𝐔𝐍𝐉𝐔𝐍𝐆𝐀𝐍 𝐊𝐄𝐑𝐉𝐀 selanjutnya!✨
                                                        </p>
                                                        <p class="fs-5 fw-medium">
                                                            __________________________ <br>
                                                            𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐇𝐔𝐀𝐋 <br>
                                                            𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑 <br>
                                                            𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                        </p>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <img src="{{ Vite::asset('public/assets/img/post/likea.png') }}"
                                                            id="like" style="width: 35px" alt=""
                                                            onclick="changeImage(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edkunkerModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/kunker.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Putri Ulfayani</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4">
                                                        <div class="md-form flex">
                                                            <label for="form10" class="fs-6 fw-base mx-1">Edit
                                                                Caption</label>
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <textarea id="form10" class="xl-textarea form-control mb-3" rows="15">[ 𝐊𝐔𝐍𝐉𝐔𝐍𝐆𝐀𝐍 𝐊𝐄𝐑𝐉𝐀 ]
Halo teman-teman informatika!👋🏻

Himpunan Mahasiswa Informatika (HMIF) telah melaksanakan kegiatan kunjungan kerja nih ke Himpunan Mahasiswa Teknik Komputer (HIMATEKKOM)

Kunjungan kerja ini bertujuan untuk sharing dan diskusi mengenai program kerja masing-masing himpunan

Yuk, lihat beberapa keseruan acaranya 😆
See u di 𝐊𝐔𝐍𝐉𝐔𝐍𝐆𝐀𝐍 𝐊𝐄𝐑𝐉𝐀 selanjutnya!✨

_______________________         
𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐇𝐔𝐀𝐋            
𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑          
𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                                </textarea>
                                                            <div class="d-flex justify-content-end mx-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary my-4 ">Simpan</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="assets/img/post/bukber.png" class="card-img-top"
                            style="height:350px; object-fit:cover; object-position:0 34%;" alt="Bukber">
                        <div class="card-body">
                            <p class="card-text">HMIF - USK</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-evenly">
                                    <div class="btn-group">
                                        @can('view-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#bukberModal">View</button>
                                        @endcan
                                        @can('edit-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#edbukberModal">Edit</button>
                                        @endcan
                                        
                                    </div>
                                    @can('delete-post')
                                    <div class="my-2 mx-4">
                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                    </div>
                                    @endcan
                                    
                                </div>
                                <small class="text-body-secondary">March 28</small>
                            </div>

                            <div class="modal fade" id="bukberModal" tabindex="-1" aria-labelledby="exModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/bukber.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Tyara Raynasari</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4 border-bottom border-2">
                                                        <p class="fs-5 fw-medium">[𝐁𝐔𝐊𝐁𝐄𝐑 & 𝐓𝐀𝐊𝐉𝐈𝐋 𝐎𝐍 𝐓𝐇𝐄
                                                            𝐑𝐎𝐀𝐃]</p>
                                                        <p class="fs-5 fw-medium">Assalamu'alaikum. Wr. Wb</p>
                                                        <p class="fs-5 fw-medium">Halo sobat Informatika 🤩 <br>
                                                            Sehubungan akan dilaksanakannya Kegiatan Buka Bersama dan Takjil
                                                            On The Road, maka HMIF USK mengundang seluruh Mahasiswa/i dan
                                                            Alumni Informatika untuk berhadir dalam kegiatan ini.</p>
                                                        <p class="fs-5 fw-medium">🗓️ : Sabtu, 01 April 2022 <br>
                                                            ⏰ : 16.30 WIB s.d Selesai <br>
                                                            📍 : Aula MIPA (Bukber) & Simpang BPKP (Takjil) <br>
                                                            👕 : Muslim dan Muslimah</p>
                                                        <p class="fs-5 fw-medium">Kami tunggu kehadirannya
                                                            <br>See you soon !! 🤗🤗
                                                        </p>
                                                        <p class="fs-5 fw-medium">
                                                            _______________________________________ <br>
                                                            𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐀𝐆𝐀𝐌𝐀 & 𝐒𝐎𝐒𝐌𝐀𝐒 <br>
                                                            𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑 <br>
                                                            𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                        </p>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <img src="{{ Vite::asset('public/assets/img/post/likea.png') }}"
                                                            id="like" style="width: 35px" alt=""
                                                            onclick="changeImage(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edbukberModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/bukber.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Tyara Raynasari</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4">
                                                        <div class="md-form flex">
                                                            <label for="form10" class="fs-6 fw-base mx-1">Edit
                                                                Caption</label>
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <textarea id="form10" class="xl-textarea form-control mb-3" rows="15">[𝐁𝐔𝐊𝐁𝐄𝐑 & 𝐓𝐀𝐊𝐉𝐈𝐋 𝐎𝐍 𝐓𝐇𝐄 𝐑𝐎𝐀𝐃]

Assalamu'alaikum. Wr. Wb
                                                                
Halo sobat Informatika 🤩
Sehubungan akan dilaksanakannya Kegiatan Buka Bersama dan Takjil On The Road, maka HMIF USK mengundang seluruh Mahasiswa/i dan Alumni Informatika untuk berhadir dalam kegiatan ini.
                                                                
🗓️ : Sabtu, 01 April 2022
⏰ : 16.30 WIB s.d Selesai
📍 : Aula MIPA (Bukber) & Simpang BPKP (Takjil)
👕 : Muslim dan Muslimah
                                                                
Kami tunggu kehadirannya
See you soon !! 🤗🤗
                                                                
_______________________________________
𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐀𝐆𝐀𝐌𝐀 & 𝐒𝐎𝐒𝐌𝐀𝐒
𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑
𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                                </textarea>
                                                            <div class="d-flex justify-content-end mx-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary my-4 ">Simpan</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="assets/img/post/takjil.png" class="card-img-top"
                            style="height:350px; object-fit:cover; object-position:0 47%;" alt="Takjil On The Road">
                        <div class="card-body">
                            <p class="card-text">HMIF - USK</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-evenly">
                                    <div class="btn-group">
                                        @can('view-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#takjilModal">View</button>
                                        @endcan
                                        @can('edit-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#edtakjilModal">Edit</button>
                                        @endcan
                                        
                                    </div>
                                    @can('delete-post')
                                    <div class="my-2 mx-4">
                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                    </div>
                                    @endcan
                                    
                                </div>
                                <small class="text-body-secondary">March 25</small>
                            </div>

                            <div class="modal fade" id="takjilModal" tabindex="-1" aria-labelledby="exModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/takjil.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Khairul Auni</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4 border-bottom border-2">
                                                        <p class="fs-5 fw-medium">[𝐎𝐏𝐄𝐍 𝐃𝐎𝐍𝐀𝐒𝐈 𝐓𝐀𝐊𝐉𝐈𝐋]</p>
                                                        <p class="fs-5 fw-medium">Himpunan Mahasiswa Informatika USK
                                                            membuka Open Donasi untuk pembagian Takjil On the Road dengan
                                                            tema "Berbagi Berkah Bersama Informatika" yang dibuka mulai :
                                                            <br>
                                                            🗓️ 21-31 Maret 2023
                                                        </p>
                                                        <p class="fs-5 fw-medium">Pembagian takjil dilaksanakan : <br>
                                                            🗓️ 01 April 2023</p>
                                                        <p class="fs-5 fw-medium">Rekening penyaluran Donasi : <br>
                                                            🗳️ 8669593810 (a.n.Nadhira Fatwa Lubis)</p>
                                                        <p class="fs-5 fw-medium">Sedekah dapat menjadi pelindung musibah
                                                            dan mencegah masuk neraka. Rasulullah SAW bersabda:
                                                            “Sesungguhnya sedekah itu memadamkan murka Allah dan menolak
                                                            mati jelek (su’ul khotimah).” (HR Thabrani)</p>
                                                        <p class="fs-5 fw-medium">Narahubung : <br>
                                                            📱 0822-7958-9023 (Azza) <br>
                                                            📱 0895-1292-5300 (Nadhira)</p>
                                                        <p class="fs-5 fw-medium">Yuk berdonasi untuk menyambut bulan suci
                                                            ramadhan kali ini🤗😇</p>
                                                        <p class="fs-5 fw-medium">
                                                            _____________________________ <br>
                                                            𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐒𝐎𝐒𝐌𝐀𝐒 <br>
                                                            𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑 <br>
                                                            𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                        </p>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <img src="{{ Vite::asset('public/assets/img/post/likea.png') }}"
                                                            id="like" style="width: 35px" alt=""
                                                            onclick="changeImage(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edtakjilModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/takjil.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Khairul Auni</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4">
                                                        <div class="md-form flex">
                                                            <label for="form10" class="fs-6 fw-base mx-1">Edit
                                                                Caption</label>
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <textarea id="form10" class="xl-textarea form-control mb-3" rows="15">[𝐎𝐏𝐄𝐍 𝐃𝐎𝐍𝐀𝐒𝐈 𝐓𝐀𝐊𝐉𝐈𝐋]

Himpunan Mahasiswa Informatika USK membuka Open Donasi untuk pembagian Takjil On the Road dengan tema "Berbagi Berkah Bersama Informatika" yang dibuka mulai :
🗓️ 21-31 Maret 2023
                                                                
Pembagian takjil dilaksanakan :
🗓️ 01 April 2023
                                                                
Rekening penyaluran Donasi :
🗳️ 8669593810 (a.n.Nadhira Fatwa Lubis)
                                                                
Sedekah dapat menjadi pelindung musibah dan mencegah masuk neraka. Rasulullah SAW bersabda: “Sesungguhnya sedekah itu memadamkan murka Allah dan menolak mati jelek (su’ul khotimah).” (HR Thabrani)
                                                                
Narahubung :
📱 0822-7958-9023 (Azza)
📱 0895-1292-5300 (Nadhira)
                                                                
Yuk berdonasi untuk menyambut bulan suci ramadhan kali ini🤗😇
                                                       
____________________________
𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐒𝐎𝐒𝐌𝐀𝐒
𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑
𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                                </textarea>
                                                            <div class="d-flex justify-content-end mx-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary my-4 ">Simpan</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm">
                        <img src="assets/img/post/makrab.jpeg" class="card-img-top"
                            style="height:350px; object-fit:cover; object-position:0 63%;" alt="Malam Keakraban">
                        <div class="card-body">
                            <p class="card-text">BEM FMIPA - USK</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-evenly">
                                    <div class="btn-group">
                                        @can('view-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-bs-toggle="modal" data-bs-target="#makrabModal">View</button>
                                        @endcan
                                        @can('edit-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#edmakrabModal">Edit</button>
                                        @endcan
                                        
                                    </div>
                                    @can('delete-post')
                                    <div class="my-2 mx-4">
                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                    </div>
                                    @endcan
                                </div>
                                <small class="text-body-secondary">March 17</small>
                            </div>

                            <div class="modal fade" id="makrabModal" tabindex="-1" aria-labelledby="exModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/makrab.jpeg" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">BEM FMIPA (Badan Eksekutif Mahasiswa)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Aditya Rizki Ramadhan</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4 border-bottom border-2">
                                                        <p class="fs-5 fw-medium">Assalamualaikum,</p>
                                                        <p class="fs-5 fw-medium">👋🏻Haloo,Selamat malam kawan kawan HMIF
                                                        </p>
                                                        <p class="fs-5 fw-medium">Keluarga Besar MIPA (KBM) bakalan ngadain
                                                            Malam Keakraban (MAKRAB) pada : </p>
                                                        <p class="fs-5 fw-medium">
                                                            📆Hari,Tanggal : Jumat, 17 Maret 2023 <br>
                                                            📍Tempat : Rumoh Aceh Lampineung</p>
                                                        <p class="fs-5 fw-medium">Buat kawan kawan bisa gabung nihhh untuk
                                                            join MAKRAB biar saling berkenalan dengan keluarga besar FMIPA
                                                            lainnya..🤝 <br>
                                                            Ditunggu kehadiraannyaa yaa 🫶</p>
                                                        <p class="fs-5 fw-medium">Thankyouu👋🏻👋🏻</p>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <img src="{{ Vite::asset('public/assets/img/post/likea.png') }}"
                                                            id="like" style="width: 35px" alt=""
                                                            onclick="changeImage(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edmakrabModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/makrab.jpeg" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">BEM FMIPA (Badan Eksekutif Mahasiswa)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Aditya Rizki Ramadhan</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4">
                                                        <div class="md-form flex">
                                                            <label for="form10" class="fs-6 fw-base mx-1">Edit
                                                                Caption</label>
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <textarea id="form10" class="xl-textarea form-control mb-3" rows="15">Assalamualaikum,
👋🏻Haloo,Selamat malam kawan kawan HMIF 
                                                                
Keluarga Besar MIPA (KBM) bakalan ngadain Malam Keakraban (MAKRAB) pada :

📆Hari,Tanggal : Jumat, 17 Maret 2023
📍Tempat : Rumoh Aceh Lampineung
                                                                
Buat kawan kawan bisa gabung nihhh untuk join MAKRAB biar saling berkenalan dengan keluarga besar FMIPA lainnya..🤝
Ditunggu kehadiraannyaa yaa 🫶
                                                                
Thankyouu👋🏻👋🏻
                                                                </textarea>
                                                            <div class="d-flex justify-content-end mx-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary my-4 ">Simpan</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="assets/img/post/infdev.png" class="card-img-top"
                            style="height:350px; object-fit:cover; object-position:0 40%;"
                            alt="Informatics Developer Club">
                        <div class="card-body">
                            <p class="card-text">HMIF - USK</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-evenly">
                                    <div class="btn-group">
                                        @can('view-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#infdevModal">View</button>
                                        @endcan
                                        @can('edit-post')
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="modal" data-bs-target="#edinfdevModal">Edit</button>
                                        @endcan
                                        
                                    </div>
                                    @can('delete-post')
                                    <div class="my-2 mx-4">
                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                    </div>
                                    @endcan
                                    
                                </div>
                                <small class="text-body-secondary">March 14</small>
                            </div>

                            <div class="modal fade" id="infdevModal" tabindex="-1" aria-labelledby="exModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/infdev.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Teuku Rifal Aulia</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4 border-bottom border-2">
                                                        <p class="fs-5 fw-medium">[𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝐂𝐋𝐔𝐁𝐒]</p>
                                                        <p class="fs-5 fw-medium">Hi, programmers👋 <br>
                                                            Kesempatan baru nich buat kalian yang ingin menambah wawasan,
                                                            relasi dan tentunya menambah skill diri dengan bergabung bersama
                                                            kami di</p>
                                                        <p class="fs-5 fw-medium">👩🏻‍💻 INFORMATICS DEVELOPER CLUB</p>
                                                        <p class="fs-5 fw-medium">Informatic Developer Club merupakan wadah
                                                            diskusi yang disajikan oleh HMIF USK dengan tujuan saling
                                                            bertukar saling bertukar pikiran dan informasi tentang
                                                            teknologi.</p>
                                                        <p class="fs-5 fw-medium">Syarat dan ketentuan : <br>
                                                            Mahasiswa aktif Informatika USK</p>
                                                        <p class="fs-5 fw-medium">Jenis Club : <br>
                                                            1. Data Science Club <br>
                                                            2. Web Development Club <br>
                                                            3. UI & UX Design Club</p>
                                                        <p class="fs-5 fw-medium">🎁 Benefit : <br>
                                                            1. Menambah relasi <br>
                                                            2. Berbagi ilmu <br>
                                                            3. Meningkatkan skill</p>
                                                        <p class="fs-5 fw-medium">🔥 Register Now 🔥 <br>
                                                            http://bit.ly/InformaticsClub2023</p>
                                                        <p class="fs-5 fw-medium">📩 Contact Person : <br>
                                                            📲 Anas Naufal Al-kiram <br>
                                                            wa.me/+6289503238724</p>
                                                        <p class="fs-5 fw-medium">________________ <br>
                                                            𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐏𝐏𝐌 <br>
                                                            𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑 <br>
                                                            𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘</p>
                                                    </div>
                                                    <div class="p-3 flex">
                                                        <img src="{{ Vite::asset('public/assets/img/post/likea.png') }}"
                                                            id="like" style="width: 35px" alt=""
                                                            onclick="changeImage(this)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="edinfdevModal" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                    <div class="modal-content rounded-25">
                                        <div class="modal-body py-0 px-0">
                                            <div class="row">
                                                <div class="col">
                                                    <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                    border-bottom-left-radius: 10px;"
                                                        src="assets/img/post/infdev.png" alt="">
                                                </div>
                                                <div class="col mx-5 my-3 margin-left-5 text-dark">
                                                    <div class="border-bottom border-2 px-3">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"><img
                                                                    src="{{ Vite::asset('public/assets/img/x-solid.svg') }}"
                                                                    class="w-80 h-auto" alt="close"></button>
                                                        </div>
                                                        <p class="fw-bold fs-3 lh-sm">HMIF (Himpunan Mahasiswa Informatika)
                                                            - USK
                                                        </p>
                                                        <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari <span
                                                                class="text-primary">Teuku Rifal Aulia</span> </p>

                                                    </div>
                                                    <div class="p-3 py-4">
                                                        <div class="md-form flex">
                                                            <label for="form10" class="fs-6 fw-base mx-1">Edit
                                                                Caption</label>
                                                            <i class="fas fa-pencil-alt prefix"></i>
                                                            <textarea id="form10" class="xl-textarea form-control mb-3" rows="15">[𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝐂𝐋𝐔𝐁𝐒]

Hi, programmers👋
Kesempatan baru nich buat kalian yang ingin menambah wawasan, relasi dan tentunya menambah skill diri dengan bergabung bersama kami di
                                                                
👩🏻‍💻 INFORMATICS DEVELOPER  CLUB
                                                                
Informatic Developer Club merupakan wadah diskusi yang disajikan oleh HMIF USK dengan tujuan saling bertukar saling bertukar pikiran dan informasi tentang teknologi.
                                                                
Syarat dan ketentuan :
Mahasiswa aktif Informatika USK
                                                                
Jenis Club :
1. Data Science Club
2. Web Development Club
3. UI & UX Design Club
                                                                
🎁 Benefit :
1. Menambah relasi
2. Berbagi ilmu
3. Meningkatkan skill
                                                                
🔥 Register Now 🔥
http://bit.ly/InformaticsClub2023
                                                                
📩 Contact Person :
📲 Anas Naufal Al-kiram 
    wa.me/+6289503238724
                                                                
________________
𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐏𝐏𝐌
𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟑
𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐈𝐍𝐅𝐈𝐍𝐈𝐓𝐘
                                                                </textarea>
                                                            <div class="d-flex justify-content-end mx-5">
                                                                <button type="submit"
                                                                    class="btn btn-primary my-4 ">Simpan</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #like {
            cursor: pointer;
            transition: 0.3s;
        }
    </style>

    <script>
        function changeImage(x) {

            let before = "http://127.0.0.1:5173/public/assets/img/post/likea.png";
            let after = "http://127.0.0.1:5173/public/assets/img/post/liked.png";
            let img = x.src;
            if (img == before) {
                x.src = after;
            } else {
                x.src = before;
            }
        }
    </script>
@endsection

@push('js')
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
