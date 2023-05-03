@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Roles'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="d-flex flex-column">
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name" placeholder="editor"
                                value="{{ $role->name }}">
                            <label for="name">Role Name</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger d-flex align-items-center text-dark" role="alert">
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                        <div class="d-flex justify-content-center">
                            <button type="submit"
                                class="px-4 py-2 mb-2 badge rounded-pill bg-success border-0">Update</button>
                        </div>
                    </form>
                </div>
                <div class="mt-2 p-2">
                    <h2 class="fs-2 fw-bold">Role Permissions</h2>
                    
                    <div class="mt-4 p-2">
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                            <div>
                                <span>{{ $role_permission->name }}</span>
                                <form method="POST" class="d-inline-block" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id])  }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent" type="submit"><img src="{{ Vite::asset('public/assets/img/min.png') }}" alt="del"></button>
                                </form>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="permission">Permission Name</label>
                                <select id="permission" name="permission" autocomplete="permission-name" class="form-select" aria-label="Default select example">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            @error('name')
                                <div class="alert alert-danger d-flex align-items-center text-dark" role="alert">
                                    <div>
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.roles.index') }}"
                                    class="px-4 mx-4 py-2 mb-2 badge rounded-pill bg-secondary">Back to Roles Page</a>
                                <button type="submit"
                                    class="px-4 py-2 mb-2 badge rounded-pill bg-success border-0">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
