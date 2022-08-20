@extends('layouts.utama_master')
@section('judul', 'Search')

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{route('product')}}"></i> Etalase</a>
                        <span>Cari</span>
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
                <div class="col-12">
                    @if(count($product)>0)
                        <div class="product-show-option">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <p>Menemukan {{$tot_prod->count()}} hasil pencarian</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-list">
                            <div class="row product-section">
                                    @foreach ($product as $prod)
                                        <div class="col-lg-3 col-sm-6 product-box">
                                            <div class="product-item">
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
                                @if ($tot_prod->count()>12)
                                    <a class="load-more" href="javascript:void(0)" data-totalResult="{{ $tot_prod->count() }}">
                                    Load More
                                    </a>
                                @endif
                            @endif
                        </div>
                    @else
                        <h4 class="text-center">Maaf barang yang anda cari belum tersedia saat ini. klik <a href="{{route('product')}}">disini</a> untuk melihat produk yang lain.</h4>
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
    var urlku=main_site+'/load-more-data-search'+search;
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
                        _html+='<div class="col-lg-3 col-sm-6 product-box">';
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
                                    //     _html+='@csrf';
                                    //     _html+='<input type="hidden" name="product_id" value="'+value.id+'" class="form-control">';
                                    //     _html+='<input type="hidden" name="qty" value="1" class="form-control">';
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

