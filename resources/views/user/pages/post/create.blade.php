@extends('students.layout')
@section('content')

    <div class="card">
        <div class="card-header">Students Page</div>
        <div class="card-body">

            <form action="{{ route('post.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                {!! csrf_field() !!}
                <label for="nama">Name</label></br>
                <input type="text" name="nama" id="nama" class="form-control"></br>

                <label for="content">content</label></br>
                <textarea maxlength="500" name="content" id="content" class="form-control"></textarea></br>

                <label for="gambar">Foto 1</label></br>
                <input type="file" accept="image/png, image/jpeg" name="gambar" id="gambar"
                    class="form-control"></br>

                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop