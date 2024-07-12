@extends('layouts.main')

@section('content')
<div class="container">

    {{-- Tabel untuk Tentang Desa --}}
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Tentang Desa</th>
                {{-- <th class="text-center"></th> Kolom untuk tombol edit --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($profildesa_visi as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <div>
                            {!! (strlen($item->tentang_desa) > 200) ? substr($item->tentang_desa, 0, 300) . '...' : $item->tentang_desa !!}
                            @if (strlen($item->tentang_desa) > 200)
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreModal{{ $item->id }}">Baca Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </td>
                {{-- <td class="text-right"> 
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Tentang Desa</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    

    {{-- Tabel untuk Visi --}}
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Visi</th>
                {{-- <th class="text-center"></th> Kolom untuk tombol edit --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($profildesa_visi as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <div>
                            {!! (strlen($item->visi) > 200) ? substr($item->visi, 0, 300) . '...' : $item->visi !!}
                            @if (strlen($item->visi) > 200)
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreModal{{ $item->id }}">Baca Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </td>
                {{-- <td class="text-right"> 
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Visi</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel untuk Misi --}}
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Misi</th>
                {{-- <th class="text-center"></th> Kolom untuk tombol edit --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($profildesa_visi as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <div>
                            {!! (strlen($item->misi) > 200) ? substr($item->misi, 0, 300) . '...' : $item->misi !!}
                            @if (strlen($item->misi) > 200)
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreModal{{ $item->id }}">Baca Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </td>
                {{-- <td class="text-right"> 
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Misi</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel untuk Sejarah Desa --}}
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Sejarah Desa</th>
                {{-- <th class="text-center"></th> Kolom untuk tombol edit --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($profildesa_visi as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <div>
                            {!! (strlen($item->sejarah_desa) > 200) ? substr($item->sejarah_desa, 0, 300) . '...' : $item->sejarah_desa !!}
                            @if (strlen($item->sejarah_desa) > 200)
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreModal{{ $item->id }}">Baca Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </td>
                {{-- <td class="text-right"> 
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Sejarah Desa</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel untuk Geografis --}}
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">Geografis</th>
                {{-- <th class="text-center"></th> Kolom untuk tombol edit --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($profildesa_visi as $item)
            <tr>
                <td>
                    <div class="form-group">
                        <div>
                            {!! (strlen($item->geografis) > 200) ? substr($item->geografis, 0, 300) . '...' : $item->geografis !!}
                            @if (strlen($item->geografis) > 200)
                                <a href="#" class="btn btn-link" data-toggle="modal" data-target="#readMoreModal{{ $item->id }}">Baca Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </td>

            </tr>
            <td class="text-right"> {{-- Tombol edit --}}
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Profil Desa</a>
                </td>
            @endforeach
        </tbody>
    </table>

    {{-- Modal untuk Detail --}}
    @foreach ($profildesa_visi as $item)
    <div class="modal fade" id="readMoreModal{{ $item->id }}" tabindex="-1" aria-labelledby="readMoreModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMoreModalLabel{{ $item->id }}">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto; text-align: justify;">
                    {!! $item->tentang_desa !!} {{-- Tampilkan Tentang Desa --}}
                    {!! $item->visi !!} {{-- Tampilkan Visi --}}
                    {!! $item->misi !!} {{-- Tampilkan Misi --}}
                    {!! $item->sejarah_desa !!} {{-- Tampilkan Sejarah Desa --}}
                    {!! $item->geografis !!} {{-- Tampilkan Geografis --}}
                </div>
                
                <div class="modal-footer">
                
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
