@extends('layouts.res_master')
@section('judul', 'Faq Page Shopping')
@section('open', 'menu-open')
@section('faq', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Faq Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Shopping Page</li>
              <li class="breadcrumb-item active">Faq</li>
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
                    <h3 class="card-title">Daftar Faq</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>judul</th>
                                <th style="width: 180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $num => $faq)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td>{{$faq->judul}}</td>
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('seeFaq').'/'.$faq->id}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="delOrd" action="{{route('seeFaq').'/'.$faq->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$faq->id}}"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-white clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $faqs->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Faq</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addFaq')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul<span>*</span></label>
                            <input type="text" class="form-control" name="judul" required placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label>Isi Faq<span>*</span></label>
                            <textarea type="text" class="form-control" name="isi" required placeholder="Isi Faq"></textarea>
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
