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
        <h3 class="card-header p-3">Data Demografi</h3>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h3 class="card-title"></h3>
                <div class="card-tools ml-auto mr-0">
                   {{-- <a href="{{ route('berita.create') }}" class="btn btn-primary btn-sm mb-4">
                    <i class="fas fa-plus mr-1"></i> Tambah Baru
                </a> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('
                        success ') }}',
                    });
                </script>
                @endif

                <form class="card" action="{{ route('demografidesa.update', $demografidesa->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="angka_kelahiran">Angka Kelahiran</label>
                                <input type="number" name="angka_kelahiran"
                                    class="form-control @error('angka_kelahiran') is-invalid @enderror"
                                    id="angka_kelahiran" placeholder="Angka Kelahiran"
                                    value="{{ $demografidesa->angka_kelahiran }}" required>
                                @error('angka_kelahiran')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="angka_kematian">Angka Kematian</label>
                                <input type="number" name="angka_kematian"
                                    class="form-control @error('angka_kematian') is-invalid @enderror"
                                    id="angka_kematian" placeholder="Angka Kematian"
                                    value="{{ $demografidesa->angka_kematian }}" required>
                                @error('angka_kematian')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_pria">Jumlah Pria</label>
                                <input type="number" name="jumlah_pria"
                                    class="form-control @error('jumlah_pria') is-invalid @enderror" id="jumlah_pria"
                                    placeholder="Jumlah Pria" value="{{ $demografidesa->jumlah_pria }}" required>
                                @error('jumlah_pria')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_perempuan">Jumlah Perempuan</label>
                                <input type="number" name="jumlah_perempuan"
                                    class="form-control @error('jumlah_perempuan') is-invalid @enderror"
                                    id="jumlah_perempuan" placeholder="Jumlah Perempuan"
                                    value="{{ $demografidesa->jumlah_perempuan }}" required>
                                @error('jumlah_perempuan')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_anak_anak">Jumlah Anak-anak</label>
                                <input type="number" name="jumlah_anak_anak"
                                    class="form-control @error('jumlah_anak_anak') is-invalid @enderror"
                                    id="jumlah_anak_anak" placeholder="Jumlah Anak-anak"
                                    value="{{ $demografidesa->jumlah_anak_anak }}" required>
                                @error('jumlah_anak_anak')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label for="jumlah_remaja">Jumlah Remaja</label>
                                <input type="number" name="jumlah_remaja"
                                    class="form-control @error('jumlah_remaja') is-invalid @enderror" id="jumlah_remaja"
                                    placeholder="Jumlah Dewasa" value="{{ $demografidesa->jumlah_remaja }}" required>
                                @error('jumlah_remaja')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label for="jumlah_lansia">Jumlah Lansia</label>
                                <input type="number" name="jumlah_lansia"
                                    class="form-control @error('jumlah_lansia') is-invalid @enderror" id="jumlah_lansia"
                                    placeholder="Jumlah Lansia" value="{{ $demografidesa->jumlah_lansia }}" required>
                                @error('jumlah_lansia')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                                <input type="number" name="jumlah_penduduk"
                                    class="form-control @error('jumlah_penduduk') is-invalid @enderror"
                                    id="jumlah_penduduk" placeholder="Jumlah Penduduk"
                                    value="{{ $demografidesa->jumlah_penduduk }}" required>
                                @error('jumlah_penduduk')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary mr-3">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer">
                Edit Data Demografi Desa
            </div> --}}
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush
