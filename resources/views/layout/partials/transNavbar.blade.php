<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
        <a class="navbar-brand text-white font-weight-bolder ms-sm-3 fs-4"
            href="https://demos.creative-tim.com/soft-ui-design-system/presentation.html" rel="tooltip"
            title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
            OniiRoom
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-4" id="navigation">
            <ul class="navbar-nav navbar-nav-hover w-100">
                <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-6">
                    <a class="nav-link ps-2 d-flex justify-between cursor-pointer align-items-center"
                        id="dropdownMenuPages8" data-bs-toggle="dropdown" aria-expanded="false">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                        Team
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                        About Us
                    </a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="nav-link ps-2 d-flex justify-between cursor-pointer align-items-center">Dashboard</a>
                        <img src="assets/img/profile-circle.svg" class="h-6 w-6" alt="">
                    @else
                        <li class="nav-item my-auto ms-3 ms-lg-0">
                            <a href="{{ route('login') }}"
                                class="btn btn-sm btn-outline-white btn-round mb-0 me-1 mt-2 mt-md-0">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item my-auto ms-3 ms-lg-0">
                                <a href="{{ route('register') }}"
                                    class="btn btn-sm  bg-white  btn-round mb-0 me-1 mt-2 mt-md-0">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
