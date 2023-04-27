@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Ormawa'])
    <div class="container-fluid py-4">
        <div>
            <img src="assets/img/bem.png" alt="bem" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-left :400px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :165px; margin-left :345px;">BADAN EKSEKUTIF MAHASISWA FMIPA</div>
        </div>
        <div>
            <img src="assets/img/informatika.png" alt="informatika" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :220px; margin-left :100px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :385px; margin-left :35px;">HIMPUNAN MAHASISWA INFORMATIKA</div>

            <img src="assets/img/farmasi.png" alt="farmasi" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :220px; margin-left :400px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :385px; margin-left :360px;">HIMPUNAN MAHASISWA FARMASI</div>
            
            <img src="assets/img/matematika.png" alt="matematika" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :220px; margin-left :700px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :385px; margin-left :650px;">HIMPUNAN MAHASISWA MATEMATIKA</div>

            <img src="assets/img/statistika.png" alt="informatika" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :440px; margin-left :100px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :605px; margin-left :45px;">HIMPUNAN MAHASISWA STATISTIKA</div>

            <img src="assets/img/biologi.png" alt="farmasi" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :440px; margin-left :400px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :605px; margin-left :360px;">HIMPUNAN MAHASISWA BIOLOGI</div>
            
            <img src="assets/img/hmmi.png" alt="matematika" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :440px; margin-left :700px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :605px; margin-left :600px; text-align: center;">HIMPUNAN MAHASISWA MANAJEMEN INFORMATIKA</div>

            <img src="assets/img/fisika.png" alt="informatika" class="z-3 position-absolute" style="border: solid black; border-radius: 100%; margin-top :660px; margin-left :100px; height: 160px; width: 160px">
            <div class="z-5 position-absolute" style="color: black; font-size: 15px; margin-top :825px; margin-left :70px;">HIMPUNAN MAHASISWA FISIKA</div>
        </div>
    </div>
    {{--  class="col-xl-3 col-sm-6 mb-xl-0 mb-4" --}}
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
