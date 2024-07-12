@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Detail Gambar</h3>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="image">Gambar 1</label><br>
                                <img src="{{ asset('images/' . $slider->slider1) }}" alt="Gambar 1" width="200" height="250">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="image">Gambar 2</label><br>
                                <img src="{{ asset('images/' . $slider->slider2) }}" alt="Gambar 2" width="200" height="250">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="image">Gambar 3</label><br>
                                <img src="{{ asset('images/' . $slider->slider3) }}" alt="Gambar 3" width="200" height="250">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label for="image">Gambar 4</label><br>
                                <img src="{{ asset('images/' . $slider->slider4) }}" alt="Gambar 4" width="200" height="250">
                            </div>
                        </div>
                    </div>
                    {{-- Additional content related to slider details --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for additional description -->
<div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="readMoreModalLabel">Deskripsi Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- Modal body content can be added here --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
