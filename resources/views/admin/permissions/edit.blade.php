@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Permissions / Edit'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="d-flex flex-column">
                    <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name" placeholder="editor" value="{{ $permission->name }}">
                            <label for="name">Permission Name</label>
                          </div>
                          @error('name')
                          <div class="alert alert-danger d-flex align-items-center text-dark" role="alert">
                            <div>
                            {{ $message }}
                            </div>
                          </div>
                              
                          @enderror
                          <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.permissions.index') }}" class="px-4 mx-4 py-2 mb-2 badge rounded-pill bg-secondary">Back to Permissions Page</a>
                            <button type="submit" class="px-4 py-2 mb-2 badge rounded-pill bg-success border-0">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
