@php
    //MENGAMBIL DATA DARI COOKIE
    $carts = json_decode(request()->cookie('my-carts'), true);
    $fav = json_decode(request()->cookie('my-fav'), true);
    //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
    $subtotal = collect($carts)->sum(function ($q) {
        return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
    });
@endphp
<div class="col-lg-3 text-right col-md-2">
    <ul class="nav-right" id="user_data">
        @if (isset($fav) && $fav!=null)
            <li class="heart-icon">
                <a class="open-fav" href="javascript:void(0)">
                    <i class="icon_heart_alt"></i>
                    <span>{{count($fav)}}</span>
                </a>
                <div class="fav-hover">
                    <div class="select-items">
                        <table>
                            <tbody>
                                @foreach ($fav as $kol)
                                    <tr>
                                        <td class="si-pic"><a href="{{route('product').'/'.$kol['product_id']}}"><img src="{{asset('product-pic/'.$kol['product_id'].'/'.$kol['product_image'])}}" alt=""></a></td>
                                        <td class="si-text">
                                            <div class="product-selected">
                                                <p>@currency($kol['product_price'])</p>
                                                <h6>{{$kol['product_name']}}</h6>
                                            </div>
                                        </td>
                                        <td class="si-close text-right">
                                            {{-- <form action="{{ route('add_cart') }}" class="add_cart" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $kol['product_id'] }}" class="form-control">
                                                <input type="hidden" name="qty" value="1" class="form-control"> --}}
                                                <ul>
                                                    {{-- <li class="w-icon active"><button><i class="icon_cart_alt" title="Tambah ke keranjang"></i></button></li> --}}
                                                    <li><a id="{{ $kol['product_id'] }}" class="del_fav" href="{{route('fav').'/'.$kol['product_id'].'/delete'}}"><i class="ti-close" title="Hapus dari favorit"></i></a></li>
                                                {{-- </ul> --}}
                                            {{-- </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="select-button">
                        <a href="{{route('clearFav')}}" class="primary-btn view-card del_fav2">BERSIHKAN</a>
                    </div>
                </div>
            </li>
        @else
            <li class="heart-icon">
                <a href="javascript:void(0)">
                    <i class="icon_heart_alt"></i>
                    <span>0</span>
                </a>
            </li>
        @endif
        @if (isset($carts) && $carts!=null)
            <li class="cart-icon">
                <a class="open-cart" href="javascript:void(0)">
                    <i class="icon_cart_alt"></i>
                    <span>{{count($carts)}}</span>
                </a>
                <div class="cart-hover">
                    <div class="select-items">
                        <table>
                            <tbody>
                                @foreach ($carts as $row)
                                    <tr id="cart{{$row['product_id']}}">
                                        <td class="si-pic"><a href="{{route('product').'/'.$row['product_id']}}"><img src="{{asset('product-pic/'.$row['product_id'].'/'.$row['product_image'])}}"
                                                alt=""></a></td>
                                        <td class="si-text">
                                            <div class="product-selected">
                                                <p>@currency($row['product_price'])</p>
                                                <h6>{{$row['product_name']}} x {{$row['qty']}}</h6>
                                            </div>
                                        </td>
                                        <td class="si-close text-right">
                                        <a id="{{$row['product_id']}}" class="del_cart" href="{{route('cart').'/'.$row['product_id'].'/delete'}}"><i class="ti-close" title="Hapus dari keranjang"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="select-total">
                        <span>total:</span>
                        <h5>@currency($subtotal)</h5>
                    </div>
                    <div class="select-button">
                        <a href="{{route('cart')}}" class="primary-btn view-card">KERANJANG</a>
                        <a href="{{route('check_out')}}" class="primary-btn checkout-btn">BAYAR</a>
                    </div>
                </div>
            </li>
            <li class="cart-price">@currency($subtotal)</li>
        @else
            <li class="cart-icon">
                <a href="javascript:void(0)">
                    <i class="icon_cart_alt"></i>
                    <span>0</span>
                </a>
            </li>
        @endif
    </ul>
</div>
