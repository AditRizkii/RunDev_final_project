<div class="modal fade" id="edkunkerModal{{ $post->id }}" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content rounded-25">
            <div class="modal-body py-0 px-0">
                <div class="row">
                    <div class="col">
                        <img style="width: 100%; height: 100%; border-top-left-radius: 10px;
                                                        border-bottom-left-radius: 10px;"
                            src="{{ Vite::asset('public/assets/img/post/' . $post->gambar) }}" alt="">
                    </div>
                    <div class="col mx-5 my-3 margin-left-5 text-dark">
                        <div class="border-bottom border-2 px-3">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img
                                        src="{{ Vite::asset('public/assets/img/x-solid.svg') }}" class="w-80 h-auto"
                                        alt="close"></button>
                            </div>
                            <p class="fw-bold fs-3 lh-sm">{{ $post->ormawa }}
                                - USK
                            </p>
                            <p class="fw-normal fs-6 px-2 lh-1 text-secondary">Dari
                                <span class="text-primary">{{ $post->poster }}</span>
                            </p>

                        </div>
                        <div class="p-3 py-4">
                            <div class="md-form flex">
                                <form action="{{ route('userUpdate', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="form10" class="fs-6 fw-base mx-1">Edit
                                        Caption</label>
                                    <i class="fas fa-pencil-alt prefix"></i>
                                    <textarea id="form10" class="xl-textarea form-control mb-3" rows="15" name="content">{!! $post->content !!}</textarea>
                                    <div class="d-flex justify-content-end mx-5">
                                        <button type="submit" class="btn btn-primary my-4 ">Simpan</button>
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
