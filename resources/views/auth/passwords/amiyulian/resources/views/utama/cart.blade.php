@extends('layouts.utama_master')
{{-- @section('cart', 'active') --}}
@section('judul', 'Cart')

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{route('product')}}">Etalase</a>
                        <span>Keranjang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        <form class="update_cart" action="{{ route('update_cart') }}" method="POST">
                            @csrf
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th class="p-name">Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($carts) && $carts!=null)
                                            @foreach ($carts as $row)
                                                @if ($loop->first)
                                                    <tr>
                                                        <td class="cart-pic first-row"><img src="{{asset('product-pic/'.$row['product_id'].'/'.$row['product_id'].'_utama.png')}}" alt=""></td>
                                                        <td class="cart-title first-row">
                                                            <h5>{{$row['product_name']}}</h5>
                                                        </td>
                                                        <td class="p-price first-row">@currency($row['product_price'])</td>
                                                        <td class="qua-col first-row">
                                                            <div class="quantity">
                                                                <div class="pro-qty">
                                                                    <span class="dec qtybtn">-</span>
                                                                    <input type="text" name="qty[]" value="{{$row['qty']}}">
                                                                    <span class="inc qtybtn">+</span>
                                                                </div>
                                                                <input type="hidden" name="harga" value="{{$row['product_price']}}">
                                                                <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                                                                <input type="hidden" name="stock" value="{{$row['product_stock']}}">
                                                            </div>
                                                        </td>
                                                        <td id="brg{{ $row['product_id'] }}" class="total-price first-row">@currency($row['product_price'] * $row['qty'])</td>
                                                        <td class="close-td first-row"><a class="del_cart2" href="{{route('cart').'/'.$row['product_id'].'/delete'}}"><i class="ti-close"></i></a></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="cart-pic"><img src="{{asset('product-pic/'.$row['product_id'].'/'.$row['product_id'].'_utama.png')}}" alt=""></td>
                                                        <td class="cart-title">
                                                            <h5>{{$row['product_name']}}</h5>
                                                        </td>
                                                        <td class="p-price">@currency($row['product_price'])</td>
                                                        <td class="qua-col">
                                                            <div class="quantity">
                                                                <div class="pro-qty">
                                                                    <span class="dec qtybtn">-</span>
                                                                    <input type="text" name="qty[]" value="{{$row['qty']}}">
                                                                    <span class="inc qtybtn">+</span>
                                                                </div>
                                                                <input type="hidden" name="harga" value="{{$row['product_price']}}">
                                                                <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" class="form-control">
                                                                <input type="hidden" name="stock" value="{{$row['product_stock']}}">
                                                            </div>
                                                        </td>
                                                        <td id="brg{{ $row['product_id'] }}" class="total-price">@currency($row['product_price'] * $row['qty'])</td>
                                                        <td class="close-td"><a class="del_cart2" href="{{route('cart').'/'.$row['product_id'].'/delete'}}"><i class="ti-close"></i></a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="cart-buttons">
                                                    <a href="{{ route('product') }}" class="primary-btn view-card">Lanjut Belanja</a>
                                                    <button class="primary-btn up-cart">Perbarui</button>
                                                    <a href="{{route("clearCart")}}" class="primary-btn continue-shop clearCart">BERSIHKAN</a>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="col-lg-4 offset-lg-1">
                                                <div class="proceed-checkout">
                                                    <ul>
                                                        <li class="cart-total">Total <span>@currency($subtotal)</span></li>
                                                    </ul>
                                                    <a href="{{route('check_out')}}" id="ripple" class="proceed-btn">Bayar</a>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                                </tbody>
                                            </table>
                                            <div class="text-center mt-3">
                                                Belum ada barang dalam keranjang.
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="cart-buttons">
                                                    <a href="{{ route('product') }}" class="primary-btn view-card">Lanjut Belanja</a>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="col-lg-4 offset-lg-4">
                                                <div class="proceed-checkout">
                                                    <ul>
                                                        <li class="cart-total">Total <span>@currency($subtotal)</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                </div>
            </div>
        </div>
    </section>
<!-- Shopping Cart Section End -->
@endsection
