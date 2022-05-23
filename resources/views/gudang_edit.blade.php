@extends('layouts.dashboard')
@section('judul', 'Edit Barang')

@section('content')
  <main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{route('home')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Edit barang</a>
                </li>
              </ol>
            </nav>
            <h1 class="page-title"> Edit Barang ke Database </h1>
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <a href="{{route('gudang.show')}}"><button class="btn btn-danger btn-floated" type="button"><i class="fa fa-th-list"></i></button></a>
            <!-- .card -->
            <div id="base-style" class="card">
              <!-- .card-body -->
              <div class="card-body">
                <!-- .form -->
                <form method="POST" enctype="multipart/form-data" action="{{route('gudang.edit.update')}}">
                  @csrf
                  <!-- .fieldset -->
                  <fieldset>
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf1">Nama Barang</label> 
                      <input type="text" class="form-control" id="tf1" style="text-transform: capitalize" aria-describedby="tf1Help" name="nama_barang" value="{{ $barang->nama_barang }}" required placeholder="Masukan nama barang disini..."> 
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf1">Kode Barang</label> 
                      <input type="hidden" name="old_kode_barang" value="{{ $barang->kode_scan }}">
                      <input type="hidden" name="id" value="{{ $barang->id }}">
                      <input type="text" class="form-control" id="tf1" aria-describedby="tf1Help" name="kode_barang" value="{{ $barang->kode_scan }}" required placeholder="masukan kode barang disni..."> 
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf2">Stok</label>
                      <div class="custom-number">
                        <input type="number" class="form-control" id="tf2" min="0" step="1" value="{{$barang->stok}}" name="stok" placeholder="Stok saat ini">
                      </div>
                      <small id="tf1Help" class="form-text text-muted">Dapat ditambahkan kemudian.</small>
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf2">Harga Satuan</label>
                      <div class="input-group">
                        <label class="input-group-prepend" for="pi9">
                          <span class="badge">Rp</span>
                        </label>
                        <input type="text" class="form-control" required value="{{ $barang->harga_satuan }}" name="harga_satuan" id="pi9">
                      </div>
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf2">Harga Jual</label>
                      <div class="input-group">
                        <label class="input-group-prepend" for="pi9_2">
                          <span class="badge">Rp</span>
                        </label>
                        <input type="text" class="form-control" required value="{{ $barang->harga_jual }}" name="harga_jual" id="pi9_2">
                      </div>
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <!-- .control-label -->
                      <label class="control-label" for="select2-tagging">Tag</label> <!-- you can put options directly in data attribute -->
                      <select id="select2-tagging" class="form-control" name="tags[]" data-toggle="select2" data-options='{ "tags": [], "tokenSeparators": [","] }' multiple>
                        @foreach ($tags as $tag)
                        @if(in_array($tag->nama_tag, $old_tag))
                        <option selected>{{$tag->nama_tag}}</option>
                        @else
                        <option>{{$tag->nama_tag}}</option>
                        @endif           
                        @endforeach
                      </select>
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group" style="display: flex;flex-direction: column;">
                      <label for="tf3">Gambar Sebelumnya</label>
                      <img src="{{asset('storage').'/'.$barang->gambar}}" alt="" width="100px">
                    </div><!-- /.form-group -->
                    <!-- .form-group -->
                    <div class="form-group">
                      <label for="tf3">Gambar</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="tf3" accept="image/*" name="gambar"> <label class="custom-file-label" for="tf3">Pilih file</label>
                      </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="tf6">Catatan</label>
                      <textarea class="form-control" name="catatan" id="tf6" rows="3">{{ $barang->catatan }}</textarea>
                    </div><!-- /.form-group -->
                  </fieldset><!-- /.fieldset -->
                  <input type="submit" hidden />
                  <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </form><!-- /.form -->
              </div><!-- /.card-body -->
          </div><!-- /.page-section -->
          @include('layouts.footer')
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div><!-- /.wrapper -->
  </main>
@endsection