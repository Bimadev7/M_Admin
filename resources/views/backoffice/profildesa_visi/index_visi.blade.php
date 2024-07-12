@extends('layouts.main')

@section('content')
<div class="container">

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
            {{-- <h3 class="card-header p-3">Data pengumuman</h3> --}}
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
            </tr>
            <td class="text-right"> 
                    <a href="{{ route('profildesa_visi.edit', $item->id) }}" class="btn btn-primary">Edit Visi</a>
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
                    {{-- {!! $item->tentang_desa !!} Tampilkan Tentang Desa --}}
                    {!! $item->visi !!} {{-- Tampilkan Visi --}}
                    {{-- {!! $item->misi !!} Tampilkan Misi --}}
                    {{-- {!! $item->sejarah_desa !!} Tampilkan Sejarah Desa --}}
                    {{-- {!! $item->geografis !!} Tampilkan Geografis --}}
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
