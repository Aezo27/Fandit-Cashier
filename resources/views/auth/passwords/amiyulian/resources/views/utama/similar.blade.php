@php
    $product2 = App\Product::inRandomOrder()->limit(4)->get();
@endphp
@if (isset($product2))
    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="related-title"><span>.: Produk Lainnya :.</span></h2>
                    </div>
                </div>
            </div>
            <div class="container">

            </div>
            <div class="row">
                @foreach ($product2 as $prod)
                    <div class="col-lg-3 col-sm-6">
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
    </div>
    <!-- Related Products Section End -->
@endif
