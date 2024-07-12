@extends('layouts.main')

@section('content')
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<div class="container">
    <div class="card mt-5">
        @if(session('alert-type') && session('message'))
        <script>
            Swal.fire({
                icon: '{{ session('alert-type') }}',
                title: 'Success!',
                text: '{{ session('message') }}',
            });
        </script>
        @endif
        <h3 class="card-header p-3">Data Demografi</h3>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h3 class="card-title"></h3>
                <div class="card-tools ml-auto mr-0">
                    {{-- <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#addUserModal">
                        <i class="fas fa-plus mr-1"></i> Tambah Baru
                    </button> --}}
                </div>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Angka Kelahiran</th>
                        <th>Angkat Kematian</th>
                        <th>Jumlah penduduk</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah Berita Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ route('demografidesa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="angka_kelahiran">Kelahiran</label>
            <input type="text" name="angka_kelahiran" class="form-control" id="angka_kelahiran" required>
        </div>
        <div class="form-group">
            <label for="angka_kematian">Kematia</label>
            <input type="text" name="angka_kematian" class="form-control" id="angka_kematian" required>
        </div>
         <div class="form-group">
            <label for="jumlah_penduduk">jumlah_penduduk</label>
            <input type="text" name="jumlah_penduduk" class="form-control" id="jumlah_penduduk" required>
        </div>
       

         
        
       
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Berita</button>
    </div>
</form>

        </div>
    </div>
</div>
@endsection


@push('script')
<script type="text/javascript">
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('demografidesa.index') }}",
        columns: [
            // Custom index column
            {
                data: null,
                name: 'index',
                searchable: false,
                orderable: false,
                render: function (data, type, row, meta) {
                    // Calculate row index
                    return meta.row + 1;
                }
            },
            {data: 'angka_kelahiran', name: 'angka_kelahiran'},
            {data: 'angka_kematian', name: 'angka_kematian'},
            {data: 'jumlah_penduduk', name: 'jumlah_penduduk'},

            // Action buttons column
            {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return '<a href="/backoffice/demografidesa/' + data + '" class="btn btn-info btn-sm">Show</a>' +
                           '<a href="/backoffice/demografidesa/' + data + '/edit" class="btn btn-primary btn-sm mx-1">Edit</a>' +
                           '';
                }
            },
         ]
    });
   
        // Function to handle delete confirmation
        window.confirmDelete = function(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Hapus Data?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Ajax request for deletion
                    $.ajax({
                        url: '/backoffice/demografidesa/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            table.ajax.reload(); // Reload DataTable after deletion
                            Swal.fire(
                                'Terhapus!',
                                'Data telah dihapus.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                            console.error(xhr);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'Data tidak jadi dihapus :)',
                        'info'
                    );
                }
            });
        };
    });
    </script>
    @endpush
