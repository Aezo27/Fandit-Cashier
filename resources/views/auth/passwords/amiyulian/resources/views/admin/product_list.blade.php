@extends('layouts.res_master')
@section('judul', 'Product List')
@section('product_list', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
              <h3 class="card-title">Daftar Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-striped table-hover table-bordered projects" style="width:100%; min-width:800px !important">
                <thead>
                <tr>
                  <th style="width: 30px;">No</th>
                  <th>Gambar</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Views</th>
                  <th style="width: 200px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($product as $num => $prod )
                <tr>
                  <td style="text-align:center">{{$num+1}}</td>
                  <td><img src="{{asset('product-pic/'.$prod->id.'/'.$prod->gambar_utama)}}" alt="{{ $prod->nama_barang }}"></td>
                  <td>{{$prod->nama_barang}}</td>
                  @if ($prod->harga_diskon != 0)
                  <td>@currency($prod->harga_diskon)</td>
                  @else
                  <td>@currency($prod->harga)</td>
                  @endif
                  <td>{{$prod->stok}}</td>
                  <td>{{$prod->views}}</td>
                  <td class="project-actions text-right d-flex">
                      <a class="btn btn-primary btn-success btn-sm mr-2" href="{{route('product').'/'.$prod->id}}"><i class="fa fa-folder"></i> Lihat</a>
                      <a class="btn btn-primary btn-sm mr-2" href="{{route('admin').'/product/'.$prod->id}}"><i class="fa fa-edit"></i> Edit</a>
                      <form id="delProd" action="{{route('productList').'/'.$prod->id.'/delete'}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm deleteProd" id="{{$prod->id}}"><i class="fa fa-trash"></i> Delete</button>
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
