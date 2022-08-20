@extends('layouts.res_master')
@section('judul', 'Laporan Penjualan')
@section('cetak_laporan', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Pejulan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Laporan Pejualan</li>
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
              <h3 class="card-title">Data laporan penjualan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{route('expor_excel')}}" method="post">
                @csrf
              <div class="row justify-content-center mb-3 date-wrapper">
                  <div class="col-md-4">
                      <input type="text" name="from_date" id="from_date" class="form-control datetimepicker" placeholder="From Date" readonly/>
                  </div>
                  <div class="col-md-4">
                      <input type="text" name="to_date" id="to_date" class="form-control datetimepicker" placeholder="To Date" readonly/>
                  </div>
                  <div class="col-md-2">
                      <button type="button" name="filter" id="filter" class="btn btn-new">Filter</button>
                      <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                      <button type="submit" name="download" id="download" class="btn btn-success">Download</button>
                  </div>
                </div>
              </form>
              <table id="order_table" class="table table-striped table-bordered table-hover projects">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>ID Order</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th style="width: 80px;">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td style="text-align:center"></td>
                  <td style="text-align:center"></td>
                  <td>
                    {{-- @foreach($orde->products as $products)
                    <span> {{ $products->nama_barang }} x {{ $products->pivot->jumlah }}@if(!$loop->last), @endif </span>
                    @endforeach --}}
                  </td>
                  {{-- <td>@currency($orde->total)</td> --}}
                  <td></td>
                  <td></td>
                </tr>
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
@push('custom-scripts')
<script>
$(document).ready(function(){
 $('.datetimepicker').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });
 
 load_data();
 
 function load_data(from_date = '', to_date = '')
 {
  console.log('datatable rendered');
  let table = $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("cetak_laporan") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
      data: 'id',
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    {
     data:'created_at',
     name:'created_at'
    },
    {
     data:'order_id',
     name:'order_id'
    },
    {
     data:'barang',
     name:'barang'
    },
    {
     data:'jumlah',
     name:'jumlah'
    },
    {
     data:'total',
     name:'total'
    }
   ]
  });
 }
 
 $('#filter').click(function(){
  let from_date = $('#from_date').val();
  let to_date = $('#to_date').val();
  let check = new Date(from_date) > new Date(to_date);
  if (check) {
    alert('Invalid date range');
    $('#from_date').val('');
    $('#to_date').val('');
    return false;
  }
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });
 
 $('#refresh').on('click', function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });
 
});
</script>
@endpush
