@extends('layouts.main')

@section('content')

<!-- SELECT2 EXAMPLE -->
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

        <form method="POST" action="#">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <!-- Left Column -->
                    <div class="form-group">
                        <label for="username">Nama Lembaga</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $lembagadesa->nama_lembaga }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Alamat</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $lembagadesa->alamat }}" required>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Right Column -->
                    <div class="form-group">
                     <label for="email">Deskripsi Profil</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $lembagadesa->deskripsi_profil }}" required>
                    </div>
                    <img src="{{ asset('images/' . $lembagadesa->image) }}" alt="Gambar Slider 1" width="200" height="250" id="preview_slider1">

                 
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Details lembagadesa
    </div>
</div>
<!-- /.card -->

@endsection
