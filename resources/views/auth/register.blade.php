@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('user.navbar.login')
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Use these awesome forms to login or create new account in your
                                        project for free.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="flex flex-col mb-3">
                                            <input required type="text" name="name" class="form-control"
                                                placeholder="Name" aria-label="Name" value="{{ old('name') }}">
                                            @error('name')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input required type="email" name="email"
                                                class="form-control form-control-lg" value="{{ old('email') }}"
                                                aria-label="Email" placeholder="Email">
                                            @error('email')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input required type="tel" name="npm"
                                                class="form-control form-control-lg" value="{{ old('npm') }}"
                                                aria-label="NPM" placeholder="NPM" required pattern="[0-9]{12,13}">
                                            @if (Session::has('message'))
                                            <p class="text-danger text-xs pt-1"> {{ Session::get('message') }} </p>
                                            @endif
                                            @error('npm')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input required type="password" name="password"
                                                class="form-control form-control-lg" aria-label="Password"
                                                placeholder="Password">
                                            @error('password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input required id="password_confirmation" type="password"
                                                name="password_confirmation" class="form-control form-control-lg"
                                                aria-label="Password" required placeholder="Confirm Password"
                                                autocomplete="new-password">
                                            @error('password')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                            @error('password_confirmation')
                                                <p class="text-danger text-xs pt-1"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Already registered?
                                        <a href="{{ route('login') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('assets/img/login.svg');
              background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Halo, Teman!"</h4>
                                <p class="text-white position-relative">Daftarkan diri anda dan mulai gunakan layanan kami
                                    segera</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
