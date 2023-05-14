@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Postingan'])
    @can('create-post')
        <div class="position-absolute z-10 mx-5 mt-3">
            <a href="#" data-bs-toggle="modal" data-bs-target="#create-post">
                <span class="badge rounded-pill bg-success">Create post</span>
            </a>
        </div>
    @endcan

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 g-5">
                @if ($posts != null)
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card shadow-sm">
                                {{-- <img src="{{ url('assets/img') }}/{{ $post->gambar }}" class="card-img-top"
                                    style="height:350px; object-fit:cover; object-position:0 68%;" alt="Kunjungan Kerja"> --}}
                                <img src="{{ Vite::asset('public/assets/img/post/' . $post->gambar) }}" class="card-img-top"
                                    style="height:350px; object-fit:cover; object-position:0 68%;" alt="Kunjungan Kerja">
                                <div class="card-body">
                                    <p class="card-text">{{ $post->ormawa }} - USK</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex justify-content-evenly">
                                            <div class="btn-group">

                                                <button type="button" class="btn btn-sm btn-outline-secondary view"
                                                    data-bs-toggle="modal" data-bs-target="#kunkerModal{{ $post->id }}"
                                                    data-publisher="{{ $post->poster }}"
                                                    value="{{ $post->id }}">View</button>

                                                @can('edit-post')
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edkunkerModal{{ $post->id }}">Edit</button>
                                                @endcan

                                            </div>
                                            @can('delete-post')
                                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                                    id="delete-post{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="my-2 mx-4"
                                                        onclick="event.preventDefault(); document.getElementById('delete-post{{ $post->id }}').submit();">
                                                        <i class="fa fa-duotone fa-trash text-sm"></i>
                                                    </div>
                                                </form>
                                            @endcan
                                        </div>
                                        <small class="text-body-secondary">April 14</small>
                                    </div>
                                    {{-- <script>
                                        $(document).on('click', '.view', function() {
                                            // var url = "domain.com/yoururl";
                                            var post_id = $(this).val();

                                            function(data) {
                                                //success data
                                                console.log(data);
                                                // $('#tour_id').val(data.id);
                                                // $('#post').attr('src', data.);
                                                // $('#details').val(data.details);
                                                // $('#btn-save').val("update");
                                                // $('#myModal').modal('show');
                                            }
                                        });
                                    </script> --}}



                                    @include('admin.posts.edit')
                                    @include('admin.posts.view')
                                    @include('admin.posts.create')
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
