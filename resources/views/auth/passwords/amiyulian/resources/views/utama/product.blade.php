@extends('layouts.utama_master')
@section('etalase', 'active')
@section('judul', 'Product')

@section('konten')

@php
    $category = App\Category::all();
    $tags = App\Tag::select('judul')->distinct()->get();
    $colors = App\Color::all();
@endphp
<!-- Product Shop Mobile Section Begin -->
    <div class="collapse navbar-collapse sidenav" id="slide-filter-collapse">
        <span class="tutup close"><i class="fa fa-times"></i></span>
        <div class="produts-sidebar-filter" id="sidenav_target">
        </div>
    </div>
<!-- Product Shop Mobile Section Begin -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Etalase</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter mini">
                    <div class="filter-widget">
                        <h4 class="fw-title side">Kategori</h4>
                        <ul class="filter-catagories">
                            @if (isset($category))
                                @foreach ($category as $cate)
                                    @if ($cate->id == app('request')->input('cate'))
                                        <li><a class="active" href="{{route('category').'?cate='.$cate->id}}">{{$cate->judul}}</a></li>
                                    @else
                                        <li><a href="{{route('category').'?cate='.$cate->id}}">{{$cate->judul}}</a></li>
                                    @endif
                                @endforeach
                            @endif
                            <div class="fw-tags">
                        </div>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title side">Warna</h4>
                        <div class="fw-color-choose row">
                            @foreach ($colors as $warna)
                                @if ($warna->nama == app('request')->input('color'))
                                <div class="cc-item col-6">
                                    <a href="{{route('colors').'?color='.$warna->nama}}">
                                        <label class="bulet" style="background: {{$warna->kode}}" for="{{$warna->nama}}"></label>
                                        <span class="active">{{$warna->nama}}</span>
                                    </a>
                                </div>
                                @else
                                <div class="cc-item col-6">
                                    <a href="{{route('colors').'?color='.$warna->nama}}">
                                        <label class="bulet" style="background: {{$warna->kode}}" for="{{$warna->nama}}"></label>
                                        <span>{{$warna->nama}}</span>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title side">Ukuran</h4>
                        <div class="fw-tags">
                            @if (app('request')->input('size') == 's')
                                <a class="filter-box active" href="{{route('size')}}?size=s">S</a>
                            @else
                                <a class="filter-box" href="{{route('size')}}?size=s">S</a>
                            @endif
                            @if (app('request')->input('size') == 'm')
                                <a class="filter-box active" href="{{route('size')}}?size=m">M</a>
                            @else
                                <a class="filter-box" href="{{route('size')}}?size=m">M</a>
                            @endif
                            @if (app('request')->input('size') == 'l')
                                <a class="filter-box active" href="{{route('size')}}?size=l">L</a>
                            @else
                                <a class="filter-box" href="{{route('size')}}?size=l">L</a>
                            @endif
                            @if (app('request')->input('size') == 'xl')
                                <a class="filter-box active" href="{{route('size')}}?size=xl">XL</a>
                            @else
                                <a class="filter-box" href="{{route('size')}}?size=xl">XL</a>
                            @endif
                            @if (app('request')->input('size') == 'xxl')
                                <a class="filter-box active" href="{{route('size')}}?size=xxl">XXL</a>
                            @else
                                <a class="filter-box" href="{{route('size')}}?size=xxl">XXL</a>
                            @endif
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title side">Tag</h4>
                        <div class="fw-tags">
                            @foreach ($tags as $tag)
                                @if ($tag->judul == app('request')->input('tag'))
                                    <a class="filter-box active" href="{{route('tag').'?tag='.urlencode($tag->judul)}}">{{$tag->judul}}</a>
                                @else
                                    <a class="filter-box" href="{{route('tag').'?tag='.urlencode($tag->judul)}}">{{$tag->judul}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    @if(count($product)>0)
                        <div class="product-show-option">
                            <div class="row">
                                <div class="col-7">
                                    {{-- <div class="select-option">
                                        <select class="sorting">
                                            <option value="">Urutkan</option>
                                        </select>
                                    </div> --}}
                                    @if (app('request')->input('tag') != null)
                                        <p>Terdapat {{$tot_prod->count()}} produk yang memiliki tag "{{app('request')->input('tag')}}"</p>
                                    @endif
                                    @if (app('request')->input('color') != null)
                                        <p>Terdapat {{$tot_prod->count()}} produk yang memiliki warna "{{app('request')->input('color')}}"</p>
                                    @endif
                                    @if (app('request')->input('cate') != null)
                                        <p>Terdapat {{$tot_prod->count()}} produk yang memiliki kategori "{{App\Category::where('id', app('request')->input('cate'))->get()->first()->judul}}"</p>
                                    @endif
                                    @if (app('request')->input('size') != null)
                                        <p>Terdapat {{$tot_prod->count()}} produk yang memiliki ukuran "{{ucfirst(app('request')->input('size'))}}"</p>
                                    @endif
                                </div>
                                <div class="col-5">
                                    <button class="filter-btn text-right" data-toggle="filter-collapse" data-target="#slide-filter-collapse">Filter <i class="ti-menu"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="product-list">
                            <div class="row product-section">
                                @foreach ($product as $prod)
                                    <div class="col-lg-4 col-sm-6 product-box">
                                        <div class="product-item" id="prod{{$prod->id}}">
                                            <div class="pi-pic">
                                                <img src="{{asset('product-pic/'.$prod->id.'/'.$prod->gambar_utama)}}" alt="">
                                                @if ($prod->harga_diskon!=0)
                                                <div class="sale pp-sale">Diskon</div>
                                                @endif
                                                @include('utama.product_btn')
                                            </div>
                                            <div class="pi-text">
                                                <a href="{{route('product').'/'.$prod->id}}">
                                                    <h5>{{$prod->nama_barang}}</h5>
                                                </a>
                                                <div class="product-price">
                                                    @if ($prod->harga_diskon!=0)
                                                    @currency($prod->harga_diskon)
                                                    <span>@currency($prod->harga)</span>
                                                    @else
                                                    @currency($prod->harga)
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="loading-more">
                            <div class="spin">
                                <i class="icon_loading"></i>
                            </div>
                            @if (isset($tot_prod))
                                @if ($tot_prod->count()>9)
                                    <a class="load-more" href="javascript:void(0)" data-totalResult="{{ $tot_prod->count() }}">
                                    Load More
                                    </a>
                                @endif
                            @endif
                        </div>
                    @else
                        <h4 class="text-center">Maaf belum ada barang saat ini, silahkan hubungi admin untuk infomasi lebih lanjut.</h4>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection
@section('javascript')
@php
    $fav = json_decode(request()->cookie('my-fav'), true);
    // dd($fav);
@endphp

<script type="text/javascript">
    var main_site="{{ url('/') }}";
    var search=window.location.search;
    var urlku=main_site+'/load-more-data'+search;
    $(document).ready(function(){
        $(document).on('click','.load-more',function(){
            var _totalCurrentResult=$(".product-box").length;
            // Ajax Reuqest
            $.ajax({
                url:urlku,
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".icon_loading").show();
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('product-pic') }}/";
                    var route="{{route('product')}}";
                    var add_cart="{{ route('add_cart') }}";
                    var fav="{{route('fav')}}";
                    var heart = JSON.parse('@json($fav)');
                    $.each(response,function(index,value){
                        _html+='<div class="col-lg-4 col-sm-6 product-box">';
                            _html+='<div class="product-item" id=prod'+value.id+'>';
                                _html+='<div class="pi-pic">';
                                    _html+='<img src="'+image+value.id+'/'+value.gambar_utama+'" alt="">';
                                    if (value.harga_diskon != 0) {
                                        _html+='<div class="sale pp-sale">Diskon</div>';
                                    }
                                    if (heart != undefined && heart[value.id] != null){
                                        _html+='<form class="add_fav" action="'+fav+'" method="POST">';
                                            _html+=' @csrf';
                                            _html+='<input type="hidden" name="prod_id" value="'+value.id+'" class="form-control">';
                                            _html+='<div class="icon fav idfav'+value.id+'">';
                                                _html+='<a id='+value.id+' class="del_fav delfav_pi" href="'+fav+'/'+value.id+'/delete"><i class="icon_heart active" title="Favorit"></i></a>';
                                            _html+='</div>';
                                        _html+='</form>';
                                    } else {
                                        _html+='<form class="add_fav" action="'+fav+'" method="POST">';
                                            _html+=' @csrf';
                                            _html+='<input type="hidden" name="prod_id" value="'+value.id+'" class="form-control">';
                                            _html+='<div class="icon fav idfav'+value.id+'">';
                                                _html+='<button><i class="icon_heart_alt" title="Favorit"></i></button>';
                                            _html+='</div>';
                                        _html+='</form>';
                                    }
                                    // _html+='<form class="add_cart" action="'+add_cart+'" method="POST">';
                                        // _html+='@csrf';
                                        // _html+='<input type="hidden" name="product_id" value="'+value.id+'" class="form-control">';
                                        // _html+='<input type="hidden" name="qty" value="1" class="form-control">';
                                        _html+='<ul>';
                                            // _html+='<li class="w-icon active"><button><i class="icon_cart_alt" title="Tambah ke keranjang"></i></button></li>';
                                            _html+='<li class="quick-view"><a href="'+route+'/'+value.id+'">+ Lihat Produk</a></li>';
                                        _html+='</ul>';
                                //    _html+='</form>';
                                _html+='</div>';
                                _html+='<div class="pi-text">';
                                    _html+='<a href="'+route+'/'+value.id+'">';
                                    _html+='<h5>'+value.nama_barang+'</h5>';
                                    _html+='</a>';
                                    _html+='<div class="product-price">';
                                        if (value.harga_diskon != 0) {
                                            _html+='Rp. '+value.harga_diskon.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0 });
                                            _html+='<span>'+value.harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0 })+'</span>';
                                        } else {
                                            _html+='Rp. '+value.harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0 });
                                        }
                                    _html+='</div>';
                                _html+='</div>';
                            _html+='</div>';
                        _html+='</div>';
                    });
                    $(".product-section").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".product-box").length;
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                        $(".icon_loading").remove();
                    }else{
                        $(".icon_loading").hide();
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
{{-- Ajax Script End --}}
@endsection

