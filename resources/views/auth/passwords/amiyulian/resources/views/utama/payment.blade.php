@extends('layouts.utama_master')
{{-- @section('payment', 'active') --}}
@section('judul', 'Payment - #'.$order->id)

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <a href="{{route('product')}}">Etalase</a>
                        <a href="{{route('check_out')}}">Pesan</a>
                        <span>Bayar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Faq Section Begin -->
    <div class="faq-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="beli-sukses">
                        <p>
                            Terima kasih telah melakukan pemesanan, silahkan cek email anda untuk mendapatkan link kembali Ke halaman ini dikemudian hari. <b>Simpan kode Order ID ditempat yang aman dan jangan berikan ke siapapun, silahkan cek kembali alamat anda sebelum melakukan pembayaran.</b> Apabila terdapat pertanyaan silahkan hubungi kami melalui whatsapp atau bisa klik <a href="{{route('faq')}}">disini</a> untuk pertanyaan yang sering ditanyakan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion_17" id="accordionExample">
                            <div class="card mb-2 panel-col-green">
                                <div class="card-heading active panel title-green">
                                    <a class="active" data-toggle="collapse" data-target="#collapseOne">
                                        Rincian Pesanan
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="or-id">
                                            <tr>
                                                <td>ORDER ID</td>
                                                <td>:</td>
                                                <td>{{$order->id}}</td>
                                            </tr>
                                            <tr>
                                                <td>STATUS</td>
                                                <td>:</td>
                                                <td style="text-transform: uppercase;">{{$order->status}}</td>
                                            </tr>
                                            <tr>
                                                <td>NO RESI</td>
                                                <td>:</td>
                                                @if ($order->no_resi!=null)
                                                    <td><span id="resi">{{$order->no_resi}}</span><button class="btn btn-resi" onclick="copyToClipboard('#resi')">COPY</button></td>
                                                @else
                                                    <td><span id="resi">{{$order->no_resi}}</span></td>
                                                @endif
                                            </tr>
                                        </table>
                                        <div class="pd">
                                            <table class="data mb-4">
                                                <tr>
                                                    <td class="fw-normal">Nama</td>
                                                    <td class="kanan">{{$order->nama_penerima}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-normal">Alamat</td>
                                                    <td class="kanan">{{$order->alamat_lengkap}}, {{$order->kecamatan}}, {{$order->kabupaten}}, {{$order->provinsi}} - {{$order->kode_pos}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-normal">No. Hp.</td>
                                                    <td class="kanan">{{$order->no_hp}}</td>
                                                </tr>
                                            </table>
                                            <table class="bayar mb-4">
                                                @foreach($order->products as $pro)
                                                    <tr>
                                                        @if (app\Product::where('id',$pro->id)->get()->first()->harga_diskon!=0)
                                                        <td class="fw-normal">{{ $pro->nama_barang }} x {{ $pro->pivot->jumlah }}</td>
                                                        <td class="kanan">@currency(app\Product::where('id',$pro->id)->get()->first()->harga_diskon*$pro->pivot->jumlah)</td>
                                                        @else
                                                        <td class="fw-normal">{{ $pro->nama_barang }} x {{ $pro->pivot->jumlah }}</td>
                                                        <td class="kanan">@currency(app\Product::where('id',$pro->id)->get()->first()->harga*$pro->pivot->jumlah)</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="fw-normal">{{$order->kurir}}</td>
                                                    <td class="kanan">@currency($order->ongkir)</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-normal">Diskon</td>
                                                    <td class="kanan">@currency(-$order->diskon)</td>
                                                </tr>
                                                <tr class="total-price">
                                                    <td class="fw-normal">Total</td>
                                                    <td class="kanan">@currency($order->total)</td>
                                                </tr>
                                            </table>
                                            @if ($order->status=='pending')
                                            <form action="{{route('check_out').'/'.$order->id.'/batal'}}" method="post">
                                                @csrf
                                                <div style="text-align: center;">
                                                    <button type="submit" id="ripple" class="btn1">BATALKAN PESANAN</button>
                                                </div>
                                            </form>
                                            @elseif ($order->status=='diproses')
                                            <form action="{{route('product').'/payment'.'/'.$order->id.'/finish'}}" method="post">
                                                @csrf
                                                <div style="text-align: center;">
                                                    <button type="submit" id="ripple" class="btn1">PESANAN DITERIMA</button>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 panel-col-teal">
                                <div class="card-heading panel title-teal">
                                    <a data-toggle="collapse" data-target="#collapseTwo">
                                        Pembayaran
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body pd2">
                                        <p><b>Silahkan lakukan pembayaran sejumlah diatas melalui rekening dibawah ini, lalu upload bukti pembayaran agar barang dapat dikirim.</b></p>
                                        <ul>
                                            @foreach ($payment as $pay)
                                            <li>
                                                <h4>{{$pay->nama_bank}}</h4>
                                                <ul>
                                                    @if ($pay->no_rek!=null)
                                                        <p>No. Rek. {{$pay->no_rek}} a.n. {{$pay->an}}</p>
                                                    @else
                                                    <p>A.n. {{$pay->an}}</p>
                                                    @endif
                                                    @if ($pay->barcode!=null)
                                                        <img height="200" src="{{asset('storage/bank/'.$pay->barcode)}}" alt="">
                                                    @endif
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card panel-col-brown">
                                <div class="card-heading panel title-brown">
                                    <a data-toggle="collapse" data-target="#collapseThree">
                                        Upload Bukti Pembayaran
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body pd2">
                                        <div class="input-group">
                                            @if (isset($order->bukti_tf))
                                                <div class="beli-sukses mb-3">
                                                    <p>
                                                        Bukti transfer berhasil disimpan pesanan anda sedang diproses, harap menunggu atau bisa hubungi admin untuk
                                                        konfirmasi, terimakasih.
                                                    </p>
                                                </div>
                                            @endif
                                            <form style="margin: auto" method="POST" enctype="multipart/form-data" action="{{ route('postpayment') }}">
                                                @csrf
                                                <div class="upform d-flex">
                                                    <div class="custom-file">
                                                        <input style="cursor: pointer" type="file" class="custom-file-input" id="myFile" name="postpayment"
                                                            accept="image/*" name="foto" required>
                                                        <label class="custom-file-label" for="myFile">Pilih file</label>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{$order->id}}">
                                                    <button type="submit" class="btn-sub">Upload</button>
                                                </div>
                                                <small class="col-lg-6 col-md-12 form-text text-muted"style="color:#ce0000 !important; padding: 0; font-weight:bold;">Max Size2MB</small>
                                                <div class="text-center mt-2">
                                                    @if (isset($order->bukti_tf))
                                                    <img id="gambar" width="300px" src="{{asset('bukti_transfer/'.$order->bukti_tf)}}" alt="">
                                                    @else
                                                    <img id="gambar" width="300px" src="#" alt="">
                                                    @endif
                                                </div>
                                            </form>
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
    <!-- Faq Section End -->
@endsection
