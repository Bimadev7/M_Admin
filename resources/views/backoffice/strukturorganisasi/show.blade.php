@extends('layouts.main')

@section('content')
<!-- Main content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
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
        <div class="row">
          <div class="col-md-6">
            <div class="form-group ml-4">
              <label for="username">Nama</label>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Nama" value="{{ $strukturorganisasi->nama }}" readonly>
              @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group ml-4">
              <label for="jabatan">Jabatan</label>
              <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" value="{{ $strukturorganisasi->jabatan }}" readonly>
              @error('jabatan')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group ml-4">
              <label for="nip">NIPD</label>
              <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="NIP" value="{{ $strukturorganisasi->nip }}" readonly>
              @error('nip')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="col-md-6">
            <div class="ml-4">
              @if($strukturorganisasi->image)
                <img src="{{ asset('images/' . $strukturorganisasi->image) }}" alt="Gambar Struktur Organisasi" width="200" height="200" id="previewImage">
              @endif
            </div>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
       
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Dashboard
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
