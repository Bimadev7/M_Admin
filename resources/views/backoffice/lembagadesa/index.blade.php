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
        <h3 class="card-header p-3">Data Lembaga Desa</h3>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h3 class="card-title"></h3>
               <div class="card-tools ml-auto mr-0">
              <a href="{{ route('lembagadesa.create') }}" class="btn btn-primary btn-sm mb-4">
                    <i class="fas fa-plus mr-1"></i> Tambah Baru
                </a>
                </div>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lembaga</th>
                        <th>Alamat</th>
                        {{-- <th>Role</th> --}}
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
                <h5 class="modal-title" id="addUserModalLabel">Tambah Lembaga Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('lembagadesa.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_lembaga">Nama Lembaga</label>
                        <input type="text" name="nama_lembaga" class="form-control" id="nama_lembaga" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_profil">Deskripsi Profil</label>
                        <input type="text" name="deskripsi_profil" class="form-control" id="deskripsi_profil" required>
                    </div>
                     <div class="form-group">
                                <label for="image">Gambar Berita</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required onchange="previewImage('image', 'preview_image')">
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <br>
                                @if(old('image'))
                                <img id="preview_image" src="{{ asset('images/' . old('image')) }}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                                @else
                                <img id="preview_image" src="" alt="Preview Image" style="max-width: 200px; max-height: 200px; display: none;">
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah User</button>
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
        ajax: "{{ route('lembagadesa.index') }}",
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
            {data: 'nama_lembaga', name: 'nama_lembaga'},
            {data: 'alamat', name: 'alamat'},
            
          

            // Action buttons column
            {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return '<a href="/backoffice/lembagadesa/' + data + '" class="btn btn-info btn-sm">Show</a>' +
                           '<a href="/backoffice/lembagadesa/' + data + '/edit" class="btn btn-primary btn-sm mx-1">Edit</a>' +
                           '<button class="btn btn-danger btn-sm mx-1" onclick="confirmDelete(' + data + ')">Delete</button>';
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
                    url: '/backoffice/lembagadesa/' + id,
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
  <script>
    function previewImage(inputId, imageId) {
        const input = document.getElementById(inputId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(imageId).src = e.target.result;
                document.getElementById(imageId).style.display = 'block'; // Display the previewed image
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById(imageId).src = '';
            document.getElementById(imageId).style.display = 'none'; // Clear the preview if no file selected
        }
    }
</script>
@endpush
