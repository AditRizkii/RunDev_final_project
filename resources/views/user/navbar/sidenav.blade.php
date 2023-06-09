<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        {{-- <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank"> --}}
        <a class="navbar-brand m-0" href="{{ route('home') }}">
            <img src="{{ Vite::asset('public/assets/img/hehe.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">OniiRoom</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'ormawa' ? 'active' : '' }}"
                    href="{{ route('ormawa') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-regular fa-users text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ormawa</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'post' ? 'active' : '' }}"
                    href="{{ route('post') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-duotone fa-trophy text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Post</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'chatify' ? 'active' : '' }}"
                    href="{{ route('chatify') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-duotone fa-comments text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Chat</span><i class="fa-solid fa-message-captions"></i>
                </a>
            </li>

            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'forum' ? 'active' : '' }}"
                    href="{{ url(config('forum.web.router.prefix')) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        {{-- <i class="fa-brands fa-rocketchat fa-sm" style="color: #bf78d9;"></i> --}}
                        <i class="fa fa-solid fa-comment-dots text-primary text-sm opacity-10"></i>

                    </div>
                    <span class="nav-link-text ms-1">Forum</span>
                </a>
            </li>

            @can('kirim-surat')
                <li class="nav-item">
                    {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                    <a class="nav-link {{ Route::currentRouteName() == 'surat.index' ? 'active' : '' }}"
                        href="{{ route('surat.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-solid fa-envelope-open-text text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kirim Surat</span>
                    </a>
                </li>
            @endcan


            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}"> --}}
                <a class="nav-link {{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}"
                    href="{{ route('profile.edit') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            @if (Route::has('login'))
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item">
                            <a class="nav-link" href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path
                                            d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                    </svg>
                                </div>
                                <span class="nav-link-text ms-1">Log Out</span>
                            </a>
                        </li>
                    </form>

                @endauth
            @endif
            {{-- <li class="nav-item"> --}}
            {{-- <a class="nav-link " href="{{ route('sign-in-static') }}"> --}}
            {{-- <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item"> --}}
            {{-- <a class="nav-link " href="{{ route('sign-up-static') }}"> --}}
            {{-- <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
