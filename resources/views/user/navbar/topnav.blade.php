<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 z-0 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">OniiRoom</a></li>
                <li class="breadcrumb-item text-sm text-white" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Log out</span>
                        </a>
                    </form>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <?php
                // $surat_terkirim = \App\Models\Surat::where('id_pengirim', Auth::user()->id)->first();
                $surat_diterima = \App\Models\Surat::where('id_penerima', Auth::user()->id)->get();
                $notif = 0;
                if (empty($surat_diterima)) {
                    $notif = 0;
                } else {
                    $notif = \App\Models\Surat::where('id_penerima', Auth::user()->id)->count();
                }
                
                ?>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0 position-relative mx-3"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                        @if ($notif>0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 8px">
                            {{ $notif }}
                            <span class="visually-hidden">unread messages</span>
                        </span>    
                        @endif
                        
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        @foreach ($surat_diterima as $item)
                        @if ($notif>0)
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <a href="{{ route('surat.masuk', Auth::user()->id) }}">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            @php
                                                $nama_pengirim = \App\Models\User::where('id', $item->id_pengirim)->first();
                                            @endphp
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> {{ $nama_pengirim->name }}
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                A few second ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                
                            </a>
                        </li>
                        @endif
                        
                        @endforeach
                    </ul>
                </li>
                <li>
                    @auth
                        @role('admin')
                            <div class="dropdown">
                                <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/assets/img/profil.png" alt="profil" class="avatar avatar-sm  me-3 ">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu text-dark" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                                </ul>
                            </div>
                        @else
                            <div
                                class="text-white font-weight-bold d-flex flex-row row-gap-0 justify-content-center align-items-center">
                                <img src="/assets/img/profil.png" alt="profil" class="avatar avatar-sm  me-1 ">
                                {{ Auth::user()->name }}
                            </div>
                        @endrole
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
