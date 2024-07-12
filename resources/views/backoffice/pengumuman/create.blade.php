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
            <h6 class="card-header p-3">Tambah Data Pengumuman</h6>
            <div class="card-body">
                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Pengumuman</label>
                        <input type="text" name="judul" class="form-control" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="caption_capture">Caption Gambar</label>
                        <input type="text" name="caption_capture" class="form-control" id="caption_capture" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_singkat">Deskripsi Singkat</label>
                        {{-- <input type="text" name="deskripsi_singkat" class="form-control" id="deskripsi_singkat" required> --}}
                        <textarea name="deskripsi_singkat" class="form-control" id="editor" required></textarea>

                    </div>
                    
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Detail</label>
                        <textarea name="deskripsi" class="form-control" id="editor2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar Berita</label>
                        <div class="input-group">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required onchange="previewImage('image', 'preview_image')">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger" id="btnClearImage" style="display: none;" onclick="clearImagePreview()">Hapus Gambar</button>
                            </div>
                        </div>
                        @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <br>
                        @if(old('image'))
                        <img id="preview_image" src="{{ asset('images/' . old('image')) }}" alt="Preview Image" style="max-width: 200px; max-height: 200px;">
                        <script>
                            document.getElementById('btnClearImage').style.display = 'inline-block';
                        </script>
                        @else
                        <img id="preview_image" src="" alt="Preview Image" style="max-width: 200px; max-height: 200px; display: none;">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary mr-5 mb-4">Tambah Pengumuman</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
        Tambah Berita
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
                const previewImage = document.getElementById(imageId);
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; // Tampilkan gambar yang dipilih
                document.getElementById('btnClearImage').style.display = 'inline-block'; // Tampilkan tombol Hapus Gambar
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            const previewImage = document.getElementById(imageId);
            previewImage.src = '';
            previewImage.style.display = 'none'; // Kosongkan preview jika tidak ada file yang dipilih
            document.getElementById('btnClearImage').style.display = 'none'; // Sembunyikan tombol Hapus Gambar
        }
    }

    function clearImagePreview() {
        const previewImage = document.getElementById('preview_image');
        previewImage.src = '';
        previewImage.style.display = 'none'; // Kosongkan preview
        document.getElementById('image').value = ''; // Kosongkan nilai input file
        document.getElementById('btnClearImage').style.display = 'none'; // Sembunyikan tombol Hapus Gambar lagi
    }
</script>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush
