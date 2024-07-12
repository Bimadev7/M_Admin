@extends('layouts.main')

@section('content')
    <!-- Konten lainnya di sini -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Tambah + Berita</h3>
        </div>
        <div class="card-body">
            <form class="card" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ml-4">
                    <label for="judul">Judul Berita</label>
                    <input type="text" class="form-control ml-4 @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Masukan Judul Berita" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group ml-4">
                    <label for="gambar">Gambar Berita</label>
                    <input type="file" class="form-control ml-4 @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group ml-4">
                    <label for="deskripsi">Deskripsi Singkat</label>
                    <textarea class="form-control ml-4 @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukan Deskripsi Singkat">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary mr-5 mb-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
