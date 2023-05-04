@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Users'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Users Name</th>
                            <th>Email</th>
                            <th>NPM</th>
                            <th><div class="d-flex justify-content-end">
                                <div class="ms-3">
                                    Actions
                                </div>
                            </div></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
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
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <div class="mx-2">
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="badge bg-primary">Roles</a> |  
                                            <form method="POST" class="d-inline-block" action="{{ route('admin.users.destroy', $user->id)  }}" onsubmit="return confirm('Apakah Anda Yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 badge bg-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
