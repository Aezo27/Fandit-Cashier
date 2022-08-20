@extends('layouts.res_master')
@section('judul', 'Categories')
@section('categories', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Kategori</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $num => $cate)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td>{{$cate->judul}}</td>
                                <td>
                                    <form id="delOrd" action="{{route('categories').'/'.$cate->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$cate->id}}"><i class="fa fa-trash"></i> Delete</button>
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
                        {{ $categories->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addCategories')}}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="judul" required placeholder="Kategori">
                            <div class="input-group-prepend">
                                <button type="submit" type="button" class="btn btn-success">Tambah</button>
                            </div>
                            <!-- /btn-group -->
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
