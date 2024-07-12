@extends('layouts.main')

@section('content')
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

        <form action="{{ route('lembagadesa.update', $lembagadesa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Nama Lembaga</label>
                <input type="text" name="nama_lembaga" class="form-control @error('nama_lembaga') is-invalid @enderror" id="nama_lembaga" value="{{ $lembagadesa->nama_lembaga }}" required>
                @error('nama_lembaga')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $lembagadesa->alamat }}" required>
                @error('alamat')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="deskripsi_profil">Deskripsi Profil</label>
                <input type="text" name="deskripsi_profil" class="form-control @error('deskripsi_profil') is-invalid @enderror" id="deskripsi_profil" value="{{ $lembagadesa->deskripsi_profil }}" required>
                @error('deskripsi_profil')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="image">Gambar Lembaga</label>
                <br>
                @if($lembagadesa->image)
                <img src="{{ asset('images/' . $lembagadesa->image) }}" alt="Gambar Lembaga" width="200" height="200" id="preview_image">
                @else
                <img src="" alt="Gambar Lembaga" style="display: none;" id="preview_image">
                @endif
                <br><br>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage('image', 'preview_image')">
                @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
        Edit Lembaga
      </div>
    </div>
  </div>
</section>

<script>
  function previewImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById(imageId);
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    } else {
      const preview = document.getElementById(imageId);
      preview.src = '';
      preview.style.display = 'none';
    }
  }
</script>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush
