@extends('layouts.utama_master')
{{-- @section('check_out', 'active') --}}
@section('judul', 'Check Out')

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{route('product')}}">Etalase</a>
                        <span>Pesan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
        <form action="{{route('bayar')}}" class="checkout-form" method="POST">
            @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Detail Pengiriman</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="nama_penerima">Nama<span>*</span></label>
                                <input class="checkout-style" type="text" name="nama_penerima" id="nama_penerima" required>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for="provinsi">Provinsi<span>*</span></label>
                                <select class="checkout-style p-show" name="provinsi" id="provinsi" required>
                                    <option value="">-- Pilih Provinsi --</option>
                                    @foreach ($provinsi as $key => $row)
                                        <option value="{{$provinsi[$key]['province_id']}}" namaprovinsi="{{$provinsi[$key]['province']}}">{{$provinsi[$key]['province']}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="prov" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="kabupaten">Kota/Kabupaten<span>*</span></label>
                                <select class="checkout-style p-show" name="kabupaten" id="kabupaten" required>
                                    {{-- <option value="">-- Pilih Kota/Kabupaten --</option> --}}
                                </select>
                                <input type="hidden" name="kab" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="kecamatan">Kecamatan<span>*</span></label>
                                <select class="checkout-style p-show" name="kecamatan" id="kecamatan" required>
                                    {{-- <option value="">-- Pilih Kecamatan --</option> --}}
                                </select>
                                <input type="hidden" name="kec" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="pos">Kodepos<span>*</span></label>
                                {{-- <select class="checkout-style p-show" name="pos" id="pos" required> --}}
                                    {{-- <option value="">-- Pilih Pos --</option> --}}
                                {{-- </select> --}}
                                <input type="number" name="kp" id="pos" value="" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="alamat">Alamat Lengkap<span>*</span></label>
                                <input type="text" name="alamat" id="alamat" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="email">Email<span>*(untuk menyimpan link pembayaran)</span></label>
                                <input class="checkout-style" type="text" name="email" id="email" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="no_hp">No. Hp.<span>*</span></label>
                                <input class="checkout-style" type="text" name="no_hp" id="phone" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="kurir">Kurir<span>*</span></label>
                                <select class="checkout-style p-show" name="kurir" id="kurir" required>
                                    <option value="">-- Pilih Kurir --</option>
                                    <option value="jne">JNE</option>
                                    <option value="jnt">J&T</option>
                                    <option value="wahana">Wahana</option>
                                    <option value="sicepat">SiCepat</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                                <input type="hidden" name="kur" value="0">
                            </div>
                            <div class="col-lg-8">
                                <label for="layanan">Layanan<span>*</span></label>
                                <select class="checkout-style p-show" name="layanan" id="layanan" required>
                                    {{-- <option value="">-- Pilih Layanan --</option> --}}
                                </select>
                                <input type="hidden" name="ongkir" value="0">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-reseller">
                                        Kirim Sebagai Reseller?
                                        <input type="checkbox" id="acc-reseller">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout-content res">
                                     <select class="cariReseller" style="width:100%;" name="nama_pengirim"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Pesanan Anda</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Produk <span>Total</span></li>
                                    @foreach ($carts as $row)
                                        <li class="fw-normal">{{$row['product_name']}} x {{$row['qty']}} <span> @currency($row['product_price'] * $row['qty'])</span></li>
                                    @endforeach
                                    <li id="kur" class="fw-normal">Kurir <span>@currency(0)</span></li>
                                    <li id="diskon" class="fw-normal">Diskon <span>Rp. -0</span></li>
                                    <input type="hidden" name="diskon" value="0">
                                    <li id="ongkir" class="total-price" nilai="{{$subtotal}}">Total <span>@currency($subtotal)</span></li>
                                    <input class="checkout-style" type="hidden" name="berat" id="berat" value="{{$berat}}">
                                    <div class="input-group checkout-content disc">
                                        <input style=" -ms-flex: 1 1 auto; flex: 1 1 auto; width: 1%;" type="text" name="kupon" placeholder="Kupon">
                                        <input type="hidden" name="kode_voucher" value="">
                                        <div class="input-group-append">
                                            <button class="content-btn" id="voucher" type="button">Pakai</button>
                                        </div>
                                    </div>
                                    <li class="pesan-tambahan">
                                        <label for="add_pesan">Pesan Tambahan</label>
                                        <textarea placeholder="Ukuran, Warna, dll" class="checkout-style" name="add_pesan" id="add-pesan"></textarea>
                                    </li>
                                    <div class="input-field" required>
                                        {!! NoCaptcha::renderJs('id') !!}
                                        {!! NoCaptcha::display() !!}
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    </div>
                                </ul>
                                <div class="order-btn">
                                    <button type="submit" id="ripple" class="site-btn place-btn">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
