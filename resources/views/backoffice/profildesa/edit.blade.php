@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Edit Pengumuman</h3>

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

        <form class="card" action="{{ route('profildesa.update', $profildesa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')




          <div class="row">
            <div class="col-md-6">
              <div class="form-group ml-4">
                <label for="tentang_desa">Tentang Desa</label>
                <input type="text" name="tentang_desa" class="form-control @error('tentang_desa') is-invalid @enderror" id="tentang_desa" placeholder="tentang_desa Pengumuman" value="{{ $profildesa->tentang_desa }}" required>
                @error('tentang_desa')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="visi">visi</label>
                <input type="text" name="visi" class="form-control @error('visi') is-invalid @enderror" id="visi" placeholder="Caption" value="{{ $profildesa->visi }}" required>
                @error('visi')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="misi">Misi</label>
                <input type="text" name="misi" class="form-control @error('misi') is-invalid @enderror" id="misi" placeholder="Deskripsi Singkat" value="{{ $profildesa->misi }}" required>
                @error('misi')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group ml-4">
                <label for="geografis">Geografis</label>
                <input type="text" name="geografis" class="form-control @error('geografis') is-invalid @enderror" id="geografis" placeholder="Geografis" value="{{ $profildesa->geografis }}" required>
                @error('geografis')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group ml-4">
                <label for="sejarah_desa">Sejarah Desa</label>
                <textarea name="sejarah_desa" class="form-control @error('sejarah_desa') is-invalid @enderror" id="editor" placeholder="sejarah_desa" required>{{ $profildesa->sejarah_desa }}</textarea>
                @error('sejarah_desa')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary mr-5 mb-4">Update</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
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
<script>
  function previewImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(imageId).src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush
