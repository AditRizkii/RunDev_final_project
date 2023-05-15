<div class="modal fade" id="create-post" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content rounded-25">
            <div class="modal-body py-0 px-0">
                <div class="row">
                    {{-- <div class="col">
                        <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                        border-bottom-left-radius: 10px;"
                            src="{{ Vite::asset('public/assets/img/post/' . $post->gambar) }}" alt="">
                    </div> --}}
                    <div class="col mx-5 my-3 margin-left-5 text-dark">
                        <div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                                        src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto"
                                        alt="close"></button>
                            </div>
                            <div>
                                <form action="{{ route('userStore') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="content" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="input-group mb-3 border-bottom border-2">
                                        <input type="file" class="form-control mb-3" id="gambar" name="gambar"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary my-4 ">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
