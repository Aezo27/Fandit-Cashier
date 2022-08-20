@extends('layouts.res_master')
@section('judul', 'Edit Testimoni')
@section('open2', 'menu-open')
@section('landing', 'active')
@section('testimoni', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Testimoni</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Landing Page</li>
              <li class="breadcrumb-item active">Edit Testimoni</li>
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
        <div class="col-12">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Edit Testimoni</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('testimoni').'/'.$testi->id.'/update'}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama<span>*</span></label>
                            <input type="text" class="form-control" value="{{$testi->nama}}" name="nama" required placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Pesan<span>*</span></label>
                            <textarea type="text" class="form-control" name="pesan" required placeholder="Pesan">{{$testi->pesan}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto<span>*</span></label>
                            @if ($testi->foto != null)
                                <div class="file_button_container"
                                    style="background: url({{asset('iklan_pic/'.$testi->foto)}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="foto" accept="image/*">
                                </div>
                            @else
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="foto" accept="image/*">
                                </div>
                            @endif
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" type="button" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer bg-white">
                    </div>
                </form>
            </div>
        </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
