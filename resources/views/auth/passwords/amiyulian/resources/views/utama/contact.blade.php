@extends('layouts.utama_master')
@section('contact', 'active')
@section('judul', 'Contact')

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <span>Kontak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="{{App\Contact::where("nama","maps")->get()->first()->isi}}"
                    height="610" style="border:0" allowfullscreen="">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

        <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-title">
                        <h4>Hubungi Kami</h4>
                        {{-- <p>Informasi lebih lanjut, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p> --}}
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Alamat:</span>
                                <p>{{App\Contact::where("nama","alamat")->get()->first()->isi}}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Telfon:</span>
                                <p>{{App\Contact::where("nama","telfon")->get()->first()->isi}}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>{{App\Contact::where("nama","email")->get()->first()->isi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-title">
                        <h4>Sosial Media</h4>
                        {{-- <p>Informasi lebih lanjut, Lorem Ipsum is simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, maki years old.</p> --}}
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-instagram"></i>
                            </div>
                            <div class="ci-text">
                                <span>Instagram:</span>
                                <p>{{App\Contact::where("nama","instagram")->get()->first()->isi}}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-facebook"></i>
                            </div>
                            <div class="ci-text">
                                <span>Facebook:</span>
                                <p>{{App\Contact::where("nama","facebook")->get()->first()->isi}}</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-shopping-cart"></i>
                            </div>
                            <div class="ci-text">
                                <span>Shopee:</span>
                                <p>{{App\Contact::where("nama","shopee")->get()->first()->isi}}</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Tinggalkan Pesan</h4>
                            <p>Admin akan melihat dan membalas pertanyaan anda nanti.</p>
                            <form action="#" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Nama">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Pesan"></textarea>
                                        <button type="submit" class="site-btn">Kirim Pesan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
