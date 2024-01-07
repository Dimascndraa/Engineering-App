<div class="modal fade" id="ubah-user{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form autocomplete="off" novalidate action="/users/{{ $user->id }}" method="post"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Ubah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="status{{ $user->id }}">
                            Status
                        </label>
                        <select class="form-control w-100 @error('status') is-invalid @enderror"
                            id="status{{ $user->id }}" name="status">
                            <optgroup label="Status">
                                <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Nonaktif</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="departement{{ $user->id }}">
                            Departemen
                        </label>
                        <select class="form-control w-100 @error('departement') is-invalid @enderror"
                            id="departement{{ $user->id }}" name="departement_id">
                            <optgroup label="Departemen">
                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}"
                                        {{ old('departement_id', $user->departement->id) == $departement->id ? 'selected' : '' }}>
                                        {{ $departement->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('departement')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" value="{{ old('name', $user->name) }}"
                            class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Nama User">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="{{ old('username', $user->username) }}"
                            class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                            placeholder="Username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" value="{{ old('jabatan', $user->jabatan) }}"
                            class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
                            placeholder="Jabatan">
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- !! ROLE !! --}}
                    {{-- <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" value="{{ old('role', $user->role) }}"
                            class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                            placeholder="Role">
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- !! ROLE !! --}}
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
