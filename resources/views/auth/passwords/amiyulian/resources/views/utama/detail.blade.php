@extends('layouts.utama_master')
{{-- @section('product', 'active') --}}
@section('judul', $product->nama_barang)

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{route('product')}}">Etalase</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset('product-pic/'.$product->id.'/'.$product->gambar_utama)}}" alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{asset('product-pic/'.$product->id.'/'.$product->gambar_utama)}}">
                                        <img src="{{asset('product-pic/'.$product->id.'/'.$product->gambar_utama)}}" alt="">
                                    </div>
                                    @if ($product->gambar2!=null)
                                        <div class="pt" data-imgbigurl="{{asset('product-pic/'.$product->id.'/'.$product->gambar2)}}">
                                            <img src="{{asset('product-pic/'.$product->id.'/'.$product->gambar2)}}" alt="">
                                        </div>
                                    @endif
                                    @if ($product->gambar3!=null)
                                        <div class="pt" data-imgbigurl="{{asset('product-pic/'.$product->id.'/'.$product->gambar3)}}">
                                            <img src="{{asset('product-pic/'.$product->id.'/'.$product->gambar3)}}" alt="">
                                        </div>
                                    @endif
                                    @if ($product->gambar4!=null)
                                        <div class="pt" data-imgbigurl="{{asset('product-pic/'.$product->id.'/'.$product->gambar4)}}">
                                            <img src="{{asset('product-pic/'.$product->id.'/'.$product->gambar4)}}" alt="">
                                        </div>
                                    @endif
                                    {{-- @if ($product->gambar5!=null)
                                        <div class="pt" data-imgbigurl="{{asset('product_pic/'.$product->gambar5)}}">
                                            <img src="{{asset('product_pic/'.$product->gambar5)}}" alt="">
                                        </div>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>{{$product->nama_barang}}</h3>
                                    @php
                                    $fav = json_decode(request()->cookie('my-fav'), true);
                                    @endphp
                                    @if (isset($fav[$product->id]))
                                        <form class="add_fav" action="{{ route('fav') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="prod_id" value="{{ $product->id }}" class="form-control">
                                            <div class="icon fav idfav{{ $product->id }}">
                                                <a id="{{ $product->id }}" class="del_fav" href="{{route('fav').'/'.$product->id.'/delete'}}"><i class="icon_heart active" id="user_data2" title="Favorit"></i></a>
                                            </div>
                                        </form>
                                    @else
                                        <form class="add_fav" action="{{ route('fav') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="prod_id" value="{{ $product->id }}" class="form-control">
                                            <div class="icon fav idfav{{ $product->id }}">
                                                <button><i class="icon_heart_alt" title="Favorit"></i></button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                {{-- <div class="pd-rating">
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" checked /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    <span>(5)</span>
                                </div> --}}
                                <div class="pd-desc">
                                    <p>{{$product->ket1}}</p>
                                    @if ($product->harga_diskon!=0)
                                    <h4>@currency($product->harga_diskon)<span>@currency($product->harga)</span></h4>
                                    @else
                                    <h4>@currency($product->harga)</h4>
                                    @endif
                                </div>
                                <div class="pd-color">
                                    <h6>Pilihan Warna:</h6>
                                    <div class="pd-color-choose">
                                        @foreach ($product->colors as $warna)
                                                <div class="cc-item">
                                                    <label style="background: {{$warna->kode}}" for="{{$warna->nama}}"></label>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-color">
                                    <h6 style="margin-top: 8px">Pilihan Ukuran:</h6>
                                    <div class="pd-size-choose">
                                        <div class="fw-tags" style="display: inline-block;">
                                            @if ($product->sizes->s == 1)
                                                    <label class="filter-box" href="{{route('size')}}?size=s">S</label>
                                            @endif
                                            @if ($product->sizes->m == 1)
                                                    <label class="filter-box" href="{{route('size')}}?size=m">M</label>

                                            @endif
                                            @if ($product->sizes->l == 1)
                                                    <label class="filter-box" href="{{route('size')}}?size=l">L</label>

                                            @endif
                                            @if ($product->sizes->xl == 1)
                                                    <label class="filter-box" href="{{route('size')}}?size=xl">XL</label>
                                            @endif
                                            @if ($product->sizes->xxl == 1)
                                                    <label class="filter-box" href="{{route('size')}}?size=xxl">XXL</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="quantity">
                                    @if ($product->stok > 0)
                                    <form class="add_cart" action="{{ route('add_cart') }}" method="POST">
                                        @csrf
                                        <div class="pro-qty">
                                            <span class="dec qtybtn">-</span>
                                            <input type="text" name="qty" value="1">
                                            <span class="inc qtybtn">+</span>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="stock" value="{{$product->stok}}">
                                        <button class="primary-btn pd-cart">Tambah</button>
                                    </form>
                                    @else
                                        <span class="primary-btn pd-cart">Stok Habis</span>
                                    @endif
                                </div>
                                <ul class="pd-tags">
                                    <li>
                                        <span>Kategori</span>: <a href="{{route('category').'?cate='.$sing_cat->id}}"> {{ $sing_cat->judul }}</a>
                                    </li>
                                    <li>
                                        <span>TAG</span>:
                                        @foreach($product->tags as $pro)
                                            <a href="{{route('tag').'?tag='.urlencode($pro->judul)}}"> {{ $pro->judul }}</a>@if(!$loop->last), @endif
                                        @endforeach
                                    </li>
                                </ul>
                                <div class="pd-share">
                                    <div class="pd-social">Share:&nbsp;&nbsp;
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_email"></a>
                                            <a class="a2a_button_print"></a>
                                        </div>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </div>
                                </div>
                                <div class="marketplace">
                                    @if ($product->link!=null)
                                    <a href="{{$product->link}}" class="primary-btn">Link Shopee</a>
                                    @endif
                                </div>
                                <div class="product-tab">
                                    <div class="tab-item">
                                        <ul class="nav" role="tablist">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESKRIPSI</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#tab-2" role="tab">KETERANGAN</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-item-content">
                                        <div class="tab-content">
                                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                                <div class="product-content">
                                                    <div class="row">
                                                        <div class="col-lg">
                                                            <h5>Ringkasan</h5>
                                                            <p>{{$product->ket2}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                                <div class="specification-table">
                                                    <table>
                                                        {{-- <tr>
                                                            <td class="p-catagory">Nilai</td>
                                                            <td>
                                                                <div class="pd-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </td>
                                                        </tr> --}}
                                                        <tr>
                                                            <td class="p-catagory">Harga</td>
                                                            <td>
                                                                @if ($product->harga_diskon!=0)
                                                                <div class="p-price">@currency($product->harga_diskon)</div>
                                                                @else
                                                                <div class="p-price">@currency($product->harga)</div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-catagory">Stok</td>
                                                            <td>
                                                                <div class="p-stock">{{$product->stok}}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-catagory">Kode</td>
                                                            <td>
                                                                <div class="p-code">#{{$product->id}}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    @include('utama.similar')
@endsection

