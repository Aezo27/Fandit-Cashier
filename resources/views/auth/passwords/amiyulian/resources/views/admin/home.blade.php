@extends('layouts.res_master')
@section('judul', 'Admin')
@section('home', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Selamat Datang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
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
                <h3 class="card-title">Reseller Page</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="card-body text-justify" style="display: block;">
                <p>
                    Selamat datang di halaman admin, halaman yang berguna untuk mempermudah admin dalam memantau data order, post produk, data reseller, dll, apabila ada masalah silahkan hubungi pemilik, terimkasih.
                </p>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $orders->count() }}</h3>
                            <p>Pesanan Dalam Proses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('on_process_orders')}}" class="small-box-footer">Selengkapnnya <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $orders2->count() }}</h3>
                            <p>Pesanan Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark"></i>

                        </div>
                        <a href="{{route('finish_orders')}}" class="small-box-footer">Selengkapnnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $product->sum('views') }}</h3>
                            <p>Product Viewers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('product')}}" class="small-box-footer">Selengkapnnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $product->count() }}</h3>
                            <p>Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>

                        </div>
                        <a href="{{route('product')}}" class="small-box-footer">Selengkapnnya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card card-navy">
              <div class="card-header ">
                <h3 class="card-title">Cek Resi</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <form action="#" method="get" name="cek_resi" class="cek_resi">
                  <div class="input-group">
                    <input type="text" name="resi" placeholder="No. Resi..." class="form-control" required>
                    <span class="input-group-append">
                        <select class="form-control" name="kurir" id="res_kurir" required>
                            <option value="">-- Pilih Kurir --</option>
                            <option value="jne">JNE</option>
                            <option value="jnt">J&T</option>
                            <option value="sicepat">SiCepat</option>
                            <option value="wahana">Wahana</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS INDONESIA</option>
                        </select>
                      <button type="submit" class="btn btn-warning">Cek</button>
                    </span>
                  </div>
                </form>
                <div class="loading mt-3 text-center">
                    <span style="font-weight: bold">Menyambungkan ke server...</span>
                </div>
                <div class="hasil-resi">
                    <table class="hs-head">
                        <tr>
                            <td>No Resi</td>
                            <td>:</td>
                            <td id="resi"></td>
                        </tr>
                        <tr>
                            <td>Kurir</td>
                            <td>:</td>
                            <td id="kurir"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td id="status"></td>
                        </tr>
                    </table>
                    <div class="hs-body">
                        <ul id="manifest">
                        </ul>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
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
