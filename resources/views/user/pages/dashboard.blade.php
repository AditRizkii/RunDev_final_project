@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col">
                <img src="assets/img/mipa.png" alt="fmipa" class="z-3 position-absolute h-80 w-55">
                <div class="z-5 position-absolute fs-1 fw-bold text-white mt-10 m-5">Fakultas<br>Matematika dan<br>Ilmu
                    Pengetahuan Alam<br>(FMIPA)</div>
            </div>
            
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-light-subtle text-black">
                    <div class="card-body">
                        <h2>Berita Terkini</h2>

                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between" id="news" >
                            <div class="pr-3">
                                <a class="font-weight-bold text-lg" href="https://informatika.unsyiah.ac.id/webinf/hmif-usk-bersama-gdsc-usk-sukses-menyelenggarakan-git-academy-hmif-x-gdsc-usk/">HMIF USK BERSAMA GDSC USK SUKSES MENYELENGGARAKAN GIT ACADEMY HMIF X GDSC USK</a>
                                <div class="fs-12">
                                    <span class="mr-2">Posted </span>18 March 2023
                                </div>
                            </div>
                            <div class="rotate-img w-75">
                                <img src="https://informatika.unsyiah.ac.id/webinf/wp-content/uploads/2023/04/git-01.jpg" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div>

                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between" id="news">
                            <div class="pr-3">
                                <a class="font-weight-bold text-lg" href="https://informatika.unsyiah.ac.id/webinf/profil-yoan-rifqi-candra-ketua-hmif-periode-2022-2023-terpilih/">PROFIL YOAN RIFQI CANDRA, KETUA HMIF PERIODE 2022/2023 TERPILIH</a>
                                <div class="fs-12">
                                    <span class="mr-2">Posted </span>23 Feb 2023
                                </div>
                            </div>
                            <div class="rotate-img w-60">
                                <img src="https://informatika.unsyiah.ac.id/webinf/wp-content/uploads/2023/02/yoan-e.jpg" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div>

                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between" id="news">
                            <div class="pr-3">
                                <a class="font-weight-bold text-lg" href="https://informatika.unsyiah.ac.id/webinf/pelantikan-pengurus-baru-himpunan-mahasiswa-informatika-usk-hmif-2023/">KETUA JURUSAN INFORMATIKA MELANTIK PENGURUS BARU HMIF-USK 2023</a>
                                <div class="fs-12">
                                    <span class="mr-2">Posted </span>20 Feb 2023
                                </div>
                            </div>
                            <div class="rotate-img w-60">
                                <img src="https://informatika.unsyiah.ac.id/webinf/wp-content/uploads/2023/02/hmif-2.jpg" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div>
                        
                        <div class="d-flex border-bottom-blue pb-4 pt-4 align-items-center justify-content-between" id="news">
                            <div class="pr-3">
                                <a class="font-weight-bold text-lg" href="https://informatika.unsyiah.ac.id/webinf/integer-2023-sukses-dilaksanakan-oleh-hmif-usk/">INTEGER 2023 SUKSES DILAKSANAKAN OLEH HMIF-USK</a>
                                <div class="fs-12">
                                    <span class="mr-2">Posted </span>18 Feb 2023
                                </div>
                            </div>
                            <div class="rotate-img w-45">
                                <img src="https://informatika.unsyiah.ac.id/webinf/wp-content/uploads/2023/04/int-01.png" alt="thumb" class="img-fluid img-lg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <style>
        #news:hover{
            background-color: rgb(248,248,248);
            background-opacity: 1.0;
            padding: 10px;
        }
    </style>
@endpush
