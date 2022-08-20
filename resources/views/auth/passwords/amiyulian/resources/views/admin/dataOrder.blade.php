@extends('layouts.res_master')
@section('judul', 'On Process Orders')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rincian Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Order - #{{$order->id}}</li>
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
                <div class="card card-black">
                    <div class="card-header">
                        <div class="user-block">
                            <span class="username">Rincian Order</span>
                            <span class="description">{{$order->created_at->format('d-m-Y h:m:s')}}</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="or-id">
                            <tr>
                                <td>Order Id</td>
                                <td>:</td>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td style="text-transform: capitalize;">
                                @if ($order->status == "finish")
                                    <span class="badge bg-success">{{$order->status}}</span>
                                @elseif ($order->status == "diproses")
                                    <span class="badge bg-warning">{{$order->status}}</span>
                                @else
                                    <span class="badge bg-danger">{{$order->status}}</span>
                                @endif
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>No Resi</td>
                                <td>:</td>
                                <td>{{$order->no_resi}}</td>
                            </tr>
                            <tr>
                                <td>Nama Pemerima</td>
                                <td>:</td>
                                <td>{{$order->nama_penerima}}</td>
                            </tr>
                            <tr>
                                <td>Nama Pengirim</td>
                                <td>:</td>
                                <td>{{$order->nama_pengirim}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$order->alamat_lengkap}}, {{$order->kecamatan}}, {{$order->kabupaten}}, {{$order->provinsi}} -
                                    {{$order->kode_pos}}</td>
                            </tr>
                            <tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <td>No. HP.</td>
                                <td>:</td>
                                <td>{{$order->no_hp}}</td>
                            </tr>
                            <tr>
                                <td>{{$order->kurir}}</td>
                                <td>:</td>
                                <td>@currency($order->ongkir)</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>:</td>
                                <td>@currency(-$order->diskon)</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>@currency($order->total)</td>
                            </tr>
                            <tr>
                                <td>Bukti TF</td>
                                <td>:</td>
                                @if ($order->bukti_tf!=null)
                                    <td><a class="btn btn-primary btn-sm" href="{{ asset('bukti_transfer').'/'.$order->bukti_tf }}" target="_blank">Lihat</a></td>
                                @else
                                     <td>--</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    @if ($order->status != "finish")
                        <div class="card-footer">
                            <form action="{{route('admin')}}/resi/{{$order->id}}" method="post">
                                @csrf
                                <div class="btn-push">
                                    <input type="text" class="form-control form-control-sm" name="no_resi" placeholder="Tambahkan Resi Kurir"
                                        required>
                                    <button class="btn btn-primary resi">Tambah</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <!-- /.card-footer -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-gray-dark">
                    <div class="card-header">
                        <div class="user-block">
                            <span class="username">Daftar Pesanan</span>
                            <span class="description">#{{$order->id}}</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover mid">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $pro)
                                <tr>
                                    <td><img src="{{asset('product-pic/'.$pro->id.'/'.$pro->gambar_utama)}}" alt="{{ $pro->nama_barang }}"></td>
                                    <td>{{ $pro->nama_barang }}</td>
                                    @if ($pro->harga_diskon!=0)
                                    <td>@currency($pro->harga_diskon)</td>
                                    <td>{{ $pro->pivot->jumlah }}</td>
                                    <td>@currency($pro->harga_diskon*$pro->pivot->jumlah)</td>
                                    @else
                                    <td>@currency($pro->harga)</td>
                                    <td>{{ $pro->pivot->jumlah }}</td>
                                    <td>@currency($pro->harga*$pro->pivot->jumlah)</td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="addPesan">
                        <b>Pesan Tambahan:</b>
                        <p>{{$order->pesan_tambahan}}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            @if ($order->status!="finish")
                        <form action="{{route('product').'/payment'.'/'.$order->id.'/finish'}}" method="post">
                            @csrf
                                <button type="submit" id="ripple" class="btn btn-success">SELESAIKAN ORDER</button>
                        </form>
                        <form id="delOrd" action="{{route('admin').'/cancelorder'.'/'.$order->id}}" method="post">
                            @csrf
                            <button class="btn btn-danger ml-2" id="{{$order->id}}"><i class="fa fa-trash"></i> BATALKAN ORDER</button>
                        </form>
                        @endif
                        </div>
                    </div>
                    <!-- /.card-footer -->
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
