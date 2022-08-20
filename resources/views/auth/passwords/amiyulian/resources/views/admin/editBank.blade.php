@extends('layouts.res_master')
@section('judul', 'Edit Rekening Pembayaran')
@section('bank', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Rekening Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Rekening Pembayaran</li>
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
                    <h3 class="card-title">Edit Rekening Pembayaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('bank').'/'.$bank->id.'/update'}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Bank<span>*</span></label>
                            <input type="text" class="form-control" value="{{$bank->nama_bank}}" name="bank" required placeholder="Nama Bank">
                        </div>
                        <div class="form-group">
                            <label>No. Rek.<span>*</span></label>
                            <input type="text" class="form-control" name="rek" value="{{$bank->no_rek}}" required placeholder="Nomor Rekening">
                        </div>
                        <div class="form-group">
                            <label>Atas Nama<span>*</span></label>
                            <input type="text" class="form-control" name="an" value="{{$bank->an}}" required placeholder="Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <label>Barcode<span>*</span></label>
                            @if ($bank->barcode != null)
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/bank/'.$bank->barcode)}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="barcode" accept="image/*">
                                </div>
                            @else
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="barcode" accept="image/*">
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
