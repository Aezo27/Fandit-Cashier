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
            <h1 class="m-0 text-dark">Edit Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('profile')}}">Profile</a></li>
              <li class="breadcrumb-item active">Edit Profil</li>
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
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST"  enctype="multipart/form-data" action="{{ route('update_profile') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name='email' placeholder="Alamat Email" value="{{Session::get('email')}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText1">Nama Toko</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_toko" placeholder="Nama Toko" value="{{$data->nama_toko}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText2">Nama Pemilik</label>
                    <input type="text" class="form-control" id="exampleInputText2" name="nama" placeholder="Nama Pemilik" value="{{$data->nama}}" style="text-transform:capitalize" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText3">No. Hp.</label>
                    <input type="text" class="form-control" id="exampleInputText3" name="no_hp" placeholder="Nomor HP" value="{{$data->no_hp}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText4">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputText4" name="alamat" placeholder="Alamat" value="{{$data->alamat}}" style="text-transform:capitalize" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto Profil</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" accept="image/*" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                    </div>
                    <small class="form-text text-muted" style="color:#ce0000 !important; font-weight:bold;">Max Size 2MB</small>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-new float-right">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
