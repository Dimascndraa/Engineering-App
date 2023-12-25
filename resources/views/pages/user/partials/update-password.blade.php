<div class="modal fade" id="ubah-password{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate action="/user/{{ $user->id }}/update-password" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="current_password">Password Lama</label>
                        <input type="password" value="{{ old('current_password') }}"
                            class="form-control @error('current_password') is-invalid @enderror" id="current_password"
                            name="current_password" placeholder="Password Lama">
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi
                            Password</label>
                        <input type="password" value="{{ old('password_confirmation') }}"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
