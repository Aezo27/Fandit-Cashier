@extends('layouts.res_master')
@section('judul', 'Rekening Pembayaran')
@section('bank', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rekening Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Rekening Pembayaran</li>
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
                    <h3 class="card-title">List Rekening</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Barcode</th>
                                <th>Nama Bank</th>
                                <th>No. Rek.</th>
                                <th>A.N.</th>
                                <th style="width: 180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $num => $b)
                            <tr>
                                <td>{{$num + 1}}</td>
                                @if ($b->barcode!=null)
                                <td><img src="{{asset('storage/bank/'.$b->barcode)}}" alt=""></td>
                                @else
                                <td>--</td>
                                @endif

                                <td>{{$b->nama_bank}}</td>
                                <td>{{$b->no_rek}}</td>
                                <td>{{$b->an}}</td>
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('bank').'/'.$b->id}}"><i class="fa fa-edit"></i> Edit</a>
                                    <form id="delOrd" action="{{route('bank').'/'.$b->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$b->id}}"><i class="fa fa-trash"></i> Delete</button>
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
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-12">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Tambah Rekening</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addBank')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Bank<span>*</span></label>
                            <input type="text" class="form-control" name="bank" required placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>No. Rek.<span>*</span></label>
                            <input type="text" class="form-control" name="rek" required placeholder="Nomor Rekening">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama<span>*</span></label>
                            <input type="text" class="form-control" name="an" required placeholder="Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <label>Barcode<span>*(bila ada)</span></label>
                            <div class="file_button_container" style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                <input type="file" id="file1" name="barcode" accept="image/*">
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
