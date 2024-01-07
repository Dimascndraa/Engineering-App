@extends('inc.layout')
@section('title', 'Work Order')
@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="row mb-5">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary waves-effect waves-themed" data-backdrop="static"
                    data-keyboard="false" data-toggle="modal" data-target="#tambah-work-order" title="Tambah Work Order">
                    <span class="fal fa-plus-circle mr-1"></span>
                    Tambah Work Order
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Table <span class="fw-300"><i>Work Order</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap">Kode Laporan</th>
                                        <th style="white-space: nowrap">Judul Laporan</th>
                                        <th style="white-space: nowrap">Tanggal</th>
                                        <th style="white-space: nowrap">Tipe Laporan</th>
                                        <th style="white-space: nowrap">Nama</th>
                                        <th style="white-space: nowrap">Departemen</th>
                                        <th style="white-space: nowrap">Jabatan</th>
                                        <th style="white-space: nowrap">Jenis Laporan</th>
                                        <th style="white-space: nowrap">Deskripsi Laporan</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workOrders as $workOrder)
                                        <tr>
                                            <td style="white-space: nowrap">{{ $workOrder->code }}</td>
                                            <td style="white-space: nowrap">{{ $workOrder->title }}</td>
                                            <td style="white-space: nowrap">
                                                {{ \Carbon\Carbon::parse($workOrder->created_at)->translatedFormat('d F Y H:i') }}
                                            </td>
                                            <td style="white-space: nowrap">
                                                {{ $workOrder->type == 'work_order' ? 'Work Order' : 'Komplain' }}
                                            </td>
                                            <td style="white-space: nowrap">{{ $workOrder->user->name }}</td>
                                            <td style="white-space: nowrap">{{ $workOrder->user->departement->name }}</td>
                                            <td style="white-space: nowrap">{{ $workOrder->user->jabatan }}</td>
                                            <td style="white-space: nowrap">{{ $workOrder->category->name }}</td>
                                            <td style="white-space: nowrap">{!! $workOrder->description !!}</td>

                                            <td style="white-space: nowrap">
                                                <!-- Add a data-post-id attribute to the edit button -->
                                                <button type="button" data-backdrop="static" data-keyboard="false"
                                                    class="badge mx-1 badge-primary p-2 border-0 text-white edit-button"
                                                    data-toggle="modal" data-target="#edit-work-order" title="Ubah"
                                                    data-post-id="{{ $workOrder->id }}">
                                                    <span class="fal fa-pencil"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="white-space: nowrap">Kode Laporan</th>
                                        <th style="white-space: nowrap">Judul Laporan</th>
                                        <th style="white-space: nowrap">Tanggal</th>
                                        <th style="white-space: nowrap">Tipe Laporan</th>
                                        <th style="white-space: nowrap">Nama</th>
                                        <th style="white-space: nowrap">Departemen</th>
                                        <th style="white-space: nowrap">Jabatan</th>
                                        <th style="white-space: nowrap">Jenis Laporan</th>
                                        <th style="white-space: nowrap">Deskripsi Laporan</th>
                                        <th style="white-space: nowrap">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- datatable end -->
                            <!-- Modal -->
                            @include('pages.work-order.partials.edit-work-order')
                            @include('pages.work-order.partials.create-work-order')
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
                // Type
                $('#create-type').select2({
                    dropdownParent: $('#tambah-work-order')
                });
                $('#edit-type').select2({
                    dropdownParent: $('#edit-work-order')
                });

                // Category
                $('#create-category').select2({
                    dropdownParent: $('#tambah-work-order')
                });
                $('#edit-category').select2({
                    dropdownParent: $('#edit-work-order')
                });
            });
            // SELECT2

            // Kirim formulir tambah melalui AJAX
            $('#create-button').on('click', function() {
                var formData = new FormData($('#create-work-order-form')[0]);

                generateLaporanCode();

                $.ajax({
                    type: 'POST',
                    url: '/api/work-orders',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Tangani keberhasilan, misalnya, tutup modal atau perbarui UI
                        $('#tambah-work-order').modal('hide');
                        // Lakukan sesuatu setelah berhasil, seperti memuat kembali data kategori

                        // Tampilkan pesan keberhasilan
                        showSuccessAlert('Work Order Ditambah!');

                        // Tunda reload selama 2 detik
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(error) {
                        $('#tambah-work-order').modal('hide');
                        // Tangani kesalahan, misalnya, tampilkan pesan kesalahan validasi
                        showErrorAlert('Cek kembali data yang dikirim');
                    }
                });
            });

            // Add the category ID to the modal when the Edit button is clicked
            $('.edit-button').on('click', function() {
                var workOrderId = $(this).data('work-order-id');

                // Set the category ID to the modal input field
                $('#edit-post-id').val(workOrderId);

                $.ajax({
                    type: 'GET',
                    url: '/api/work-orders/' + workOrderId,
                    success: function(data) {
                        $('#edit-user-id').val(data.user_id);
                        $('#edit-category').val(data.category_id);
                        $('#edit-title').val(data.title);
                        $('#edit-code').val(data.code);
                        $('#edit-type').val(data.type);
                        $('#edit-description').val(data.description);
                        $('#edit-description-text').val(data.description);
                        $('#oldImage').val(data.photo);

                        $('#edit-category').val(data.category_id).select2({
                            dropdownParent: $('#edit-work-order')
                        });

                        $('#edit-type').val(data.category_id).select2({
                            dropdownParent: $('#edit-work-order')
                        });

                        // Set attribut src pada elemen gambar berdasarkan data image dari respons
                        var previewImage = $('.edit-img-preview');
                        if (previewImage.length) {
                            previewImage.attr('src', '/storage/' + data.image);
                        }

                        // Show the modal
                        $('#edit-work-order').modal('show');
                    },
                    error: function(error) {
                        showErrorAlert('Terjadi kesalahan:', error);
                    }
                });
            });


            $('#update-post-form').on('submit', function(e) {
                e.preventDefault();

                var workOrderId = $('#edit-post-id').val();
                var formData = new FormData(this); // Gunakan 'this' untuk mengambil data dari form saat ini

                $.ajax({
                    type: 'POST', // Ganti menjadi POST
                    url: '/api/work-orders/' + workOrderId,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle success, e.g., close modal or update UI
                        $('#edit-work-order').modal('hide');

                        // Tampilkan pesan
                        showSuccessAlert('Work Order Diubah!');

                        // Tunda reload selama 2 detik
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(error) {
                        $('#edit-work-order').modal('hide');
                        // Handle errors, e.g., display validation errors
                        showErrorAlert('Cek kembali data yang dikirim');
                    }
                });
            });

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
        });

        // Tambahkan event click pada tombol untuk menghasilkan kode laporan baru
        $('#generate-code-button').on('click', function() {
            generateLaporanCode();
        });

        // Fungsi untuk mendapatkan kode laporan otomatis dari server
        function generateLaporanCode() {
            $.ajax({
                type: 'GET',
                url: '/api/generate-laporan-code',
                success: function(response) {
                    // Tampilkan kode laporan di input
                    $('#create-code').val(response.laporanCode);
                },
                error: function(error) {
                    // Tangani kesalahan, misalnya, tampilkan pesan kesalahan
                    console.error('Terjadi kesalahan:', error);
                }
            });
        }

        function createPreviewPhoto() {
            const image = document.querySelector('#create-photo');
            const imgPreview = document.querySelector('.create-img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function editPreviewImage() {
            const image = document.querySelector('#edit-image');
            const imgPreview = document.querySelector('.edit-img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
