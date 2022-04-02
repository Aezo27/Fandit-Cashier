@extends('layouts.auth')

@section('content')
  <main class="auth">
      <header id="auth-header" class="auth-header" style="background-image: url({{asset('assets/images/illustration/img-1.png')}});">
        <h1>
          <img src="{{asset('logo.png')}}" height="150px" alt="logo">
        </h1>
        </p>
      </header><!-- form -->
      <form class="auth-form" method="POST"  action="{{ route('login') }}">
        @csrf
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputUser" class="form-control" name="email" placeholder="Username" autofocus=""> <label for="inputUser">Email</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"> <label for="inputPassword">Password</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="remember_me" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
          </div>
        </div><!-- /.form-group -->
        <!-- recovery links -->
        <div class="text-center pt-3">
          <a href="auth-recovery-password.html" class="link">Forgot Password?</a>
        </div><!-- /recovery links -->
      </form><!-- /.auth-form -->
      <!-- copyright -->
      <footer class="auth-footer"> Copyright &copy; <script>document.write(new Date().getFullYear());</script>| <a href="{{route('home')}}">{{config('app.name')}}</a> | All Rights Reserved.
      </footer>
    </main>
@endsection