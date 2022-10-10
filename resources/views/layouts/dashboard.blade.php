<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
  <!-- Begin SEO tag -->
  <title>
    @yield('judul') - Toko Seneng Utomo
  </title>
  <meta property="og:title" content="Dashboard">
  <meta name="author" content="Admin">
  <meta property="og:locale" content="en_US">
  <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
  <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
  <link rel="canonical" href="https://uselooper.com">
  <meta property="og:url" content="https://uselooper.com">
  <meta property="og:site_name" content="Toko Seneng Utomo">
  <script type="application/ld+json">
      {
        "name": "Looper - Bootstrap 4 Admin Theme",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Person",
          "name": "Admin"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Dashboard",
        "@context": "http://schema.org"
      }
    </script><!-- End SEO tag -->
  <!-- FAVICONS -->
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('logo.png') }}">
  <link rel="shortcut icon" href="{{ asset('logo.png') }}">
  <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
  <!-- BEGIN PLUGINS STYLES -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}">
  <script src="https://kit.fontawesome.com/9a72d5393a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js" integrity="sha512-wT7uPE7tOP6w4o28u1DN775jYjHQApdBnib5Pho4RB0Pgd9y7eSkAV1BTqQydupYDB9GBhTcQQzyNMPMV3cAew==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script><!-- END PLUGINS STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.min.css') }}" data-skin="default">
  <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-dark.min.css') }}" data-skin="dark">
  <link rel="stylesheet" href="{{ asset('assets/stylesheets/custom.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    // Disable unused skin immediately
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    // add flag class to html immediately
    if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
  </script><!-- END THEME STYLES -->
</head>

