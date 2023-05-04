@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Roles'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Users Name</th>
                            <th>Email</th>
                            <th>NPM</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-light mb-1">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td><td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-light mb-1">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-light mb-1">{{ $user->npm }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
                <div class="mt-2 p-2">
                    <h2 class="fs-2 fw-bold">Roles</h2>
                    <div class="mt-1 mb-4 ml-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                            <div class="ms-1">
                                <span>{{ $user_role->name }}</span>
                                <form method="POST" class="d-inline-block" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id])  }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent" type="submit"><img src="{{ Vite::asset('public/assets/img/min.png') }}" alt="del"></button>
                                </form>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="role">Role Name</label>
                                <select id="role" name="role" autocomplete="role-name" class="form-select" aria-label="Default select example">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            @error('role')
                                <div class="alert alert-danger d-flex align-items-center text-dark" role="alert">
                                    <div>
                                        {{ $message }}
                                    </div>
                                </div>
                            @enderror
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="px-4 py-2 mb-2 badge rounded-pill bg-success border-0">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-2 p-2">
                    <h2 class="fs-2 fw-bold">Permissions</h2>
                    <div class="mt-1 mb-4 ml-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                            <div class="ms-1">
                                <span>{{ $user_permission->name }}</span>
                                <form method="POST" class="d-inline-block" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id])  }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="border-0 bg-transparent" type="submit"><img src="{{ Vite::asset('public/assets/img/min.png') }}" alt="del"></button>
                                </form>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
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
                                <a href="{{ route('admin.users.index') }}"
                                    class="px-4 mx-4 py-2 mb-2 badge rounded-pill bg-secondary">Back</a>
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
