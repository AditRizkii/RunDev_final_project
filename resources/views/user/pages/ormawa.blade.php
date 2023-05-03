@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Ormawa'])
    <div style="margin-left: 100px">
        <div class="container" style="width: 500px">
            <div class="row mx-auto" id="satu">
                <button type="button" class="px-auto mx-6" data-bs-toggle="modal" data-bs-target="#BEMFMIPA">
                    <img src="assets/img/bem.png" class="position-absolute justify-self-center" alt="Gambar"
                        style="border: solid black; border-radius: 100%; height: auto; width: 240px; margin-top:10px; margin-left:-230px">
                    <p class="z-5 position-absolute"
                        style="color: white; font-size: 30px; margin-top: 260px; margin-left:22px; text-align:center; font-weight:600">BEM FMIPA</p>
                </button>
            </div>
        </div>
        <div class="container position-absolute" style="margin-top: 350px">
            <div class="row">
                <button type="button" class="col" style="margin-left:20px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HMIF">
                    <img src="assets/img/informatika.png" alt="Gambar 1" 
                    style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
                <button type="button" class="col" style="margin-left: 250px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HIMAFAR">
                    <img src="assets/img/farmasi.png" alt="Gambar 2"
                        style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
                <button type="button" class="col" style="margin-left: 230px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HIMATIKA">
                    <img src="assets/img/matematika.png" alt="Gambar 3"
                        style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
            </div>
            <div class="row">
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:-130px; color: rgb(2, 36, 109); font-weight:600">HMIF</p>
                </div>
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:40px; color: black; font-weight:600">HIMAFAR</p>
                </div>
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:150px; color: black; font-weight:600">HIMATIKA</p>
                </div>
            </div>
        </div>
        <div class="container position-absolute" style="margin-top: 750px">
            <div class="row">
                <button type="button" class="col" style="margin-left:20px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HIMASTA">
                    <img src="assets/img/statistika.png" alt="Gambar 1"
                        style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
                <button type="button" class="col" style="margin-left: 250px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HMB">
                    <img src="assets/img/biologi.png" alt="Gambar 2"
                        style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
                <button type="button" class="col" style="margin-left: 230px; padding: 10px 90px 5px 10px" data-bs-toggle="modal" data-bs-target="#HMMI">
                    <img src="assets/img/hmmi.png" alt="Gambar 3"
                        style="border: solid black; border-radius: 100%; height: auto; width: 150%">
                </button>
            </div>
            <div class="row">
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:-135px; color: black; font-weight:600">HIMASTA</p>
                </div>
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:40px; color: black; font-weight:600">HMB</p>
                </div>
                <div class="col">
                    <p style="text-align:center; font-size:30px; margin-left:170px; color: black; font-weight:600">HMMI</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container position-absolute" style="margin-top: 1150px; margin-left:120px">
        <div class="row">
            <button type="button" class="col" style="padding-right:-200px" data-bs-toggle="modal" data-bs-target="#HIMAFIS">
                <img src="assets/img/fisika.png" alt="Gambar 1" style="border: solid black; border-radius: 100%; height: auto; width: 90%;">
            </button>
            <p style=" font-size:30px; padding-top:10px; color: black; text-align:center; margin: -5px 0px 100px 0px; font-weight:600">HIMAFIS</p>
        </div>
    </div>
    </div>

    <!-- Modal 1 : BEM FMIPA-->
    <div class="modal fade" id="BEMFMIPA" tabindex="-1" aria-labelledby="BEMFMIPALabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Badan Eksekutif Mahasiswa FMIPA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:23px; margin-bottom:30px">KARSA ARUNIKA</p>
            <p>Ketua : Kalkausar Muda Balia</p>
            <p style="margin-top: -15px">Wakil Ketua : Muhammad Nurifai</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 2 : HMIF-->
    <div class="modal fade" id="HMIF" tabindex="-1" aria-labelledby="HMIFLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Informatika</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">INFINITY</p>
            <p>Ketua : Yoan Rifqi Candra</p>
            <p style="margin-top: -15px">Wakil Ketua : Raisulwathan</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 3 : HIMAFAR-->
    <div class="modal fade" id="HIMAFAR" tabindex="-1" aria-labelledby="HIMAFARLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Farmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">INSILICO</p>
            <p>Ketua : Addrian Maulana</p>
            <p style="margin-top: -15px">Wakil Ketua : Ziyan Naqiza</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 4 : HIMATIKA-->
    <div class="modal fade" id="HIMATIKA" tabindex="-1" aria-labelledby="HIMATIKALabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Matematika</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">LAPLACE</p>
            <p>Ketua : Muhammad Al Hudan</p>
            <p style="margin-top: -15px">Wakil Ketua : Haikal Muksalmina</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 5 : HIMASTA-->
    <div class="modal fade" id="HIMASTA" tabindex="-1" aria-labelledby="HIMASTALabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa statistika</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">KORELASI</p>
            <p>Ketua : M.Aulia Rasky</p>
            <p style="margin-top: -15px">Wakil Ketua : Muhammad Khairul</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 6 : HMB-->
    <div class="modal fade" id="HMB" tabindex="-1" aria-labelledby="HMBLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Biologi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">KALPATARU</p>
            <p>Ketua : Muhammad Hanif</p>
            <p style="margin-top: -15px">Wakil Ketua : Syukli Yanjili</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 7 : HMMI-->
    <div class="modal fade" id="HMMI" tabindex="-1" aria-labelledby="HMMILabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Manajemen Informatika</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">SINTAKS</p>
            <p>Ketua : Habib Ahmad</p>
            <p style="margin-top: -15px">Wakil Ketua : M. Abyan Khairi</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    <!-- Modal 8 : HIMAFIS-->
    <div class="modal fade" id="HIMAFIS" tabindex="-1" aria-labelledby="HIMAFISLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Himpunan Mahasiswa Fisika</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto" alt="close"></button>
            </div>
            <div class="modal-body">
            <p style="text-align: center; font-size:25px; margin-bottom:30px">SOLITON</p>
            <p>Ketua : Birrul Walidain</p>
            <p style="margin-top: -15px">Wakil Ketua : Muhammad Raden Yudie Sanjaya</p>
            </div>
            <div class="modal-footer"></div>
        </div>
        </div>
    </div>

    {{-- Style --}}
    <style>
        .col {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        button {
            border: none;
            background: none;
            border-radius: 100%;
        }

    </style>

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
