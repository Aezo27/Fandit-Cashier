@extends('layouts.res_master')
@section('judul', 'Text Banner')
@section('open2', 'menu-open')
@section('landing', 'active')
@section('text-editor', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Landing Page Text</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Landing Page</li>
              <li class="breadcrumb-item active">Page Text</li>
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
                <div class="card card-black">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Edit Landing Page Text
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" style="position: relative;">
                                <form action="{{route('updateTextBanner')}}" method="POST" role="form">
                                    @csrf
                                    @foreach ($textb as $tb)
                                    <div class="form-group">
                                            <label style="text-transform: capitalize">{{$tb->bagian}}<span>*</span></label>
                                            <input type="text" class="form-control mb-2" name="judul[]" required value="{{$tb->judul}}" placeholder="judul sesuaikan konteks bagian">
                                            <textarea type="text" class="form-control" name="isi[]" required placeholder="text sesuaikan konteks bagian">{{$tb->isi}}</textarea>
                                    </div>
                                    @endforeach
                                    <div class="float-right">
                                        <button type="submit" type="button" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
            <div class="col-12">
                <div class="card card-black">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Edit Background
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" style="position: relative;">
                                <form action="{{route('updateBG')}}" enctype="multipart/form-data" method="POST" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Background<span>*</span></label>
                                        <div class="file_button_container" style="background: url({{asset('iklan_pic/hero_2.png')}}) left top no-repeat; background-size: 200px;">
                                            <input type="file" id="file1" name="bg" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Toko<span>*</span></label>
                                        <div class="file_button_container" style="background: url({{asset('iklan_pic/about_1.png')}}) left top no-repeat; background-size: 200px;">
                                            <input type="file" id="file2" name="toko" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" type="button" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
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
