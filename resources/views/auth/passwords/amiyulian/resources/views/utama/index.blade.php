@extends('layouts.utama_master')
@section('home', 'active')
@section('judul', 'Homepage')

@section('konten')

    @if (isset($home_slide))
        <!-- Hero Section Begin -->
        <section class="hero-section">
            <div class="hero-items owl-carousel">
                @foreach ($home_slide as $hero_slide)
                @if ($hero_slide->title != null)
                    <div class="single-hero-items set-bg" data-setbg="{{asset('storage/home_slide/'.$hero_slide->bg)}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 over">
                                    <span>{{$hero_slide->category}}</span>
                                    <h1 style="color: #ffffff">{{$hero_slide->title}}</h1>
                                    <p style="color: #ffffff">{{$hero_slide->isi}}</p>
                                    <a href="{{$hero_slide->link}}" class="primary-btn">Beli Sekarang</a>
                                </div>
                            </div>
                            @if ($hero_slide->diskon !=null)
                            <div class="off-card">
                                <h2>Diskon <span>{{$hero_slide->diskon}}</span></h2>
                            </div>
                            @endif
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </section>
    @endif
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    @if (isset($banca))
        <div class="banner-section spad">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($banca as $ban)
                        <div class="col-lg-4">
                            <div class="single-banner">
                                <a href="{{$ban->link}}"><img src="{{asset('storage/banner_category/'.$ban->bg)}}" alt=""></a>
                                <div class="inner-text">
                                    <a href="{{$ban->link}}"><h4>{{$ban->judul}}</h4></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Banner Section End -->
    @if (isset($dis_wid))
        @if ($now < $date)
            <!-- Deal Of The Week Section Begin-->
        <section class="deal-of-week spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-center order-lg-1 order-2">
                        <div class="section-title">
                            <h2>{{$dis_wid->judul}}</h2>
                            <p>{{$dis_wid->isi}}</p>
                            <div class="product-price">
                                @currency($dis_wid->harga)
                                <span>/ {{$dis_wid->nama_barang}}</span>
                            </div>
                        </div>
                        <div class="hp  discount-pic">
                            <img src="{{asset('storage/'.$dis_wid->gambar)}}" alt="">
                        </div>
                        <div class="countdown-timer" id="countdown">
                            <div class="cd-item">
                                <span>00</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>00</span>
                                <p>Hrs</p>
                            </div>
                            <div class="cd-item">
                                <span>00</span>
                                <p>Mins</p>
                            </div>
                            <div class="cd-item">
                                <span>00</span>
                                <p>Secs</p>
                            </div>
                        </div>
                        <a href="{{route('product').'/'.$dis_wid->link}}" class="primary-btn">Beli Sekarang</a>
                    </div>
                    <div class="col-lg-6 text-center order-lg-2 order-1 pc">
                        <img src="{{asset('storage/'.$dis_wid->gambar)}}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- Deal Of The Week Section End -->
        @endif
    @endif

    @include('utama.best_seller')

@endsection
@section('javascript')
{{-- <script type="text/javascript">
    // Use this for real timer date
    var timerdate = "{{$date}}";

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Hari</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Jam</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Menit</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Detik</p> </div>"))
    });
</script> --}}


@endsection
