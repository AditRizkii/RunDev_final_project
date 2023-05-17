@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Surat Terkirim'])
    <div class="card bg-slate-400 mx-4">
        <div class="card-body">
            <a href="{{ route('surat.index') }}" class="badge bg-secondary">Back</a>
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">Pengirim</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Pesan</th>
                      <th scope="col">Lampiran</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($surats as $surat)  
                    @php
                        $pengirim = \App\Models\User::where('id', $surat->id_pengirim)->first();
                    @endphp                      
                        <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $pengirim->name }}</td>
                        <td>{{ $surat->subject }}</td>
                        <td>{{ $surat->pesan }}</td>
                        <td><a href="{{ url('kirimsurat/' . $surat->file) }}" download>{{ $surat->file }}</a></td>
                        <td>
                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="border-0 badge bg-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>

    </div>

    <style>
        .font {
            font-size: small;
            font-weight: 600;
            text-align: center;
        }
    </style>

    <div class="container-fluid py-4">
        @include('admin.layouts.partials.footer')
    </div>
@endsection
