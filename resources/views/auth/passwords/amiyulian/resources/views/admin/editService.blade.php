@extends('layouts.res_master')
@section('judul', 'Edit Service Text')
@section('open2', 'menu-open')
@section('landing', 'active')
@section('services', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Service Text</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Landing Page</li>
              <li class="breadcrumb-item active">Edit Service Text</li>
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
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Service Text</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('service').'/'.$service->id.'/update'}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul<span>*</span></label>
                            <input type="text" class="form-control" name="judul" value="{{$service->judul}}"  required placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Isi Faq<span>*</span></label>
                            <textarea type="text" class="form-control" name="isi" required placeholder="Isi Faq">{{$service->isi}}</textarea>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" type="button" class="btn btn-danger">Simpan</button>
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
