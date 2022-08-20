@extends('layouts.res_master')
@section('judul', 'Contact')
@section('contact', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <div class="card card-warning">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Edit Contact
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" style="position: relative;">
                                <form action="{{route('updateContact')}}" method="POST" role="form">
                                    @csrf
                                    @foreach ($contacts as $contact)
                                    <div class="form-group">
                                        @if ($loop->iteration == 7 || $loop->iteration == 8 )
                                            <label style="text-transform: capitalize">{{$contact->nama}}<span>*</span></label>
                                            <textarea type="text" class="form-control" name="contact[]" required placeholder="menggunakan http:// jika berupa link">{{$contact->isi}}</textarea>
                                        @else
                                            <label style="text-transform: capitalize">{{$contact->nama}}<span>*</span></label>
                                            <input type="text" class="form-control" name="contact[]" required value="{{$contact->isi}}" placeholder="menggunakan http:// jika berupa link">
                                        @endif
                                    </div>
                                    @endforeach
                                    <div class="float-right">
                                        <button type="submit" type="button" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
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
