@extends('layouts.main')

@section('content')
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
        <div class="card-body">
            <h6 class="card-header p-3">Tambah Data Lembaga Desa</h6>
            <div class="card-body">
                <form action="{{ route('lembagadesa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="nama_lembaga" class="col-sm-4 col-form-label text-md-right">Nama Lembaga</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_lembaga" class="form-control" id="nama_lembaga" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi_profil" class="col-sm-4 col-form-label text-md-right">Deskripsi Profil</label>
                                <div class="col-sm-8">
                                    <input type="text" name="deskripsi_profil" class="form-control" id="deskripsi_profil" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Gambar Lembaga</label>
                                @if(old('image'))
                                <img id="preview_image" src="{{ asset('images/' . old('image')) }}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                                @else
                                <img id="preview_image" src="" alt="Preview Image" style="max-width: 200px; max-height: 200px; display: none;">
                                @endif
                                <br>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required onchange="previewImage('image', 'preview_image')">
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary mr-5 mb-4">Tambah Lembaga</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer">
                Tambah Lembaga Desa
            </div> --}}
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

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

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush
