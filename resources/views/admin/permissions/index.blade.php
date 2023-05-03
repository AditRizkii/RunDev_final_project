@extends('admin.adminApp', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('admin.layouts.partials.topnav', ['title' => 'Permissions'])
    <div class=" card shadow-lg mx-4 card-profile-top">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.permissions.create') }}" class="px-4 py-2 mb-2 badge rounded-pill bg-success">Create Permission</a>
                </div>
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Permission Name</th>
                            <th><div class="d-flex justify-content-end">
                                <div class="ms-3">
                                    Actions
                                </div>
                            </div></th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-3">
                                            <p class="fw-light mb-1">{{ $permission->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <div class="mx-2">
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="badge bg-primary">Edit</a> |
                                            <a href="" class="badge bg-danger">Delete</a>
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

