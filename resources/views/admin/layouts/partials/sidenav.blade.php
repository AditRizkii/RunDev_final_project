<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        {{-- <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank"> --}}
            <a class="navbar-brand m-0" href="{{ route('admin.index') }}">
            <img src="{{ Vite::asset('public/assets/img/hehe.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">OniiRoom</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}"> --}}
                    <a class="nav-link active" href="{{ route('admin.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                    <a class="nav-link {{ request()->routeIs('admin.roles.index') == 'admin.roles.index' ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-solid fa-user-lock text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                    <a class="nav-link {{ request()->routeIs('admin.permissions.index') == 'admin.permissions.index' ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}"> --}}
                    <a class="nav-link {{ request()->routeIs('admin.users.index') == 'admin.users.index' ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                    <a class="nav-link {{ Route::currentRouteName() == 'ormawa' ? 'active' : '' }}" href="{{ route('ormawa') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-regular fa-users text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ormawa Management</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}"> --}}
                    <a class="nav-link" href="{{ route('post.show') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-regular fa-users text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Post</span>
                </a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}"> --}}
                    <a class="nav-link {{ Route::currentRouteName() == 'post' ? 'active' : '' }}" href="{{ route('post') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-duotone fa-trophy text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Post Management</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
