@extends('layouts.res_master')
@section('judul', 'Services')
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
            <h1 class="m-0 text-dark">Services Text</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Landing Page</li>
              <li class="breadcrumb-item active">Services Text</li>
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
                    <h3 class="card-title">Services Text List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Judul</th>
                                <th style="width: 180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $num => $service)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td>{{$service->judul}}</td>
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('service').'/'.$service->id}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="delOrd" action="{{route('service').'/'.$service->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$service->id}}"><i class="fa fa-trash"></i> Delete</button>
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
                        {{$services->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Tambah Services Text</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addService')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul<span>*</span></label>
                            <input type="text" class="form-control" name="judul" required placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Isi Text<span>*</span></label>
                            <textarea type="text" class="form-control" name="isi" required placeholder="Isi Text"></textarea>
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
