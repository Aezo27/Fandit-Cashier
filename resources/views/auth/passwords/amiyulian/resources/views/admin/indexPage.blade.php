@extends('layouts.res_master')
@section('judul', 'Index Page Shopping')
@section('open', 'menu-open')
@section('shopping', 'active')
@section('index', 'active')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Index Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Shopping Page</li>
              <li class="breadcrumb-item active">Index Page</li>
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
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Hero Slide
                        </h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link non active" href="#slide1" data-toggle="tab">Slide 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#slide2" data-toggle="tab">Slide 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#slide3" data-toggle="tab">Slide 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#slide4" data-toggle="tab">Slide 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#slide5" data-toggle="tab">Slide 5</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            @foreach ($home_slide as $slide)
                                @if ($loop->first)
                                <div class="chart tab-pane active" id="slide{{$slide->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/homeslide/'.$slide->id.'/add'}}" enctype="multipart/form-data" method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Barang<span>*</span></label>
                                            <input type="text" class="form-control" name="title" required value="{{$slide->title}}" placeholder="Nama Produk">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori<span>*</span></label>
                                            <select name="category" class="form-control" required>
                                                @if ($slide->category!=null)
                                                <option value="{{$slide->category}}">{{$slide->category}} -- (Pilihan Sebelumnya)</option>
                                                @endif
                                                @foreach ($category as $cate)
                                                <option value="{{$cate->judul}}">{{$cate->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan<span>*</span></label>
                                            <textarea type="text" class="form-control" name="isi" required placeholder="Keterangan Singkat">{{$slide->isi}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <input type="text" class="form-control" name="diskon" value="{{$slide->diskon}}" placeholder="Contoh: 50% atau 20RB">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Link<span>*</span></label>
                                            <input type="text" class="form-control" name="link" value="{{$slide->link}}" required placeholder="link menggunakan https:\\">
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="bg">
                                        </div>
                                        <div class="float-right">
                                            <a href="{{route('admin').'/pages/shopping/homeslide/'.$slide->id.'/delete'}}" class="btn btn-danger">Kosongkang</a>
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <div class="chart tab-pane" id="slide{{$slide->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/homeslide/'.$slide->id.'/add'}}" enctype="multipart/form-data"
                                        method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Barang<span>*</span></label>
                                            <input type="text" class="form-control" name="title" required value="{{$slide->title}}"
                                                placeholder="Nama Produk">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori<span>*</span></label>
                                            <select name="category" class="form-control" required>
                                                @if ($slide->category!=null)
                                                <option value="{{$slide->category}}">{{$slide->category}} -- (Pilihan Sebelumnya)</option>
                                                @endif
                                                @foreach ($category as $cate)
                                                <option value="{{$cate->judul}}">{{$cate->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan<span>*</span></label>
                                            <textarea type="text" class="form-control" name="isi" required placeholder="Keterangan Singkat">{{$slide->isi}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Diskon</label>
                                            <input type="text" class="form-control" name="diskon" value="{{$slide->diskon}}" placeholder="Contoh: 50% atau 20RB">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Link<span>*</span></label>
                                            <input type="text" class="form-control" name="link" value="{{$slide->link}}" required
                                                placeholder="link menggunakan https:\\">
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="bg">
                                        </div>
                                        <div class="float-right">
                                            <a href="{{route('admin').'/pages/shopping/homeslide/'.$slide->id.'/delete'}}"
                                                class="btn btn-danger">Kosongkang</a>
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endforeach

                        </div>
                    </div><!-- /.card-body -->
                </div>
                <div class="card card-navy">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Banner Kategori
                        </h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link non active" href="#kate1" data-toggle="tab">Kate 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#kate2" data-toggle="tab">Kate 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#kate3" data-toggle="tab">Kate 3</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            @foreach ($banca as $bc)
                                @if ($loop->first)
                                <div class="chart tab-pane active" id="kate{{$bc->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/bancat/'.$bc->id.'/add'}}" enctype="multipart/form-data"
                                        method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kategori">Judul<span>*</span></label>
                                            <select name="judul" class="form-control" required>
                                                <option value="{{$bc->judul}}">{{$bc->judul}} -- (Pilihan Sebelumnya)</option>
                                                @foreach ($category as $cate)
                                                <option value="{{$cate->judul}}">{{$cate->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="bg">
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <div class="chart tab-pane" id="kate{{$bc->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/bancat/'.$bc->id.'/add'}}" enctype="multipart/form-data" method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kategori">Judul<span>*</span></label>
                                            <select name="judul" class="form-control" required>
                                                <option value="{{$bc->judul}}">{{$bc->judul}} -- (Pilihan Sebelumnya)</option>
                                                @foreach ($category as $cate)
                                                <option value="{{$cate->judul}}">{{$cate->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="bg">
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endforeach

                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-success">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Diskon
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" style="position: relative;">
                                <form action="{{route('admin').'/pages/shopping/diswid/'.$dis_wid->id.'/add'}}" enctype="multipart/form-data"
                                    method="POST" role="form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Judul<span>*</span></label>
                                        <input type="text" class="form-control" name="judul" required value="{{$dis_wid->judul}}" placeholder="Nama Produk">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk<span>*</span></label>
                                        <input type="text" class="form-control" name="nama_barang" required value="{{$dis_wid->nama_barang}}" placeholder="Nama Produk">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Singkat<span>*</span></label>
                                        <textarea type="text" class="form-control" name="isi" required placeholder="Nama Produk">{{$dis_wid->isi}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga<span>*</span></label>
                                        <input type="number" class="form-control" name="harga" required value="{{$dis_wid->harga}}" placeholder="Nama Produk">
                                    </div>
                                    <div class="form-group">
                                        <label>ID Produk<span>*(sebagai link)</span></label>
                                        <input type="text" class="form-control" name="link" required value="{{$dis_wid->link}}" placeholder="Nama Produk">
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Selesai<span>*</span></label>
                                        <input type="text" class="form-control float-right" id="reservation" name="waktu_selesai" value="{{$dis_wid->waktu_selesai}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Barang<span>*(kosongkan bila tidak diganti)</span></label>
                                        <input type="file" class="form-control" name="bg">
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" type="button" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
                <div class="card card-danger">
                    <div class="card-header d-flex p-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title p-3">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Partner
                        </h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link non active" href="#partner1" data-toggle="tab"># 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#partner2" data-toggle="tab"># 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#partner3" data-toggle="tab"># 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#partner4" data-toggle="tab"># 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link non" href="#partner5" data-toggle="tab"># 5</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            @foreach ($partner as $pr)
                                @if ($loop->first)
                                <div class="chart tab-pane active" id="partner{{$pr->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/partner/'.$pr->id.'/add'}}" enctype="multipart/form-data"
                                        method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kategori">Nama<span>*(kosongkan untuk menyembunyikan)</span></label>
                                            <input type="text" class="form-control" value="{{$pr->nama}}" name="nama" placeholder="Nama Partner">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Link<span>*</span></label>
                                            <input type="text" class="form-control" value="{{$pr->link}}" name="link" placeholder="Menggunakan http://">
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <div class="chart tab-pane" id="partner{{$pr->id}}" style="position: relative;">
                                    <form action="{{route('admin').'/pages/shopping/partner/'.$pr->id.'/add'}}" enctype="multipart/form-data" method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="kategori">Nama<span>*(kosongkan untuk menyembunyikan)</span></label>
                                            <input type="text" class="form-control" value="{{$pr->nama}}" name="nama" placeholder="Nama Partner">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Link<span>*</span></label>
                                            <input type="text" class="form-control" value="{{$pr->link}}" name="link" placeholder="Menggunakan http://">
                                        </div>
                                        <div class="form-group">
                                            <label>Background<span>*(kosongkan bila tidak diganti)</span></label>
                                            <input type="file" class="form-control" name="logo">
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" type="button" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endforeach

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
