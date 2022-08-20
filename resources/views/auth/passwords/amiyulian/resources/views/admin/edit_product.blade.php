@extends('layouts.res_master')
@section('judul', 'Edit Product')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('productList')}}">Product List</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
          <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Masukan Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body" style="display: block;">
                <form role="" method="POST"  enctype="multipart/form-data" action="{{route('productList').'/'.$product->id.'/edit'}}">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Barang<span>*</span></label>
                        <input style="text-transform:capitalize" type="text" class="form-control" id="nama" name='nama_barang' placeholder="Masukan Nama Yang Panjang Dan Bagus" value="{{$product->nama_barang}}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Satuan<span>*</span></label>
                        <input type="number" min="0" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Satuan Tanpa Rp" value="{{$product->harga}}" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_diskon">Harga Diskon</label>
                        <input type="number" min="0" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="Masukan Harga Diskon (Kosong=0)" value="{{$product->harga_diskon}}">
                    </div>
                    <div class="form-group">
                        <label for="berat_barang">Berat</label>
                        <input type="number" min="1000" class="form-control" id="berat_barang" name="berat" placeholder="Masukan Berat (Gram) (Kosong=1000)" value="{{$product->berat}}">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Barang<span>*</span></label>
                        <input type="number" min="0" class="form-control" id="stok" name="stok" placeholder="Masukan Jumlah Stok Barang" value="{{$product->stok}}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan1">Keterangan Pendek<span>*</span></label>
                        <textarea class="form-control" id="keterangan1" name="ket1" placeholder="Masukan Detail Keterangan Pendek" required>{{$product->ket1}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterangan2">Keterangan Panjang<span>*</span></label>
                        <textarea class="form-control" id="keterangan2" name="ket2" placeholder="Masukan Detail Keterangan Panjang" required>{{$product->ket2}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Link Shopee</label>
                        <input type="text" class="form-control" id="link" name='link' placeholder="Menggunakan http://" value="{{$product->link}}">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori<span>*</span></label>
                        <select name="category_id" id="kategori" class="form-control">
                            <option value="{{$product->category_id}}">-- {{App\Category::where('id', $product->category_id)->get()->first()->judul}} -- (Pilihan Sebelumnya)</option>
                            @foreach ($category as $cate)
                                <option value="{{$cate->id}}">{{$cate->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Tag<span>*</span></label>
                        <div class="input-group">
                            <input type="text"class="form-control m-input" id="addTag" placeholder="Tambahkan Tag, Klik Tag Untuk Menghapus">
                            <div class="input-group-append">
                                <button id="add" type="button" class="btn btn-new">Tambah</button>
                            </div>
                        </div>
                        <div class="mt-2" id="tag">
                            @foreach ($product->tags as $tag)
                                @if ($product->tags != null)
                                    <span style="cursor:pointer; margin: 0 2px 3px 2px; text-transform: capitalize;" id="oldTag" class="btn btn-success">{{$tag->judul}}</span>
                                    <input tag="{{str_replace(' ', '_', $tag->judul)}}" type="hidden" value="{{$tag->judul}}" name="tag[]">
                                @endif

                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Warna<span>*</span></label>
                        <ul id="limheight">
                            @foreach ($color as $clr)
                                @if ($clr->nama!="Putih")
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="warna[]" value="{{$clr->id}}" id="{{$clr->id}}">
                                        <label for="{{$clr->id}}" style="color: {{$clr->kode}}" class="custom-control-label">{{$clr->nama}}</label>
                                    </div>
                                </li>
                                @else
                                <li>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="warna[]" value="{{$clr->id}}" id="{{$clr->id}}">
                                        <label for="{{$clr->id}}" style="color: {{$clr->kode}}; background: #000"
                                            class="custom-control-label">{{$clr->nama}}</label>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Ukuran<span>*</span></label>
                                                <ul id="limheight">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="s" value=1 id="s">
                                    <label for="s" class="custom-control-label">S</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="m" value="1" id="m">
                                    <label for="m" class="custom-control-label">M</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="l" value="1" id="l">
                                    <label for="l" class="custom-control-label">L</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="xl" value="1" id="xl">
                                    <label for="xl" class="custom-control-label">XL</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="xxl" value="1" id="xxl">
                                    <label for="xxl" class="custom-control-label">XXL</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <label for="exampleInputFile">Gambar Utama<span>*</span></label>
                                @if ($product->gambar_utama != null)
                                    <div class="file_button_container"
                                        style="background: url({{asset('product-pic/'.$product->id.'/'.$product->gambar_utama)}}) left top no-repeat; background-size: 150px;">
                                        <input type="file" id="file1" name="gambar_utama" accept="image/*">
                                    </div>
                                @else
                                    <div class="file_button_container"
                                        style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                        <input type="file" id="file1" name="gambar_utama" accept="image/*">
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <label for="exampleInputFile">Gambar 1<span>*</span></label>
                                @if ($product->gambar2 != null)
                                <div class="file_button_container"
                                    style="background: url({{asset('product-pic/'.$product->id.'/'.$product->gambar2)}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file2" name="gambar1" accept="image/*">
                                </div>
                                @else
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file2" name="gambar1" accept="image/*">
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <label for="exampleInputFile">Gambar 2<span>*</span></label>
                                @if ($product->gambar3 != null)
                                <div class="file_button_container"
                                    style="background: url({{asset('product-pic/'.$product->id.'/'.$product->gambar3)}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file3" name="gambar2" accept="image/*">
                                </div>
                                @else
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file3" name="gambar2" accept="image/*">
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-3 md-4">
                                <label for="exampleInputFile">Gambar 3<span>*</span></label>
                                @if ($product->gambar4 != null)
                                <div class="file_button_container"
                                    style="background: url({{asset('product-pic/'.$product->id.'/'.$product->gambar4)}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="gambar3" accept="image/*">
                                </div>
                                @else
                                <div class="file_button_container"
                                    style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file1" name="gambar3" accept="image/*">
                                </div>
                                @endif
                            </div>
                            {{-- <div class="col-lg-2 md-4 col-md-4">
                                <label for="exampleInputFile">Gambar 4</label>
                                <div class="file_button_container" style="background: url({{asset('storage/file_upload.png')}}) left top no-repeat; background-size: 150px;">
                                    <input type="file" id="file5" accept="image/*">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                    <!-- /.card-body -->

                    <div class="card-footer bg-white">
                    <button type="submit" class="btn btn-new float-right">Save</button>
                    </div>
                </form>
              </div>
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
