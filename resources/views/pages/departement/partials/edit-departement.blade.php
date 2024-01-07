<div class="modal fade" id="edit-departemen" tabindex="-1" role="dialog" aria-labelledby="editDepartemenModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate method="post" enctype="multipart/form-data"
                id="update-departement-form">
                @method('put')
                @csrf
                <input type="hidden" name="departement_id" id="edit-departement-id" value="">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-name">Nama Departemen</label>
                        <input type="text" autofocus value="" class="form-control" id="edit-name"
                            name="name" placeholder="Nama Departemen">
                    </div>
                    <div class="form-group">
                        <label for="edit-code">Kode Departemen</label>
                        <input type="text" autofocus value="" class="form-control" id="edit-code"
                            name="code" placeholder="Kode Departemen">
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
                        <select class="form-control w-100" id="edit-status" name="status">
                            <optgroup label="Status">
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </optgroup>
                        </select>
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
