@extends('layouts.dashboard')
@section('judul', 'Laporan Penjualan')

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
                  <a href="{{ route('home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Laporan Penjualan</a>
                </li>
              </ol>
            </nav><!-- /.breadcrumb -->
            <!-- floating action -->
            <a href="{{ route('gudang.input') }}"><button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button></a> <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Laporan Penjualan </h1><!-- .btn-toolbar -->
              <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-body -->
              <div class="card-body">
                <!-- .table -->
                <table id="laporan" class="table datatables">
                  <!-- thead -->
                  <thead>
                    <tr>
                      <th>No</th>
                      <th> Nama Barang </th>
                      <th> Harga Jual </th>
                      <th> Jumlah </th>
                      <th> Total Harga </th>
                      <th> Kasir </th>
                      <th> Tanggal </th>
                    </tr>
                  </thead><!-- /thead -->
                  <!-- tbody -->
                  <tbody>
                    <!-- create empty row to passing html validator -->
                    @foreach ($laps as $lp)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $lp->nama_barang }}</td>
                        <td>{{ $lp->harga_jual }}</td>
                        <td>{{ $lp->jumlah }}</td>
                        <td>{{ $lp->total_harga }}</td>
                        <td>{{ $lp->nama_kasir }}</td>
                        <td>{{ $lp->created_at->isoFormat('D MMMM Y') }}</td>
                      </tr>
                    @endforeach
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
@push('custom-js')
  <script>
    $(document).ready(function() {
      $('#laporan').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'csv', 'print'
        ]
      });
    });
  </script>
@endpush
