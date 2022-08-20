 @php
    $best = DB::table('categories')->inRandomOrder()->limit(3)->get();
 @endphp
 <!-- Best Seller Banner Section Begin -->
@if (isset($best))
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('storage/best-seller.jpg')}}">
                        <h2>Best Seller</h2>
                        <a href="{{route('product')}}">Lihat Lainnya</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul class="nav nav-tabs bd-none">
                            @foreach ($best as $sl)
                                <li class="nav-item mr-0 bg-none">
                                    @if ($loop->first)
                                        <a class="nav-link active" data-toggle="tab" href="#{{str_replace(' ','_',$sl->judul)}}">{{$sl->judul}}</a>
                                    @else
                                        <a class="nav-link" data-toggle="tab" href="#{{str_replace(' ','_',$sl->judul)}}">{{$sl->judul}}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($best as $ab)
                            @php
                               $product = App\Product::where('category_id', $ab->id)->orderBy('views','desc')->take(6)->get();
                            @endphp
                            @if ($loop->first)
                                <div id="{{str_replace(' ','_',$ab->judul)}}" class="tab-pane fade in active show">
                            @else
                                <div id="{{str_replace(' ','_',$ab->judul)}}" class="tab-pane fade in">
                            @endif
                                <div class="product-slider owl-carousel">
                                    @foreach ($product as $prod)
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
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Best Seller Banner Section End -->



