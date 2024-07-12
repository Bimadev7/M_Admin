@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Detail Demografi Desa</h3>
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
                        <form method="POST" action="#">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Angka Kelahiran</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $demografidesa->angka_kelahiran }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Angka Kematian</label>
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $demografidesa->angka_kematian }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Jumlah Pria</label>
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $demografidesa->jumlah_pria }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">Jumlah perempuan</label>
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $demografidesa->jumlah_perempuan }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="penulis">jumlah anak-anak</label>
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $demografidesa->jumlah_anak_anak }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="penulis">jumlah Lansia</label>
                                        <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $demografidesa->jumlah_lansia }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="caption_capture">Jumlah Penduduk</label>
                                        <input type="text" class="form-control" id="caption_capture" name="caption_capture" value="{{ $demografidesa->jumlah_penduduk }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Modal Read More -->
<div class="modal fade" id="readMoreDeskripsiModal" tabindex="-1" aria-labelledby="readMoreDeskripsiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readMoreDeskripsiModalLabel">Deskripsi berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto; text-align: justify;">
                {!! $demografidesa->deskripsi !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="readMoreDeskripsiSingkatModal" tabindex="-1" aria-labelledby="readMoreDeskripsiSingkatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readMoreDeskripsiSingkatModalLabel">Deskripsi Singkat berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto; text-align: justify;">
                {!! $demografidesa->deskripsi_singkat !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
