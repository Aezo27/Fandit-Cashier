@php
    $id = Session::get('id');
    $orders = App\Order::where('status', '!=', 'finish')->get();
    $orders2 = App\Order::where('status', 'finish')->get();
    $product = App\Product::all();
    $datares = App\data_reseller::all();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name') }} | @yield('judul')</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('storage/logo.png')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/font-awesome/css/font-awesome.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('logad/dist/css/adminlte.min.css')}}">
  @yield('css')
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('logad/dist/css/admin.css')}}">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/sweetalert2/sweetalert2.min.css')}}">
  <!-- Color Picker -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- DateTime Picker -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('logad/plugins/bootstrap-datepicker/bootstrap-datepicker.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @stack('custom-css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link" target="_blank">Shop</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link" target="_blank">
      <img src="{{asset('storage/logo.png')}}" alt="{{ config('app.name') }} Logo" class="brand-image">
      <span class="brand-text font-weight-bold">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link @yield('home')">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="{{ route('on_process_orders') }}" class="nav-link @yield('on_process')">
              <i class="nav-icon fa fa-truck"></i>
              <p>
                On Process
                <span class="badge badge-info right">{{ $orders->count() }}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('finish_orders') }}" class="nav-link @yield('finish')">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Finish
                <span class="badge badge-info right">{{ $orders2->count() }}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cetak_laporan') }}" class="nav-link @yield('cetak_laporan')">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Laporan Penjualan
              </p>
            </a>
          </li>

          <li class="nav-header">PRODUCT</li>
          <li class="nav-item">
            <a href="{{ route('productList') }}" class="nav-link @yield('product_list')">
              <i class="nav-icon fa fa-heart"></i>
              <p>
                Product List
                <span class="badge badge-info right">{{ $product->count() }}</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('addProduct') }}" class="nav-link @yield('add_product')">
              <i class="nav-icon fa fa-plus"></i>
              <p>
                Tambahkan Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('categories') }}" class="nav-link @yield('categories')">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('color') }}" class="nav-link @yield('color')">
              <i class="nav-icon fa fa-edit"></i>
              <p>
               Warna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('voucher') }}" class="nav-link @yield('voucher')">
              <i class="nav-icon fa fa-bookmark"></i>
              <p>
               Voucher
              </p>
            </a>
          </li>

          <li class="nav-header">PAGE</li>
          <li class="nav-item has-treeview @yield('open')">
              <a href="#" class="nav-link @yield('shopping')">
                  <i class="nav-icon fa fa-shopping-cart"></i>
                  <p>
                      Shopping Page
                      <i class="fa fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('indexShopping')}}" class="nav-link @yield('index')">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Index Page</p>
                      </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('seeFaq')}}" class="nav-link @yield('faq')">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Faq</p>
                      </a>
                  </li>
              </ul>
          </li>
          {{-- <li class="nav-item has-treeview @yield('open2')">
              <a href="#" class="nav-link @yield('landing')">
                  <i class="nav-icon fa fa-external-link"></i>
                  <p>
                      Landing Page
                      <i class="fa fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('textBanner')}}" class="nav-link @yield('text-editor')">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Text Editor</p>
                      </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('service')}}" class="nav-link @yield('services')">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Service</p>
                      </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{route('testimoni')}}" class="nav-link @yield('testimoni')">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Testimoni</p>
                      </a>
                  </li>
              </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('footLink') }}" class="nav-link @yield('footLink')">
              <i class="nav-icon fa fa-arrows"></i>
              <p>
                Footer Link
              </p>
            </a>
          </li>

          <li class="nav-header">USER</li>
          {{-- <li class="nav-item">
            <a href="{{ route('reseller') }}" class="nav-link @yield('reseller')">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Reseller
                <span class="badge badge-info right">{{ $datares->count() }}</span>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('seeContact') }}" class="nav-link @yield('kontak')">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Kontak
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('bank') }}" class="nav-link @yield('bank')">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link @yield('profil')">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fa fa-power-off red"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('konten')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <a href="http://adminlte.io/" title="Rama Sullivan">AdminLTE </a> | edited by <a href="http://aezo27.github.io/" title="Rama Sullivan">Aezo27 </a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright © <script>document.write(new Date().getFullYear());</script> | <a href="{{route('home')}}" title="{{config('app.name')}}" target="_blank">{{config('app.name')}} </a> | All Rights Reserved.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('logad/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('logad/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('logad/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('logad/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('logad/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('logad/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- Sweet Alert 2 -->
<script src="{{ asset('logad/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<!-- Color Picker -->
<script src="{{ asset('logad/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- DateTime Picker -->
<script src="{{ asset('logad/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('logad/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Api Ongkir -->
<script src="{{asset('utama/js/api_ongkir.js')}}"></script>
<!-- page script -->
<script>
$(document).ready(function ($) {
    $("#example1").DataTable({
    "responsive": true,
    "scrollX": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    });
    $("#example2").DataTable({
    "responsive": true,
    "scrollX": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    });
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.input-group .fa-square').css('color', event.color.toString());
    });
    $('#reservation').datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left"
    });
    $('#reservation').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
  });
</script>
@yield('javascript')
<!-- Custom JS -->
<script src="{{ asset('logad/dist/js/file.js')}}"></script>
@stack('custom-scripts')
</body>
</html>