<body>
  <!-- .app -->
  <div class="app">
    <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
    <!-- .app-header -->
    <header class="app-header app-header-dark">
      <!-- .top-bar -->
      <div class="top-bar">
        <!-- .top-bar-brand -->
        <div class="top-bar-brand">
          <!-- toggle aside menu -->
          <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
          <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" height="27px" alt="logo"><span style='font-size: 18px;margin-left: 10px;'>Seneng Utomo</span>
          </a>
        </div><!-- /.top-bar-brand -->
        <!-- .top-bar-list -->
        <div class="top-bar-list">
          <!-- .top-bar-item -->
          <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
            <!-- toggle menu -->
            <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
          </div><!-- /.top-bar-item -->
          <!-- .top-bar-item -->
          <div class="top-bar-item top-bar-item-full">
          </div><!-- /.top-bar-item -->
          <!-- .top-bar-item -->
          <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
            {{-- <!-- .nav -->
              <ul class="header-nav nav">
                <!-- .nav-item -->
                <li class="nav-item dropdown header-nav-dropdown">
                  <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-grid-three-up"></span></a> <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                    <div class="dropdown-arrow"></div><!-- .dropdown-sheets -->
                    <div class="dropdown-sheets">
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-indigo"><i class="oi oi-people"></i></span> <span class="tile-peek">Teams</span></a>
                      </div><!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-teal"><i class="oi oi-fork"></i></span> <span class="tile-peek">Projects</span></a>
                      </div><!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-pink"><i class="fa fa-tasks"></i></span> <span class="tile-peek">Tasks</span></a>
                      </div><!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-yellow"><i class="oi oi-fire"></i></span> <span class="tile-peek">Feeds</span></a>
                      </div><!-- /.dropdown-sheet-item -->
                      <!-- .dropdown-sheet-item -->
                      <div class="dropdown-sheet-item">
                        <a href="#" class="tile-wrapper"><span class="tile tile-lg bg-cyan"><i class="oi oi-document"></i></span> <span class="tile-peek">Files</span></a>
                      </div><!-- /.dropdown-sheet-item -->
                    </div><!-- .dropdown-sheets -->
                  </div><!-- .dropdown-menu -->
                </li><!-- /.nav-item -->
              </ul><!-- /.nav -->
              <!-- .btn-account --> --}}
            <div class="dropdown d-none d-md-flex">
              <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (Auth::user()->photo != null)
                  <span class="user-avatar user-avatar-md"><img src="{{ asset('user') . '/' . Auth::user()->photo }}" alt=""></span>
                @else
                  <span class="user-avatar user-avatar-md"><img src="{{ asset('assets/images/avatars/profile.jpg') }}" alt=""></span>
                @endif
                <span class="account-summary pr-lg-4 d-none d-lg-block">
                  <span class="account-name">{{ Auth::user()->name }}</span>
                  @if (Auth::user()->role == 'admin')
                    <span class="account-description">Super User</span>
                  @else
                    <span class="account-description">Kasir</span>
                  @endif
                </span>
              </button> <!-- .dropdown-menu -->
              <div class="dropdown-menu">
                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                <h6 class="dropdown-header d-none d-md-block d-lg-none"> {{ Auth::user()->name }} </h6>
                {{-- <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> --}}
                <a class="dropdown-item" href="./logout"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
              </div><!-- /.dropdown-menu -->
            </div><!-- /.btn-account -->
          </div><!-- /.top-bar-item -->
        </div><!-- /.top-bar-list -->
      </div><!-- /.top-bar -->
    </header><!-- /.app-header -->
    <!-- .app-aside -->
    <aside class="app-aside app-aside-expand-md app-aside-light">
      <!-- .aside-content -->
      <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
          <!-- .btn-account -->
          <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
            @if (Auth::user()->photo != null)
              <span class="user-avatar user-avatar-lg"><img src="{{ asset('user') . '/' . Auth::user()->photo }}" alt=""></span>
            @else
              <span class="user-avatar user-avatar-lg"><img src="{{ asset('assets/images/avatars/profile.jpg') }}" alt=""></span>
            @endif
            <span class="account-icon">
              <span class="fa fa-caret-down fa-lg"></span>
            </span>
            <span class="account-summary">
              <span class="account-name">{{ Auth::user()->name }}</span>
              @if (Auth::user()->role == 'admin')
                <span class="account-description">Super User</span>
              @else
                <span class="account-description">Kasir</span>
              @endif
            </span>
          </button> <!-- /.btn-account -->
          <!-- .dropdown-aside -->
          <div id="dropdown-aside" class="dropdown-aside collapse">
            <!-- dropdown-items -->
            <div class="pb-3">
              <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="./logout"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
            </div><!-- /dropdown-items -->
          </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
          <!-- .stacked-menu -->
          <nav id="stacked-menu" class="stacked-menu">
            <!-- .menu -->
            <ul class="menu">
              <!-- .menu-item -->
              <li class="menu-item">
                <a href="{{ route('home') }}" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
              </li><!-- /.menu-item -->
              <li class="menu-item">
                <a href="{{ route('kasir') }}" class="menu-link"><span class="menu-icon fa-solid fa-cash-register"></span> <span class="menu-text">Kasir</span></a>
              </li><!-- /.menu-item -->
              <!-- .menu-item -->
              <li class="menu-item has-child">
                <a href="#" class="menu-link"><span class="menu-icon fa-solid fa-print"></span> <span class="menu-text">Transaksi</span></a> <!-- child menu -->
                <ul class="menu">
                  <li class="menu-item has-child">
                    <a href="#" class="menu-link">Gudang</a>
                    <!-- grand child menu -->
                    <ul class="menu">
                      <li class="menu-item">
                        <a href="{{ route('gudang.show') }}" class="menu-link">Daftar Barang</a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('gudang.input') }}" class="menu-link">Tambah Barang</a>
                      </li>
                    </ul><!-- /grand child menu -->
                  </li>
                  <li class="menu-item">
                    <a href="{{ route('laporan_jual') }}" class="menu-link">Laporan Penjualan</a>
                  </li>
                </ul><!-- /child menu -->
              </li><!-- /.menu-item -->
            </ul><!-- /.menu -->
          </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
          <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
      </div><!-- /.aside-content -->
    </aside><!-- /.app-aside -->
    <!-- .app-main -->
    @yield('content')
    <!-- /.app-main -->
  </div><!-- /.app -->
  <!-- Modal Delete -->
  <div class="modal fade" id="delete_confirmation" tabindex="-1" role="dialog" aria-labelledby="delete_confirmation" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header flex-column">
          <h4 class="modal-title w-100">Apakah Anda Yakin?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.</p>
        </div>
        <form action="@yield('delete')" id="delete-form" method="post">
          @csrf
          <input type=hidden id="id_delete" value="" name="id">
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Restore -->
  <div class="modal fade" id="restore_confirmation" tabindex="-1" role="dialog" aria-labelledby="restore_confirmation" aria-hidden="true">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header flex-column">
          <h4 class="modal-title w-100">Apakah Anda Yakin?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Apakah anda ingin mengembalikan data ini?</p>
        </div>
        <form action="@yield('restore')" id="restore-form" method="post">
          @csrf
          <input type=hidden id="id_restore" value="" name="id">
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Restore</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BEGIN BASE JS -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
  <!-- BEGIN PLUGINS JS -->
  <script src="{{ asset('assets/vendor/pace-progress/pace.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <!-- Sweet Alert 2 plugin -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script><!-- END PLUGINS JS -->
  <!-- BEGIN THEME JS -->
  <script src="{{ asset('assets/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
  <!-- CUSTOM JS -->
  <script src="{{ asset('assets/javascript/custom.js') }}"></script> <!-- END CUSTOM JS -->

  <!-- BEGIN PAGE LEVEL JS -->
  <script src="{{ asset('assets/javascript/pages/dashboard-demo.js') }}"></script>
  <script src="{{ asset('assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
  <!-- END PAGE LEVEL JS -->
  <script>
    var current = location.pathname;
    $('.menu-item a').each(function() {
      var $this = $(this);
      // if the current path is like this link, make it active
      if ($this.attr('href') == window.location.href) {
        $this.parent().addClass('has-active');
      }
    })
  </script>
  @if (session('notif'))
    <script>
      $(document).ready(function() {
        Toast.fire({
          icon: "{{ session('alert') }}",
          title: "{{ session('notif') }}"
        })
      });
    </script>
  @endif
  @include('layouts.data_table')
  <script>
    $("#delete-form").on('submit', function(event) {
      event.preventDefault();
      $values = $(this).serialize();
      $id = $('#id_delete').val();
      $table = $('#myTable').DataTable();
      $form = $(this);
      $form.find('button[type="submit"]').attr('disabled', true);
      $form.find('button[type="submit"]').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#delete-form').attr('action'),
        type: "post",
        data: $values,
        success: function(response) {
          Toast.fire({
            icon: response['alert'],
            title: response['notif']
          });
          $('#delete_confirmation').modal('hide');
          $('#myTable').DataTable().clear().draw();
          $form.find('button[type="submit"]').removeAttr('disabled');
          $form.find('button[type="submit"]').html('Hapus');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    });


    $("#restore-form").on('submit', function(event) {
      event.preventDefault();
      $values = $(this).serialize();
      $id = $('#id_restore').val();
      $table = $('#myTable').DataTable();
      $form = $(this);
      $form.find('button[type="submit"]').attr('disabled', true);
      $form.find('button[type="submit"]').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#restore-form').attr('action'),
        type: "post",
        data: $values,
        success: function(response) {
          Toast.fire({
            icon: response['alert'],
            title: response['notif']
          });
          $('#restore_confirmation').modal('hide');
          $('#myTable').DataTable().clear().draw();
          $form.find('button[type="submit"]').removeAttr('disabled');
          $form.find('button[type="submit"]').html('Hapus');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
        }
      });
    });
  </script>
  @stack('custom-js')
</body>

</html>
