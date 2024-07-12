<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\pengumuman;
use App\Models\ProfilDesa;
use App\Models\DemografiDesa;
use App\Models\KepengurusanLembaga;
use App\Models\LembagaDesa;
use App\Models\StrukturOrganisasi;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DasboardPublicController extends Controller
{

    // Homepage
    public function indexdes()
    {
        $slider1 = DB::table('slider')->value('slider1');
        $slider2 = DB::table('slider')->value('slider2');
        $slider3 = DB::table('slider')->value('slider3');

        $berita = Berita::latest()->take(4)->get();
        foreach ($berita as $item) {
            $item->judul = Str::limit($item->judul, 40, '...');
            $item->deskripsi = Str::limit($item->deskripsi, 100, '...');
        }
        
        $pengumuman = pengumuman::latest()->take(3)->get();
        foreach ($pengumuman as $item) {
            $item->deskripsi = Str::limit($item->deskripsi, 250, '...');
        }

        $demografi = DemografiDesa::all();
        //$tentang = DB::table('profil_desa')->value('tentang_desa');
        $tentang_desa = Str::limit((DB::table('profil_desa')->value('tentang_desa')), 350, '...');
        
        return view('home', [
            'berita' => $berita,
            'pengumuman' => $pengumuman,
            'demografi' => $demografi,
            'tentang_desa' => $tentang_desa,
            'slider1' => $slider1,
            'slider2' => $slider2,
            'slider3' => $slider3,
        ]);
    }

    // Halaman Berita
    public function indexBerita()
    {
        $berita = Berita::latest()->get();
        $news = Berita::latest()->take(3)->get();
    
        foreach ($berita as $item) {
            $item->deskripsi = Str::limit($item->deskripsi, 100, '...');
        }

        foreach ($news as $new){
            $new->judul = Str::limit($new->judul, 40, '...');
        }

        return view('public.berita', ['berita' => $berita], ['news' => $news]);
    }

    // Halaman Detail Berita
    public function detailBerita($id)
    {
        $berita = Berita::findOrFail($id);

        $news = Berita::latest()->take(3)->get();
        foreach ($news as $new){
            $new->judul = Str::limit($new->judul, 40, '...');
        }

        return view('public.detail_berita', ['berita' => $berita], ['news' => $news]);
    }

    // Halaman Pengumuman
    public function indexPengumuman()
    {
        $pengumuman = pengumuman::latest()->get();

        foreach ($pengumuman as $item) {
            $item->deskripsi = Str::limit($item->deskripsi, 250, '...');
        }

        $news = pengumuman::latest()->take(3)->get();
        foreach ($news as $new){
            $new->judul = Str::limit($new->judul, 40, '...');
        }

        return view('public.pengumuman', ['pengumuman' => $pengumuman], ['news' => $news]);
    }

    // Halaman Detail Pengumuman
    public function detailPengumuman($id)
    {
        $pengumuman = pengumuman::findOrFail($id);

        $news = pengumuman::latest()->take(3)->get();
        foreach ($news as $new){
            $new->judul = Str::limit($new->judul, 40, '...');
        }

        return view('public.detail_pengumuman', ['pengumuman' => $pengumuman], ['news' => $news]);
    }

    // Halaman Profil Desa - Tentang Desa
    public function tentangDesa()
    {
        $tentang_desa = DB::table('profil_desa')->value('tentang_desa');

        // return view('public.tentang', compact('tentang_desa'));
        return view('public.tentang', ['tentang_desa' => $tentang_desa]);
    }

    // Halaman Profil Desa - Visi Misi
    public function visiMisi()
    {
        $visi = DB::table('profil_desa')->value('visi');
        $misi = DB::table('profil_desa')->value('misi');

        return view('public.visimisi', ['visi' => $visi], ['misi' => $misi]);
    }

    // Halaman Profil Desa - Sejarah Desa
    public function sejarah()
    {
        $sejarah = DB::table('profil_desa')->value('sejarah_desa');

        return view('public.sejarah', ['sejarah' => $sejarah]);
    }


    // Halaman Profil Desa - Demografi
    public function demografi()
    {
        // Angka kelahiran
        $angka_kelahiran = DB::table('demografi_desa')->value('angka_kelahiran');
        $angka_kelahiran_formatted = number_format($angka_kelahiran, 0, ',', '.');

        // Angka kematian
        $angka_kematian = DB::table('demografi_desa')->value('angka_kematian');
        $angka_kematian_formatted = number_format($angka_kematian, 0, ',', '.');

        //Jumlah Laki-laki
        $jumlah_pria = DB::table('demografi_desa')->value('jumlah_pria');
        $jumlah_pria_formatted = number_format($jumlah_pria, 0, ',', '.');

        // Jumlah Perempuan
        $jumlah_perempuan = DB::table('demografi_desa')->value('jumlah_perempuan');
        $jumlah_perempuan_formatted = number_format($jumlah_perempuan, 0, ',', '.');

        // Jumlah anak-anak
        $jumlah_anak_anak = DB::table('demografi_desa')->value('jumlah_anak_anak');
        $jumlah_anak_anak_formatted = number_format($jumlah_anak_anak, 0, ',', '.');

        $jumlah_dewasa = DB::table('demografi_desa')->value('jumlah_dewasa');
        $jumlah_dewasa_formatted = number_format($jumlah_dewasa, 0, ',', '.');

        $jumlah_lansia = DB::table('demografi_desa')->value('jumlah_lansia');
        $jumlah_lansia_formatted = number_format($jumlah_lansia, 0, ',', '.');

        $jumlah_penduduk = DB::table('demografi_desa')->value('jumlah_penduduk');
        $jumlah_penduduk_formatted = number_format($jumlah_penduduk, 0, ',', '.');

        // Hitung persentase
        $persentase_pria = number_format(($jumlah_pria / $jumlah_penduduk * 100), 1, ',', '.');
        $persentase_perempuan = number_format(($jumlah_perempuan / $jumlah_penduduk * 100), 1, ',', '.');

        $persentase_anak_anak = number_format(($jumlah_anak_anak / $jumlah_penduduk * 100), 1, ',', '.');
        $persentase_dewasa = number_format(($jumlah_dewasa / $jumlah_penduduk * 100), 1, ',', '.');
        $persentase_lansia = number_format(($jumlah_lansia / $jumlah_penduduk * 100), 1, ',', '.');

        return view('public.demografi', [
            'angka_kelahiran' => $angka_kelahiran_formatted,
            'angka_kematian' => $angka_kematian_formatted,

            'jumlah_pria' => $jumlah_pria_formatted,
            'persentase_pria' => $persentase_pria,

            'jumlah_perempuan' => $jumlah_perempuan_formatted,
            'persentase_perempuan' => $persentase_perempuan,

            'jumlah_anak_anak' => $jumlah_anak_anak_formatted,
            'persentase_anak_anak' => $persentase_anak_anak,

            'jumlah_dewasa' => $jumlah_dewasa_formatted,
            'persentase_dewasa' => $persentase_dewasa,

            'jumlah_lansia' => $jumlah_lansia_formatted,
            'persentase_lansia' => $persentase_lansia,

            'jumlah_penduduk' => $jumlah_penduduk_formatted
        ]);
    }

    // Halaman Profil Desa - Geografis
    public function geografis()
    {
        $geografis = DB::table('profil_desa')->value('geografis');
        
        return view('public.geografis', ['geografis' => $geografis]);
    }

    // PEMERINTAHAN

    // INDEX LEMBAGA DESA
    public function indexLembagaDesa() {
        $lembaga = LembagaDesa::all();

        return view('public.lembaga', [
            'lembaga' => $lembaga
        ]);
    }

    // DETAIL LEMBAGA DESA
    public function detailLembagaDesa($id)
    {
        $lembaga = LembagaDesa::with('kepengurusan')->findOrFail($id);

        return view('public.detail_lembaga', [
            'lembaga' => $lembaga
        ]);
    }

    // INDEX STRUKTUR ORGANISASI
    public function indexStrukturOrganisasi() {
        // $ketua = StrukturOrganisasi::where('jabatan', 'Kepala Desa')->first();
        // $sekretaris = StrukturOrganisasi::where('jabatan', 'Sekretaris Desa')->first();
        $jabatans = StrukturOrganisasi::all();
        // $sliders = Slider::all();
        $slider1 = DB::table('slider')->value('slider1');

        return view('public.struktur', [
            'jabatans' => $jabatans,
            'slider1' => $slider1,

            // 'sekretaris' => $sekretaris
        ]);
    }

  

    public function getJabatan($id)
    {
        $data = StrukturOrganisasi::find($id);
        return response()->json($data);
    }


    public function main()
    {
        // $berita = Berita::all();
     
        return view('layout.main2');

    }
}
