@extends('layouts.log_master')
@section('judul', 'Verifikasi Email')

@section('konten')
  <div class="card">
    <div class="card-body login-card-body">
       @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
      <p class="justify mb-0">
      {{ __('Sebelum melanjutkan silahkan verifikasi email anda terlebih dahulu.') }}
      {{ __('Jika tidak mendapatkan email silahkan') }},</p>
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" style="text-transform:none; font-weight:bold;" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk mengirim ulang permintaan') }}</button>
      </form>
    </div>
    <!-- /.login-card-body -->
      <div class="foot-box">
      <a href="{{ route('home') }}">Kembali ke Beranda</a><br>
      </div>
  </div>
@endsection
