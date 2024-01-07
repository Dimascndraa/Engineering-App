<div class="modal fade" id="tambah-departemen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate method="post" enctype="multipart/form-data" id="create-departement-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="create-name">Nama Departemen</label>
                        <input type="text" autofocus value=""
                            class="form-control @error('name') is-invalid @enderror" id="create-name" name="name"
                            placeholder="Nama Departemen">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-code">Kode Departemen</label>
                        <input type="text" autofocus value=""
                            class="form-control @error('code') is-invalid @enderror" id="create-code" name="code"
                            placeholder="Kode Departemen">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-slug">Slug</label>
                        <input type="text" value="" class="form-control @error('slug') is-invalid @enderror"
                            id="create-slug" name="slug" placeholder="Slug">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="create-status">
                            Status
                        </label>
                        <select class="form-control w-100 @error('status') is-invalid @enderror" id="create-status"
                            name="status">
                            <optgroup label="Status">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
