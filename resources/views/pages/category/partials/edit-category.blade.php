<div class="modal fade" id="edit-category" tabindex="-1" role="dialog" aria-labelledby="editCategoryModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate method="post" enctype="multipart/form-data" id="update-category-form">
                @method('put')
                @csrf
                <input type="hidden" name="category_id" id="edit-category-id" value="">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-name">Nama Kategori</label>
                        <input type="text" autofocus value="" class="form-control" id="edit-name"
                            name="name" placeholder="Nama Kategori">
                    </div>
                    <div class="form-group">
                        <label for="edit-slug">Slug</label>
                        <input type="text" value="" class="form-control" id="edit-slug" name="slug"
                            placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edit-status">
                            Status
                        </label>
                        <select class="form-control w-100 @error('status') is-invalid @enderror" id="edit-status"
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="fal fa-edit mr-1"></span>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
