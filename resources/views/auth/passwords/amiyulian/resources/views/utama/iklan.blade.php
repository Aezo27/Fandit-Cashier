<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Sebuah toko yang menyediakan berbagai pakaian muslimah seperti hijab, gamis, dan masih banyak lagi.">
    <meta name="keywords" content="Hijab, Olshop, Gamis, Muslimah">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{asset('storage/logo.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ikl/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('ikl/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('ikl/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('ikl/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('ikl/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/flipclock.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('ikl/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('ikl/css/main.css')}}">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
      <div class="site-mobile-menu-footer">
          <ul class="social-media">
            <li><a href="{{App\Contact::where("nama","facebook")->get()->first()->isi}}" class="pl-0 pr-2"><span class="icon-facebook"></span></a></li>
            <li><a href="{{App\Contact::where("nama","twitter")->get()->first()->isi}}" class="pl-3 pr-2"><span class="icon-twitter"></span></a></li>
            <li><a href="{{App\Contact::where("nama","instagram")->get()->first()->isi}}" class="pl-2 pr-2"><span class="icon-instagram"></span></a></li>
            <li><a href="https://www.linkedin.com/in/aezo27" class="pl-2 pr-2"><span class="icon-linkedin"></span></a></li>
            <li><a href="https://www.github.com/Aezo27" class="pl-2 pr-2"><span class="icon-github"></span></a></li>
          </ul>
      </div>
    </div>

    {{-- <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-5 text-left sosmed">
            <ul class="social-media">
              <li><a href="https://fb.com/Rama.Sullivan27" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="https://twitter.com/aezo27" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="https://instagram.com/aezo27" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="https://www.linkedin.com/in/aezo27" class=""><span class="icon-linkedin"></span></a></li>
              <li><a href="https://www.github.com/Aezo27" class=""><span class="icon-github"></span></a></li>
            </ul>
          </div>
          <div class="col-7 contact">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://+6282134626598"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+62) 82134626598 </span></a></span>
              <span class="mr-3"><a href="https://bit.ly/Aezo27_"> <span class="icon-whatsapp mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+62) 82134626598</span></a></span>
              <span><a href="mailto:ramasullivan27@gmail.com"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">ramasullivan27@gmail.com</span></a></span>
            </p>

          </div>
        </div>
      </div>
    </div> --}}

    <header class="site-navbar py-3 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-3 mini">
            <h1 class="mb-0 site-logo pc"><a href="{{route('home')}}" class="text-black mb-0"><img src="{{asset('storage/logo_long.png')}}" height="70"></a></h1>
            <h1 class="mb-0 site-logo hp"><a href="{{route('home')}}" class="text-black mb-0"><img src="{{asset('storage/logo_long.png')}}" height="70"></a></h1>
          </div>
          <div class="col-12 col-md-9 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Beranda</a></li>
                <li><a href="#products-section" class="nav-link">Produk</a></li>
                <li><a href="#reseller-section" class="nav-link">Reseller</a></li>
                <li><a href="#about-section" class="nav-link">Tentang Kami</a></li>
                <li><a href="#services-section" class="nav-link">Service</a></li>
                @if ($now < $date)
                <li><a href="#special-section" class="nav-link">Promo</a></li>
                @endif
                <li><a href="#testimonials-section" class="nav-link">Testimoni</a></li>
                <li><a href="#contact-section" class="nav-link">Kontak</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3 hp1" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>



    <div class="site-blocks-cover overlay" style="background-image: url({{asset('iklan_pic/hero_2.png')}});" data-aos="fade" data-stellar-background-ratio="1">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

            <div class="row mb-4">
              <div class="col-md-7">
                <h1>{{DB::table('text_banner')->where('bagian', 'Header Iklan')->get()->first()->judul}}</h1>
                <p class="mb-5 lead">{{DB::table('text_banner')->where('bagian', 'Header Iklan')->get()->first()->isi}}</p>
                <div>
                  <a href="{{route('product')}}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Beli Sekarang</a>
                  <a href="#" class="btn btn-white py-3 px-5 rounded-0 d-block d-sm-inline-block">Reseller</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@if (isset($products))
<div class="site-section" id="products-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Produk Terlaris</h3>
            <h2 class="section-title mb-3">{{DB::table('text_banner')->where('bagian', 'Produk Terlaris')->get()->first()->judul}}</h2>
            <p>{{DB::table('text_banner')->where('bagian', 'Produk Terlaris')->get()->first()->isi}}</p>
        </div>
        </div>
        <div class="row">
             @foreach ($products as $product)
             <div class="col-lg-4 col-md-6 mb-5">
                <div class="product-item">
                  <figure>
                    <img src="{{asset('product-pic/'.$product->id.'/'.$product->gambar_utama)}}" alt="" class="img-fluid">
                  </figure>
                  <div class="px-4">
                    <h3 style="font-weight: bold"><a href="{{route('product').'/'.$product->id}}">{{$product->nama_barang}}</a></h3>
                    <div class="mb-3">
                        <span class="meta-icons mr-3"> @currency($product->harga)</span>
                      </div>
                    <p class="mb-4">{{$product->ket1}}</p>
                    <div>
                      <a href="{{route('product').'/'.$product->id}}" class="btn btn-black btn-outline-black ml-1 rounded-0">Lihat</a>
                    </div>
                  </div>
                </div>
              </div>
             @endforeach
        </div>
      </div>
    </div>

    <div class="site-section bg-light1">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h3 class="section-sub-title">Produk Terbaik</h3>
            <h2 class="section-title mb-3">{{DB::table('text_banner')->where('bagian', 'Produk Terbaik')->get()->first()->judul}}</h2>
            <p>{{DB::table('text_banner')->where('bagian', 'Produk Terbaik')->get()->first()->isi}}</p>
          </div>
        </div>

        @foreach ($products2 as $key => $product2)
        @if ($loop->first)
        <div class="bg-white py-4 mb-4">
            <div class="row mx-4 my-4 product-item-2 align-items-start">
                <div class="col-md-6 mb-5 mb-md-0">
                <img src="{{asset('product-pic/'.$product2->id.'/'.$product2->gambar_utama)}}" alt="Image" class="img-fluid">
                </div>
            <div class="col-md-5 ml-auto product-title-wrap">
              <span class="number">0{{$key+1}}.</span>
              <h3 class="text-black mb-4 font-weight-bold">{{$product2->nama_barang}}</h3>
              <p class="mb-4">{{$product2->ket2}}</p>

              <div class="mb-4">
                <h3 class="text-black font-weight-bold h5">Harga:</h3>
                 <div class="Harga">{{--<del class="mr-2">$269.00</del>--}} @currency($product2->harga)</div>
              </div>
              <p>
                <a href="{{route('product').'/'.$product2->id}}" class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>
        @else
        <div class="bg-white py-4">
            <div class="row mx-4 my-4 product-item-2 align-items-start">
              <div class="col-md-6 mb-5 mb-md-0 order-1 order-md-2">
                <img src="{{asset('product-pic/'.$product2->id.'/'.$product2->gambar_utama)}}" alt="Image" class="img-fluid">
              </div>

              <div class="col-md-5 mr-auto product-title-wrap order-2 order-md-1">
                <span class="number">0{{$key+1}}.</span>
                <h3 class="text-black mb-4 font-weight-bold">{{$product2->nama_barang}}</h3>
                <p class="mb-4">{{$product2->ket2}}</p>

                <div class="mb-4">
                  <h3 class="text-black font-weight-bold h5">Harga:</h3>
                  <div class="Harga">{{--<del class="mr-2">$269.00</del>--}} @currency($product2->harga)</div>
                </div>
                <p>
                    <a href="{{route('product').'/'.$product2->id}}" class="btn btn-black btn-outline-black rounded-0 d-block mb-2 mb-lg-0 d-lg-inline-block">Lihat Detail</a>
                </p>
              </div>
            </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
@endif

    <div class="site-blocks-cover inner-page-cover overlay" id="reseller-section" style="background-image: url({{asset('iklan_pic/hero_2.png')}}); background-attachment: fixed;  background-position: top;" data-aos="fade">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-md-10 text-center">
            <h3 class="section-sub-title" style="color: #fff;">Reseller</h3>
            <h3 class="section-title text-white mb-4">{{DB::table('text_banner')->where('bagian', 'Reseller')->get()->first()->judul}}</h3>
            <p class="mb-5 lead">{{DB::table('text_banner')->where('bagian', 'Reseller')->get()->first()->isi}}</p>
            <p><a href="#" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Daftar Sekarang</a></p>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row align-items-lg-center">
          <div class="col-md-8 mb-5 mb-lg-0 position-relative">
            <img src="{{asset('iklan_pic/about_1.png')}}" class="img-fluid" alt="Image">
            <div class="experience">
              <span class="year">{{DB::table('text_banner')->where('bagian', 'Pengalaman')->get()->first()->judul}}</span>
              <span class="caption">{{DB::table('text_banner')->where('bagian', 'Pengalaman')->get()->first()->isi}}</span>
            </div>
          </div>
          <div class="col-md-3 ml-auto">
            <h3 class="section-sub-title">Toko Kami</h3>
            <h2 class="section-title mb-3">{{DB::table('text_banner')->where('bagian', 'Toko Kami')->get()->first()->judul}}</h2>
            <p class="mb-4">{{DB::table('text_banner')->where('bagian', 'Toko Kami')->get()->first()->isi}}</p>
          </div>
        </div>
      </div>
    </div>

    @if (isset($dis_wid))
        @if ($now < $date)
            <div class="site-blocks-cover overlay get-notification" id="special-section" style="background-image: url({{asset('iklan_pic/hero_2.png')}}); background-attachment: fixed; background-position: top;" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                <div class="col-md-10 text-center">
                    <h3 class="section-sub-title" style="color: #fff;">Promo Spesial</h3>
                    <h3 class="section-title text-white mb-4">{{$dis_wid->judul}}</h3>
                    <p class="mb-5 lead">{{$dis_wid->isi}}</p>
                    <div class="cd100"></div>
                    <p><a href="{{route('product').'/'.$dis_wid->link}}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Belanja Sekarang</a></p>
                </div>
                </div>

            </div>
            </div>
        @endif
    @endif

    <div class="site-section bg-light" id="services-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Pelayanan Kami</h3>
            <h2 class="section-title mb-3">Kami Memiliki</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
            @foreach ($services as $service)
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
                <div class="unit-4 d-flex">
                  <div class="unit-4-icon mr-4"><span class="text-primary icon-beenhere"></span></div>
                  <div>
                    <h3>{{$service->judul}}</h3>
                    <p>{{$service->isi}}</p>
                  </div>
                </div>
              </div>
            @endforeach

        </div>
      </div>
    </div>

    <div class="site-section testimonial-wrap" id="testimonials-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Pelanggan Kami</h3>
            <h2 class="section-title mb-3">Testimoni</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
            @foreach ($testimoni as $testi)
            <div>
              <div class="testimonial">
                <figure class="mb-4 d-block align-items-center justify-content-center">
                  <div><img src="{{asset('iklan_pic').'/'.$testi->foto}}" alt="Image" class="w-100 img-fluid mb-3"></div>
                </figure>
                <blockquote class="mb-3">
                  <p>&ldquo;{{$testi->pesan}}&rdquo;</p>
                </blockquote>
                <p class="text-black"><strong>{{$testi->nama}}</strong></p>
              </div>
            </div>
            @endforeach
        </div>
    </div>



    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h3 class="section-sub-title">Kontak Kami</h3>
            <h2 class="section-title mb-3">Temukan Kami Di</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 mb-5">
            <ul style="list-style: none; padding: 0;" class="row">
                <li class="col-xl-6"><a href="{{App\Contact::where("nama","whatsapp")->get()->first()->isi}}"><img src="{{asset('iklan_pic/WA.png')}}" alt="Image" class="sosmed_banner"></a></li>
                <li class="col-xl-6"><a href="{{App\Contact::where("nama","facebook")->get()->first()->isi}}"><img src="{{asset('iklan_pic/FB.png')}}" alt="Image" class="sosmed_banner"></a></li>
                <li class="col-xl-6"><a href="{{App\Contact::where("nama","instagram")->get()->first()->isi}}"><img src="{{asset('iklan_pic/IG.png')}}" alt="Image" class="sosmed_banner"></a></li>
                <li class="col-xl-6"><a href="mailto:{{App\Contact::where("nama","email")->get()->first()->isi}}"><img src="{{asset('iklan_pic/GM.png')}}" alt="Image" class="sosmed_banner"></a></li>
                <li class="col-xl-6"><a href="https://linkedin.com/in/aezo27"><img src="{{asset('iklan_pic/IN.png')}}" alt="Image" class="sosmed_banner"></a></li>
                <li class="col-xl-6"><a href="{{App\Contact::where("nama","twitter")->get()->first()->isi}}"><img src="{{asset('iklan_pic/TW.png')}}" alt="Image" class="sosmed_banner"></a></li>
            </ul>
          </div>

        </div>

      </div>
    </div>


    <footer class="site-footer bg-black">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">Alamat Kami</h2>
                <p>{{App\Contact::where("nama","alamat")->get()->first()->isi}}</p>
              </div>
              <div class="col-md-3 ">
                <h2 class="footer-heading mb-4">Informasi</h2>
                <ul class="list-unstyled">
                    @foreach ($footlink as $foot)
                    <li><a href="{{$foot->link}}">{{$foot->judul}}</a></li>
                @endforeach
                </ul>
              </div>
              <div class="col-md-4 mb-4">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                  <a href="{{App\Contact::where("nama","facebook")->get()->first()->isi}}" class="pl-0 pr-2"><span class="icon-facebook"></span></a>
                  <a href="{{App\Contact::where("nama","twitter")->get()->first()->isi}}" class="pl-3 pr-2"><span class="icon-twitter"></span></a>
                  <a href="{{App\Contact::where("nama","instagram")->get()->first()->isi}}" class="pl-2 pr-2"><span class="icon-instagram"></span></a>
                  <a href="https://www.linkedin.com/in/aezo27" class="pl-2 pr-2"><span class="icon-linkedin"></span></a>
                  <a href="https://www.github.com/Aezo27" class="pl-2 pr-2"><span class="icon-github"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <h2 class="footer-heading mb-4">Maps</h2>
            <iframe src="{{App\Contact::where("nama","maps")->get()->first()->isi}}"
               frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false"
              tabindex="0"></iframe>
          </div>
        </div>
        <div class="row pt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="{{route('home')}}">{{ config('app.name') }}</a> |  All rights reserved. <br> Template by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Edited by <a href="https://aezo27.github.io" target="_blank">Aezo27</a>.
         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
    <div class="backtop" id="ripple"><span class="icon-arrow-up"></span></div>
    <div id="ripple" class="bantuan"> <!-- Chat ke Whatsapp Desktop -->
      <span><a style="color: #fff !important" href="{{App\Contact::where("nama","whatsapp")->get()->first()->isi}}"><i class="icon-whatsapp"></i>&nbspHubungi Kami...</span></a>
    </div>

  </div> <!-- .site-wrap -->

  <script src="{{asset('ikl/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('ikl/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('ikl/js/jquery-ui.js')}}"></script>
  <script src="{{asset('ikl/js/popper.min.js')}}"></script>
  <script src="{{asset('ikl/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('ikl/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('ikl/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('ikl/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('ikl/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('ikl/js/aos.js')}}"></script>
  <script src="{{asset('ikl/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('ikl/js/jquery.sticky.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('ikl/js/flipclock.min.js')}}"></script>
  <script>
    var date = new Date("{{$dis_wid->waktu_selesai}}");
    var now = new Date();
    var diff = (date.getTime() / 1000) - (now.getTime() / 1000);

    var clock = $('.cd100').FlipClock(diff, {
      clockFace: 'DailyCounter',
      countdown: true
    });
  </script>
<!--===============================================================================================-->

  <script src="{{asset('ikl/js/main.js')}}"></script>

  </body>
</html>
