<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desa Padamukti</title>

  {{-- Bootstrap CSS --}}
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  {{-- jQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- Bootstrap JS --}}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- CkEditor -->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">Desa Padamukti</span>
      <img src="{{ asset('green/assets/img/logo-padamukti.png') }}" alt="AdminLTE Logo" class="brand-image img-circle" style="max-width: 100px; margin-right: 8px;">
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Profil Desa -->
        
          
          <!-- Other Menu Items -->
          <li class="nav-item">
            <a href="/backoffice/berita" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Berita</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/backoffice/pengumuman" class="nav-link">
              <i class="nav-icon fas fa-volume-up"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/backoffice/profildesa_visi" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>Profil Desa</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/backoffice/lembagadesa" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>Lembaga Desa</p>
            </a>
          </li>

          
          <!-- Logout Form -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link btn btn-link">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </ul>
      </nav>
    </div>
  </aside>
  <!-- /.sidebar -->

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <section class="content">
      <div style='margin-top: -10px'>
        @stack('script')
        @yield('content')
      </div>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer"></footer>
  <!-- /.footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"></aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- Additional Scripts -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>

<!-- CKEditor Init -->
<script>
  $(document).ready(function() {
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
    CKEDITOR.replace('editor4');
    CKEDITOR.replace('editor5');
    CKEDITOR.replace('editor6');
  });
</script>

</body>
</html>
