@extends('layouts.res_master')
@section('judul', 'Finish Orders')
@section('finish', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Finish Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Finish Orders</li>
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
              <h3 class="card-title">Daftar Data Order Yang Telah Selesai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover projects" style="min-width:1800px">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>ID Order</th>
                  <th>Nama Penerima</th>
                  <th>Nama Pengirim</th>
                  <th>No Resi</th>
                  <th>Barang</th>
                  <th>Ongkir</th>
                  <th style="width: 80px;">Total</th>
                  <th>Kurir</th>
                  <th>Tujuan</th>
                  <th>TF</th>
                  <th style="width: 60px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders2 as $num => $orde )
                <tr>
                  <td style="text-align:center">{{$num+1}}</td>
                  <td style="text-align:center">{{$orde->created_at->format('d-m-Y')}}</td>
                  <td>{{$orde->id}}</td>
                  <td>{{$orde->nama_penerima}}</td>
                  <td>{{$orde->nama_pengirim}}</td>
                  <td>{{$orde->no_resi}}</td>
                  <td>
                    @foreach($orde->products as $products)
                    <span> {{ $products->nama_barang }} x {{ $products->pivot->jumlah }}@if(!$loop->last), @endif </span>
                    @endforeach
                  </td>
                  <td>@currency($orde->ongkir)</td>
                  <td>@currency($orde->total)</td>
                  <td>{{$orde->kurir}}</td>
                  <td>{{$orde->alamat_lengkap}}, {{$orde->kecamatan}}, {{$orde->kabupaten}}, {{$orde->provinsi}} - {{$orde->kode_pos}}</td>
                 <td style="text-align:center">
                  @if ($orde->bukti_tf != null)
                    <a class="btn btn-primary" href="{{ asset('bukti_transfer').'/'.$orde->bukti_tf }}" target="_blank">Lihat</a>
                  @else
                  --
                  @endif
                  </td>
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="{{route('admin').'/order'.'/'.$orde->id}}"><i class="fa fa-folder"></i> Data</a>
                      <form id="delOrd" action="{{route('admin').'/hapusorder'.'/'.$orde->id}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm delete" id="{{$orde->id}}"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
