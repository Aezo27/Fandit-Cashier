@extends('layouts.res_master')
@section('judul', 'Testimoni')
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
            <h1 class="m-0 text-dark">Testimoni</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Landing Page</li>
              <li class="breadcrumb-item active">Testimoni</li>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Testimoni List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th style="width: 180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimoni as $num => $testi)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td><img src="{{asset('iklan_pic/'.$testi->foto)}}" alt=""></td>
                                <td>{{$testi->nama}}</td>
                                <td>{{$testi->pesan}}</td>
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('testimoni').'/'.$testi->id}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="delOrd" action="{{route('testimoni').'/'.$testi->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$testi->id}}"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{$testimoni->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Tambah Testimoni</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addTestimoni')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama<span>*</span></label>
                            <input type="text" class="form-control" name="nama" required placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Pesan<span>*</span></label>
                            <textarea type="text" class="form-control" name="pesan" required placeholder="Pesan"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto<span>*</span></label>
                            <div class="file_button_container" style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                <input type="file" id="file1" name="foto" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" type="button" class="btn btn-success">Tambah</button>
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
