@extends('layouts.dashboard')
@section('judul', 'Daftar Barang')
@section('delete', route('gudang.delete'))
@section('restore', route('gudang.restore'))

@section('content')
  <!-- .app-main -->
  <main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{route('home')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Daftar Barang</a>
                </li>
              </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <a href="{{route('gudang.input')}}"><button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button></a> <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Daftar Barang dalam Gudang </h1><!-- .btn-toolbar -->
              <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header">
                <!-- .nav-tabs -->
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active show tab-link"  data-id="all" data-toggle="tab" href="#tab1">All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab-link" data-value="1" data-toggle="tab" href="#tab2">Ready</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link tab-link" data-value="0" data-toggle="tab" href="#tab3">Kosong</a>
                  </li>
                  @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                      <a class="nav-link tab-link" data-value="arsip" data-toggle="tab" href="#tab3">Arsip</a>
                    </li>
                  @endif
                </ul><!-- /.nav-tabs -->
              </div><!-- /.card-header -->
              <!-- .card-body -->
              <div class="card-body">
                <!-- .form-group -->
                <div class="form-group">
                  <!-- .input-group -->
                  <div class="input-group input-group-alt">
                    <!-- .input-group-prepend -->
                    <div class="input-group-prepend">
                      <select id="filterBy" name="filter" class="custom-select">
                        <option value='' selected> Filter By </option>
                        <option value="nama_barang"> Nama Barang </option>
                        <option value="kode_scan"> Kode </option>
                        <option value="harga_jual"> Harga Jual </option>
                        <option value="harga_satuan"> Harga Satuan </option>
                      </select>
                    </div><!-- /.input-group-prepend -->
                    <!-- .input-group -->
                    <div class="input-group has-clearable">
                      <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                      <div class="input-group-prepend">
                        <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                      </div><input id="table-search" type="text" class="form-control" placeholder="Search products">
                    </div><!-- /.input-group -->
                  </div><!-- /.input-group -->
                </div><!-- /.form-group -->
                <!-- .table -->
                <table id="myTable" class="table">
                  <!-- thead -->
                  <thead>
                    <tr>
                      {{-- <th colspan="2" style="min-width: 320px;">
                        <div class="thead-dd dropdown">
                          <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle"> <label class="custom-control-label" for="check-handle"></label></span>
                          <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-caret-down"></span>
                          </div>
                          <div class="dropdown-menu">
                            <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                          </div>
                        </div>
                      </th> --}}
                      <th></th>
                      <th> Nama Barang </th>
                      <th> Kode Barang </th>
                      <th> Harga Satuan </th>
                      <th> Harga Jual </th>
                      <th> Stok </th>
                      <th style="width:150px; min-width:100px;"> Action </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- create empty row to passing html validator -->
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody><!-- /tbody -->
                </table><!-- /.table -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div>
    @include('layouts.footer')
    <!-- /.wrapper -->
  </main><!-- /.app-main -->
@endsection