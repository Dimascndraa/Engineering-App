<div class="modal fade" id="ubah-akses{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate action="/user/{{ $user->id }}/akses" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Akses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control w-100 @error('role') is-invalid @enderror"
                        id="aksesUser{{ $user->id }}" name="role">
                        <optgroup label="User Akses">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Administrator</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                User</option>
                        </optgroup>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="fal fa-pencil mr-1"></span>
                        Ubah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
