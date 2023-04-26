<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    {{-- <div class="container">
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
                        {{-- <a href="{{ url('/dashboard') }}"
                            class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">Dashboard</a>
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
    </div> --}}

    <div class="navbar">
        <div class="flex-1">
            <a class="navbar-brand text-white font-weight-bolder ms-sm-3 fs-4">OniiRoom</a>
        </div>
        <div class="flex-none gap-2">
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
                </ul>
            </div>
            @if (Route::has('login'))
                        @auth
                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                                <div class="rounded-full mt-2">
                                    <img src="/assets/img/brooke.jpg"/>
                                </div>
                            </label>
                            <ul tabindex="0"
                                class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a class="justify-between">
                                        Profile
                                        <span class="badge">New</span>
                                    </a>
                                </li>
                                <li><a>Settings</a></li>
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a href="route('logout')"
                                        onclick="event.preventDefault();
    this.closest('form').submit();"
                                        >Log out</a></li>
                                </form>
                            </ul>
                        </div>
                        @else
                            <div class="nav-item my-auto ms-3 ms-lg-0">
                                <a href="{{ route('login') }}"
                                    class="btn btn-sm btn-outline-white btn-round mb-0 me-1 mt-2 mt-md-0">Login</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="nav-item my-auto ms-3 ms-lg-0">
                                    <a href="{{ route('register') }}"
                                        class="btn btn-sm  bg-white text-dark  btn-round mb-0 me-1 mt-2 mt-md-0">Register</a>
                                </div>
                            @endif
                        @endauth
                    @endif
            {{-- <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="rounded-full mt-2">
                        <img src="/assets/img/brooke.jpg"/>
                    </div>
                </label>
                <ul tabindex="0"
                    class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</nav>
