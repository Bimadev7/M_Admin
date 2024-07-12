@extends('layouts.main')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
        padding: 20px;
    }
    .content {
        background: #fff;
        padding: 20px;
        margin-top: 20px;
    }
    h1, h2, h3 {
        color: #333;
    }
    p {
        line-height: 1.6;
    }
    details {
        margin-bottom: 1rem;
    }
    summary {
        background: #378CE7;
        color: #FFFFFF;
        padding: 1rem;
        cursor: pointer;
        border: 1px solid #ddd;
        border-radius: 4px;
        list-style: none;
        outline: none;
    }
    details[open] summary {
        background: #4B70F5;
    }
    .details-content {
        padding: 1rem;
        background: #fff;
        border-top: 1px solid #ddd;
    }
</style>

<div class="container">
    <div class="content">
        <h1>Panduan Pengguna Website Desa Padamukti</h1>

        <section id="pendahuluan">
            <h2>Pendahuluan</h2>
            <details>
                <summary>Pendahuluan</summary>
                <div class="details-content">
                    <p>Website Desa Padamukti adalah platform online yang dirancang untuk menyediakan informasi mengenai desa, layanan publik, kegiatan desa, dan berbagai informasi penting lainnya. Panduan ini akan memandu Anda dalam menggunakan fitur-fitur yang tersedia di website.</p>
                </div>
            </details>
        </section>

        <section id="tentang-desa">
            <h2>Tentang Desa</h2>
            <details>
                <summary>Profil Desa</summary>
                <div class="details-content">
                    <p>Desa Padamukti secara administratif merupakan salah satu desa di Kecamatan Solokan Jeruk, Kabupaten Bandung. Desa Padamukti mempunyai luas wilayah 263,4 ha/m2.</p>
                </div>
            </details>
            <details>
                <summary>Infrastruktur</summary>
                <div class="details-content">
                    <p>Informasi mengenai fasilitas umum di Desa Padamukti, seperti sekolah, puskesmas, dan balai desa.</p>
                </div>
            </details>
        </section>

        <section id="layanan-publik">
            <h2>Layanan Publik</h2>
            <details>
                <summary>Layanan Administratif</summary>
                <div class="details-content">
                    <p>Informasi mengenai pembuatan KTP, KK, dan surat keterangan.</p>
                </div>
            </details>
            <details>
                <summary>Layanan Kesehatan</summary>
                <div class="details-content">
                    <p>Informasi layanan kesehatan yang tersedia di Puskesmas desa dan program-program kesehatan yang dijalankan oleh desa.</p>
                </div>
            </details>
        </section>

        <section id="berita-kegiatan">
            <h2>Berita dan Kegiatan</h2>
            <details>
                <summary>Berita Terbaru</summary>
                <div class="details-content">
                    <p>Artikel berita terbaru mengenai kegiatan dan perkembangan di Desa Padamukti.</p>
                </div>
            </details>
            <details>
                <summary>Kegiatan</summary>
                <div class="details-content">
                    <p>Jadwal acara dan kegiatan yang akan datang di Desa Padamukti serta laporan kegiatan yang telah dilakukan.</p>
                </div>
            </details>
        </section>

        <section id="pariwisata">
            <h2>Pariwisata</h2>
            <details>
                <summary>Villa Kancil</summary>
                <div class="details-content">
                    <p>Informasi lengkap mengenai Villa Kancil, termasuk fasilitas dan cara reservasi.</p>
                </div>
            </details>
            <details>
                <summary>Wisata Alam</summary>
                <div class="details-content">
                    <p>Tempat-tempat wisata alam lainnya di Desa Padamukti.</p>
                </div>
            </details>
        </section>

        <section id="kontak">
            <h2>Kontak Kami</h2>
            <details>
                <summary>Formulir Kontak</summary>
                <div class="details-content">
                    <p>Cara mengirim pesan kepada administrasi desa melalui formulir kontak.</p>
                </div>
            </details>
            <details>
                <summary>Informasi Kontak</summary>
                <div class="details-content">
                    <p>Alamat, nomor telepon, dan email resmi Desa Padamukti.</p>
                </div>
            </details>
        </section>
    </div>
</div>

@endsection
