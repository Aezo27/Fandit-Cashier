@extends('layouts.res_master')
@section('judul', 'Voucher')
@section('vaucher', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Voucher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Voucher</li>
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
                    <h3 class="card-title">Daftar Voucher</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Kode</th>
                                <th>Potongan</th>
                                <th style="width: 120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voucher as $num => $vc)
                            <tr>
                                <td>{{$num + 1}}</td>
                                <td>{{$vc->kode}}</td>
                                @if ($vc->potongan!=null)
                                <td>@currency(-$vc->potongan)</td>
                                @else
                                <td>{{-$vc->persen}}%</td>
                                @endif
                                <td>
                                    <form id="delOrd" action="{{route('voucher').'/'.$vc->id.'/delete'}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm delete" id="{{$vc->id}}"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix bg-white">
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Voucher</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('addVoucher')}}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode<span>*</span></label>
                            <input type="text" class="form-control" name="kode" required placeholder="Huruf Kapital">
                        </div>
                        <div class="form-group">
                            <label>Potongan<span>*</span></label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="jenis" value="1" id="customSwitch1">
                                <label class="custom-control-label" style="padding-left: 20px;" for="customSwitch1">Jenis potongan uang/%</label>
                              </div>
                            <input type="text" class="form-control mt-2" name="potongan" required placeholder="Sesuaikan Tombol Diatas">
                        </div>
                        <div class="float-right">
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
