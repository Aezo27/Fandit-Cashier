<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | @yield('judul')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('storage/logo.png')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/font-awesome/css/font-awesome.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('logad/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('logad/dist/css/adminlte.min.css')}}">
  <!-- User Style -->
  <link rel="stylesheet" href="{{ asset('logad/dist/css/reseller.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="reseller">

<div class="login-box @yield('hiden')">
  <div class="login-logo">
    <a href="{{route('home')}}"><b>
      <img src="{{asset('storage/logo_long.png')}}" height="100"><br>
      <b>@yield('judul')</b>
    </a>
  </div>
  <!-- /.login-logo -->

   @yield('konten')

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('logad/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('logad/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{ asset('logad/dist/js/reseller.js')}}"></script>


</body>
</html>
