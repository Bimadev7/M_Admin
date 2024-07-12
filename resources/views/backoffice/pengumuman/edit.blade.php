@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
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
            <h3 class="card-header p-3">Data pengumuman</h3>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h3 class="card-title"></h3>
                    <div class="ml-auto">
                        <!-- Empty div for positioning -->
                    </div>
                    <div class="card-tools">
                        <!-- Empty div for positioning -->
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

                    <form class="card" action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ml-4">
                                    <label for="judul">Judul Pengumuman</label>
                                    <input type="text" name="judul"
                                        class="form-control @error('judul') is-invalid @enderror" id="judul"
                                        placeholder="Judul Berita" value="{{ $pengumuman->judul }}" required>
                                    @error('judul')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group ml-4">
                                    <label for="caption_capture">Caption</label>
                                    <input type="text" name="caption_capture"
                                        class="form-control @error('caption_capture') is-invalid @enderror"
                                        id="caption_capture" placeholder="Deskripsi Singkat"
                                        value="{{ $pengumuman->caption_capture }}" required>
                                    @error('caption_capture')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group ml-4">
                                    <label for="deskripsi_singkat">Deskripsi Singkat</label>
                                    <textarea name="deskripsi_singkat"
                                        class="form-control @error('deskripsi_singkat') is-invalid @enderror"
                                        id="editor3" placeholder="deskripsi_singkat"
                                        required>{{ $pengumuman->deskripsi_singkat }}</textarea>
                                    @error('deskripsi_singkat')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group ml-4">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="editor2" placeholder="Deskripsi"
                                        required>{{ $pengumuman->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- image --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="slider1">Gambar Pengumuman</label>
                                        <div class="form-group">
                                            @error('slider1')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            @if($pengumuman->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/' . $pengumuman->image) }}"
                                                    alt="Gambar Slider 1" width="300" height="440" id="preview_slider1">
                                            </div>
                                            @endif
                                            <br>
                                            <p>masukan Gambar</p>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" id="image"
                                                onchange="previewImage('image', 'preview_slider1')">
                                        </div>
                                    </div>
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
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
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
