<!-- views/layout/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        .content {
            flex: 1;
        }
        footer {
            margin-top: auto;
        }
         body {
    padding-top: 200px; /* Jarak minimum antara header dan konten */
  }
    </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Desa Padamukti | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/green/assets/img/logo-padamukti.png" rel="icon">
  <link href="image/logo-padamukti.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/green/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/green/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/green/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/green/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/green/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/green/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxx" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icons.min.css">

  <!-- Template Main CSS File -->
  <link href="/green/assets/css/style.css" rel="stylesheet">
</head>

<body class="p-0">
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between align-items-center">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">Desa_padaMukti@Pemdes.com</a>
        <i class="bi bi-phone-fill phone-icon"></i><a href="/">082320407767 </a>
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>
  
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="/" class="logo me-auto d-flex align-items-center">
                <img src="/image/logo-padamukti.png" alt="Logo Padamukti">
                <h6 class="mb-0 ms-2">
                    <a href="/" class="text-dark">
                        <strong>Desa Padamukti</strong><br />
                        Kabupaten Garut
                    </a>
                </h6>
            </a>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/">Home</a></li>
                <li class="dropdown">
                    <a href="/"><span>Profil Desa</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('tentang-desa') }}">Tentang Desa</a></li>
                        <li><a href="{{ route('visi-misi') }}">Visi dan Misi</a></li>
                        <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ route('geografis') }}">Geografis</a></li>
                        <li><a href="{{ route('demografi') }}">Demografi </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/"><span>Pemerintahan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link" href="{{ route('struktur-desa') }}">Struktur Desa</a></li>
                        {{-- <li><a href="{{ route('perangkat-desa') }}">Perangkat Desa</a></li> --}}
                        <li><a href="{{ route('lembaga-desa') }}">Lembaga Desa</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="/"><span>Informasi Publik</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('berita-desa') }}">Berita Desa</a></li>
                        <li><a href="{{ route('pengumuman') }}">Pengumuman Desa</a></li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        Login
                    </button>
                </li>
            </ul>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>
  <!-- End Header -->

  <main>
    @yield('content')
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-md-left">
                <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('image/logo-padamukti.png') }}" alt="Desa Padamukti Logo" class="img-fluid" style="max-width: 80px; margin-right: 10px;">
                    <h4>
                        <a href="/" class="text-white">
                            <strong>Desa Padamukti</strong><br>
                                 Kabupaten Garut
                        </a>
                    </h4>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <h4>Contact Us</h4>
                <p>
                Padamukti, Kec. Pasirwangi, Kabupaten Garut, Jawa Barat 44161<br><br>
                    <strong>Phone:</strong> 082320407767<br>
                    <strong>Email:</strong> info@desapadamukti.id
                </p>
            </div>
            <div class="col-md-4 text-center text-md-right">
              <h4>Tautan</h4>
              <div class="text-white">
                  <ul class="list-unstyled">
                      <li><a href="{{ route('tentang-desa') }}" class="text-white">Tentang Desa</a></li>
                      <li><a href="{{ route('visi-misi') }}" class="text-white">Visi dan Misi</a></li>
                      <li><a href="{{ route('sejarah') }}" class="text-white">Sejarah</a></li>
                      <li><a href="{{ route('geografis') }}" class="text-white">Geografis</a></li>
                      <li><a href="{{ route('demografi') }}" class="text-white">Demografi</a></li>
                  </ul>
              </div>
            </div>

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <div class="copyright">
                    &copy; Copyright <strong>Desa Padamukti</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
</footer>
 <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLoginLabel">Masuk ke Akun Anda</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form login bisa Anda tambahkan di sini -->
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success">Masuk</button>
              </form>
            </div>
          </div>
        </div>
      </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/green/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/green/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/green/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/green/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/green/assets/vendor/php-email-form/validate.js"></script>
  <script src="/green/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main JS File -->
  <script src="/green/assets/js/main.js"></script>

</body>
</html>


