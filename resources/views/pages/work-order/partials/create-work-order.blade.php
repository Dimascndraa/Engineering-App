<div class="modal fade" id="tambah-work-order" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate method="post" enctype="multipart/form-data" id="create-work-order-form">
                @method('post')
                @csrf
                <input type="hidden" name="user_id" id="create-user-id" value="{{ auth()->user()->id }}">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="create-code">Kode Laporan</label>
                        <div class="input-group">
                            <input type="text" readonly class="form-control" id="create-code" name="code"
                                placeholder="Kode Laporan">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"
                                    id="generate-code-button">Generate</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="create-type">
                            Tipe Laporan
                        </label>
                        <select class="form-control w-100" id="create-type" name="type">
                            <optgroup label="Tipe Work Order">
                                <option value="work_order">Work Order</option>
                                <option value="complain">Komplain</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="create-category">
                            Kategori Laporan
                        </label>
                        <select class="form-control w-100" id="create-category" name="category_id">
                            <optgroup label="Kategori Laporan">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="create-title">Judul Laporan</label>
                        <input type="text" autofocus value="" class="form-control" id="create-title"
                            name="title" placeholder="Judul Laporan">
                    </div>
                    <div class="form-group">
                        <label for="create-description" class="form-label">Deskripsi Laporan</label>
                        <input id="create-description" type="hidden" name="description"
                            value="{{ old('description') }}">
                        <trix-editor input="create-description"></trix-editor>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="create-photo">Foto (Opsional)</label>
                        <img class="create-img-preview img-fluid mb-3 col-sm-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="create-photo" name="photo"
                                onchange="createPreviewPhoto()">
                            <label class="custom-file-label" for="create-photo">Pilih gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="create-button">
                        <span class="fal fa-plus-circle mr-1"></span>
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
