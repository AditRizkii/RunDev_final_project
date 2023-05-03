@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Roles'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.roles.create') }}" class="px-4 py-2 mb-2 badge rounded-pill bg-success">Create Role</a>
                </div>
                <table class="table table-hover align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Role Name</th>
                            <th><div class="d-flex justify-content-end">
                                <div class="ms-3">
                                    Actions
                                </div>
                            </div></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-light mb-1">{{ $role->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <div class="mx-2">
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="badge bg-primary">Edit</a> | 
                                            <form method="POST" class="d-inline-block" action="{{ route('admin.roles.destroy', $role->id)  }}" onsubmit="return confirm('Apakah Anda Yakin?')">
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
