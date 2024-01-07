@extends('inc.layout')
@section('title', 'Departemen')
@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="row mb-5">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary waves-effect waves-themed" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal" data-target="#tambah-departemen" title="Tambah Departemen">
                    <span class="fal fa-plus-circle mr-1"></span>
                    Tambah Departemen
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Table <span class="fw-300"><i>Departemen</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap">No</th>
                                        <th style="white-space: nowrap">Nama Departemen</th>
                                        <th style="white-space: nowrap">Kode</th>
                                        <th style="white-space: nowrap">Status</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departements as $departement)
                                        <tr>
                                            <td style="white-space: nowrap">{{ $loop->iteration }}</td>
                                            <td style="white-space: nowrap">{{ $departement->name }}</td>
                                            <td style="white-space: nowrap">{{ $departement->code }}</td>
                                            <td style="white-space: nowrap">
                                                {{ $departement->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                            </td>
                                            <td style="white-space: nowrap">
                                                <!-- Add a data-departement-id attribute to the edit button -->
                                                <button type="button" data-backdrop="static" data-keyboard="false"
                                                    class="badge mx-1 badge-primary p-2 border-0 text-white edit-button"
                                                    data-toggle="modal" data-target="#edit-departement" title="Ubah"
                                                    data-departement-id="{{ $departement->id }}">
                                                    <span class="fal fa-pencil"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="white-space: nowrap">No</th>
                                        <th style="white-space: nowrap">Nama Departemen</th>
                                        <th style="white-space: nowrap">Kode</th>
                                        <th style="white-space: nowrap">Status</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- datatable end -->
                            <!-- Modal -->
                            @include('pages.departement.partials.edit-departement')
                            @include('pages.departement.partials.create-departement')
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
        $(document).ready(function() {
            // SELECT2
            $(function() {
                $('#create-status').select2({
                    dropdownParent: $('#tambah-departemen')
                });
                $('#edit-status').select2({
                    dropdownParent: $('#edit-departement')
                });
            });
            // SELECT2

            // Kirim formulir tambah melalui AJAX
            $('#create-button').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '/api/departements',
                    data: $('#create-departement-form').serialize(),
                    success: function(response) {
                        // Tangani keberhasilan, misalnya, tutup modal atau perbarui UI
                        $('#tambah-departemen').modal('hide');
                        // Lakukan sesuatu setelah berhasil, seperti memuat kembali data departemen

                        //tampilkan pesan
                        showSuccessAlert('Departemen Ditambah!');

                        // Tunda reload selama 2 detik
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(error) {
                        $('#tambah-departemen').modal('hide');
                        // Tangani kesalahan, misalnya, tampilkan pesan kesalahan validasi
                        showErrorAlert('Cek kembali data yang dikirim');
                    }
                });
            });

            $('.edit-button').on('click', function() {
                var departementId = $(this).data('departement-id');

                // Set the departement ID to the modal input field
                $('#edit-departement-id').val(departementId);

                // Show loading indicator
                showLoadingIndicator();

                // Assume you have an endpoint that returns departement data based on the ID
                $.ajax({
                    type: 'GET',
                    url: '/api/departements/' + departementId,
                    success: function(data) {
                        // Hide loading indicator
                        hideLoadingIndicator();

                        // Populate modal fields with data
                        $('#edit-name').val(data.name);
                        $('#edit-code').val(data.code);
                        $('#edit-slug').val(data.slug);
                        $('#edit-status').val(data.status);

                        $('#edit-status').val(data.status).select2({
                            dropdownParent: $('#edit-departement')
                        });

                        // Show the modal
                        $('#edit-departemen').modal('show');
                    },
                    error: function(error) {
                        // Hide loading indicator
                        hideLoadingIndicator();

                        showErrorAlert('Terjadi kesalahan:', error);
                    }
                });
            });


            // Submit the form via AJAX
            $('#update-departement-form').on('submit', function(e) {
                e.preventDefault();

                var departementId = $('#edit-departement-id').val();

                $.ajax({
                    type: 'POST',
                    url: '/api/departements/' + departementId,
                    data: $(this).serialize(),
                    success: function(response) {
                        // Handle success, e.g., close modal or update UI
                        $('#edit-departement').modal('hide');

                        //tampilkan pesan
                        showSuccessAlert('Departemen Diubah!');

                        // Tunda reload selama 2 detik
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(error) {
                        $('#edit-departemen').modal('hide');
                        // Handle errors, e.g., display validation errors
                        showErrorAlert('Cek kembali data yang dikirim');
                    }
                });
            });

            function showLoadingIndicator() {
                // Show loading indicator
                $('#overlay').show();
            }

            function hideLoadingIndicator() {
                // Hide loading indicator
                $('#overlay').hide();
            }

            // Datatable initialization
            $('#dt-basic-example').dataTable({
                responsive: true
            });

            $('.js-thead-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

            // Slugable
            const createtitle = document.querySelector('#create-name');
            const createslug = document.querySelector('#create-slug');

            const edittitle = document.querySelector('#edit-name');
            const editslug = document.querySelector('#edit-slug');

            createtitle.addEventListener('change', function() {
                fetch('/departements/checkSlug?name=' + createtitle.value)
                    .then(response => response.json())
                    .then(data => createslug.value = data.slug)
            });

            edittitle.addEventListener('change', function() {
                fetch('/dashboard/departements/checkSlug?title=' + edittitle.value)
                    .then(response => response.json())
                    .then(data => editslug.value = data.slug)
            });
        });
    </script>
@endsection
