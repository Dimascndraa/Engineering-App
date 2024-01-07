@extends('inc.layout')
@section('title', 'User')
@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="row mb-5">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary waves-effect waves-themed" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal" data-target="#tambah-user" title="Tambah User">
                    <span class="fal fa-plus-circle mr-1"></span>
                    Tambah User
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Table <span class="fw-300"><i>User</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap">No</th>
                                        <th style="white-space: nowrap">Departemen</th>
                                        <th style="white-space: nowrap">Nama</th>
                                        <th style="white-space: nowrap">Username</th>
                                        <th style="white-space: nowrap">Jabatan</th>
                                        <th style="white-space: nowrap">Role</th>
                                        <th style="white-space: nowrap">Status</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td style="white-space: nowrap">{{ $loop->iteration }}</td>
                                            <td style="white-space: nowrap">{{ $user->departement->name }}</td>
                                            <td style="white-space: nowrap">{{ $user->name }}</td>
                                            <td style="white-space: nowrap">{{ $user->username }}</td>
                                            <td style="white-space: nowrap">{{ $user->jabatan }}</td>
                                            <td style="white-space: nowrap">{{ ucfirst($user->role) }}</td>
                                            <td style="white-space: nowrap">
                                                {{ $user->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                            </td>

                                            <td style="white-space: nowrap">
                                                <button type="button" data-backdrop="static" data-keyboard="false"
                                                    class="badge mx-1 badge-primary p-2 border-0 text-white"
                                                    data-toggle="modal" data-target="#ubah-user{{ $user->id }}"
                                                    title="Ubah">
                                                    <span class="fal fa-pencil"></span>
                                                </button>
                                                <button type="button" data-backdrop="static" data-keyboard="false"
                                                    class="badge mx-1 badge-success p-2 border-0 text-white"
                                                    data-toggle="modal" data-target="#ubah-password{{ $user->id }}"
                                                    title="Ubah">
                                                    <span class="fal fa-key"></span>
                                                </button>
                                                {{-- <button type="button"
                                                    class="badge mx-1 badge-secondary p-2 border-0 text-white"
                                                    data-backdrop="static" data-keyboard="false" data-toggle="modal"
                                                    data-target="#ubah-akses{{ $user->id }}" title="Ubah Akses">
                                                    <span class="fal fa-user-secret"></span>
                                                </button> --}}
                                            </td>
                                        </tr>

                                        @include('pages.user.partials.update-user')
                                        @include('pages.user.partials.update-password')
                                        @include('pages.user.partials.update-role')
                                    @endforeach
                                    @include('pages.user.partials.create-user')
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="white-space: nowrap">No</th>
                                        <th style="white-space: nowrap">Departemen</th>
                                        <th style="white-space: nowrap">Nama</th>
                                        <th style="white-space: nowrap">Username</th>
                                        <th style="white-space: nowrap">Jabatan</th>
                                        <th style="white-space: nowrap">Role</th>
                                        <th style="white-space: nowrap">Status</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('plugin')
    <script src="/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {

            @foreach ($users as $u)
                $('#departement{{ $u->id }}').select2({
                    placeholder: 'Pilih Departemen',
                    dropdownParent: $('#ubah-user{{ $u->id }}'),
                });
                $('#status{{ $u->id }}').select2({
                    placeholder: 'Pilih Status',
                    dropdownParent: $('#ubah-user{{ $u->id }}'),
                });
                $('#aksesUser{{ $u->id }}').select2({
                    placeholder: 'Pilih Akses',
                    dropdownParent: $('#ubah-akses{{ $u->id }}'),
                });
            @endforeach

            $('#status').select2({
                placeholder: 'Pilih Status',
                dropdownParent: $('#tambah-user'),
            });

            $('#departement').select2({
                placeholder: 'Pilih Departement',
                dropdownParent: $('#tambah-user'),
            });

            $('#dt-basic-example').dataTable({
                responsive: true
            });

            $('.js-thead-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

        });
    </script>
@endsection
