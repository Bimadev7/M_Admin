@extends('layouts.main')

@section('content')

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
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Caption Capture</label>
                            <input type="text" class="form-control"  value="{{ $berita->caption_capture }}" readonly>
                        </div>

                                <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <div>
                                {!! (strlen($berita->deskripsi_singkat) > 80) ? substr($berita->deskripsi_singkat, 0, 300) . '...' : $berita->deskripsi_singkat !!}
                                @if (strlen($berita->deskripsi_singkat) > 80)
                                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreDeskripsiModal">Baca Selengkapnya</a>
                                @endif
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="judul">Penulis</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->penulis }}" readonly>
                        </div>



                        <div class="form-group">
                            <label for="image">Gambar</label><br>
                            <img src="{{ asset('images/' . $berita->image) }}" alt="Gambar berita" width="250" height="250">
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    Details lembagadesa
                </div>
            </div>
        </div>
    </div>
</div>

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
                {!! $berita->deskripsi_singkat !!}
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
                {!! $berita->deskripsi_singkat !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
