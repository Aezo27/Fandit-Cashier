@extends('layouts.res_master')
@section('judul', 'Color')
@section('color', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Colors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Colors</li>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Warna</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0 scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Warna</th>
                                <th style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $num => $color)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td>{{$color->nama}}</td>
                                <td>{{$color->kode}}</td>
                                <td><label class="bulet" style="background: {{$color->kode}}" for="Merah"></label></td>
                                <td>
                                    <form id="delOrd" action="{{route('color').'/'.$color->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$color->id}}"><i class="fa fa-trash"></i> Delete</button>
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
                        {{ $colors->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addColor')}}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama" required placeholder="Nama Warna">
                            <input type="text" class="form-control my-colorpicker2" name="kode" placeholder="Pilih Warna" colorpicker-element" data-colorpicker-id="2">
                            <div class="input-group-append">
                                <span class="input-group-text kotak"><i class="fa fa-square" style="color: #fff"></i></span>
                            </div>
                        </div>
                        <div>
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
