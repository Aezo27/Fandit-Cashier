@extends('layouts.res_master')
@section('judul', 'Profil')
@section('profil', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('reseller')}}">Reseller List</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <div class="widget-user-header text-white" style="background: url('{{ asset('logad/dist/img/photo1.png')}}') center center;">
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('profil/'.$reseller->foto_profil)}}" alt="{{ config('app.name') }} Logo">
            </div>
              <div class="card-footer pt-0">
                <ul class="nav flex-column pt-5 p-3">
                  <li class="nav-item">
                    <h6 class="nav-link">
                      Nama Toko <span class="float-right">{{$reseller->nama_toko}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      ID <span class="float-right">{{$reseller->id}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      Nama Pemilik <span class="float-right">{{$reseller->nama}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      Email <span class="float-right">{{$user->email}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      No. Hp. <span class="float-right">{{$reseller->no_hp}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      Alamat <span class="float-right">{{$reseller->alamat}}</span>
                    </h6>
                  </li>
                  <li class="nav-item">
                    <h6 class="nav-link">
                      Bergabung <span class="float-right">{{$reseller->created_at->isoFormat("dddd, Do MMMM Y")}}</span>
                    </h6>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
