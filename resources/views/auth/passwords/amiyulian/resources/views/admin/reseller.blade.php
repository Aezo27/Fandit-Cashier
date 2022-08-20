@extends('layouts.res_master')
@section('judul', 'Reseller List')
@section('reseller', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reseller List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Reseller List</li>
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
              <h3 class="card-title">Daftar Reseller</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-striped table-hover table-bordered projects" style="width:100%; min-width:800px !important">
                <thead>
                <tr>
                  <th style="width: 30px;">No</th>
                  <th>id</th>
                  <th>Nama Toko</th>
                  <th>Nama Pemilik</th>
                  <th>No. Hp.</th>
                  <th>Email</th>
                  <th>Bergabung</th>
                  <th style="width: 150px; text-align:center;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reseller as $num => $res )
                <tr>
                  <td style="text-align:center">{{$num+1}}</td>
                  <td>{{$res->id}}</td>
                  <td>{{$res->nama_toko}}</td>
                  <td>{{$res->nama}}</td>
                  <td>{{$res->no_hp}}</td>
                  <td>{{App\User::find($res->id)->email}}</td>
                  <td>{{$res->created_at->format('d-m-Y')}}</td>
                  <td class="project-actions text-right d-flex">
                      <a class="btn btn-primary btn-success btn-sm mr-2" href="{{route('reseller').'/'.$res->id}}"><i class="fa fa-folder"></i> Lihat</a>
                      <form id="delProd" action="{{route('reseller').'/'.$res->id.'/delete'}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm deleteProd" id="{{$res->id}}"><i class="fa fa-trash"></i> Delete</button>
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
