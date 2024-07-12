@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Detail berita</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if(session('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Success!',
              text: '{{ session('success') }}',
            });
          </script>
        @endif

        <form class="card" action="{{ route('strukturorganisasi.update', $strukturorganisasi->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6">
              <div class="form-group ml-4">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" value="{{ $strukturorganisasi->nama }}" required>
                @error('nama')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="deskripsi" value="{{ $strukturorganisasi->deskripsi }}" required>
                @error('deskripsi')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" value="{{ $strukturorganisasi->jabatan }}" required>
                @error('jabatan')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group ml-4">
                <label for="nip">NIP</label>
                <textarea name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="NIP" required>{{ $strukturorganisasi->nip }}</textarea>
                @error('nip')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="image">Gambar Struktur Organisasi</label>
                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="image" onchange="validateImageSize('image', 'previewImage')">
                @error('image')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror

                @if($strukturorganisasi->image)
                  <div class="mt-2">
                    <img src="{{ asset('images/' . $strukturorganisasi->image) }}" alt="Gambar Struktur Organisasi" width="300" height="440" id="previewImage">
                  </div>
                @else
                  <div class="mt-2">
                    <img src="#" alt="Preview" style="display:none; width:300px; height:440px;" id="previewImage">
                  </div>
                @endif
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary mr-5 mb-4">Update</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Edit Struktur Organisasi
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<style>
  .short-select {
    width: auto !important;
    min-width: 150px;
  }
</style>

<script>
  function previewImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imageId).src = e.target.result;
        document.getElementById(imageId).style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function validateImageSize(inputId, previewImageId) {
    const input = document.getElementById(inputId);
    if (input.files && input.files[0]) {
      const fileSize = input.files[0].size; // in bytes
      const maxSize = 5 * 1024 * 1024; // 5 MB (adjust as needed)

      if (fileSize > maxSize) {
        alert('Ukuran file gambar terlalu besar. Maksimal 5 MB.');
        input.value = ''; // reset the input
        document.getElementById(previewImageId).style.display = 'none'; // hide preview
      } else {
        previewImage(inputId, previewImageId); // show preview
      }
    }
  }
</script>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@endpush
