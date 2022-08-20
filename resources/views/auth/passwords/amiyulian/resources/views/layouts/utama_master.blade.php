<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sebuah toko yang menyediakan berbagai pakaian muslimah seperti hijab, gamis, dan masih banyak lagi.">
    <meta name="keywords" content="Hijab, Olshop, Gamis, Muslimah">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | @yield('judul')</title>
    <link rel="shortcut icon" href="{{asset('storage/logo.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('utama/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/plugin/sweetalert2-theme-bootstrap-4/sweet-alert-bootstrap-4.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('utama/css/main.css')}}" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <h1 class="mb-0 site-logo">
                                <a href="{{route('home')}}" class="text-black mb-0">
                                    <img src="{{asset('storage/logo_long.png')}}" alt="{{ config('app.name') }} logo" height="70">
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <form action="{{route('search')}}" method="GET">
                            <div class="advanced-search">
                                <select name="cate" class="category-btn p-show">
                                    <option value="">Semua Kategori:</option>
                                    @if (isset($category))
                                        @foreach ($category as $cate)
                                            <option value="{{$cate->id}}">{{$cate->judul}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="input-group">
                                    <input type="text" placeholder="Mencari sesuatu?" name="s" value="{{ old('s') }}" required>
                                    <button type="submit" type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('utama.user')
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Semua Produk</span>
                        <ul class="depart-hover">
                            @if (isset($category))
                                @foreach ($category as $cate)
                                    <li><a href="{{route('category').'?cate='.$cate->id}}">{{$cate->judul}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="@yield('home')"><a href="{{route('home')}}">Beranda</a></li>
                        <li class="@yield('etalase')"><a href="{{route('product')}}">Etalase</a></li>
                        <li class="@yield('contact')"><a href="{{route('contact')}}">Kontak</a></li>
                        <li class="@yield('faq')"><a href="{{route('faq')}}">Faq</a></li>
                        {{-- <li class="drop"><a href="#">Lainnya...</a>
                            <ul class="dropdown">
                                <li class="@yield('#')"><a href="#">Produk</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

  @yield('konten')

  @php
    $partner = DB::table('partner')->get();
    $footlink = DB::table('footer_link')->get();
  @endphp

    <!-- Partner Logo Section Begin -->
    @if (isset($partner))
        <div class="partner-logo">
            <div class="container">
                <div class="logo-carousel owl-carousel">
                    @foreach ($partner as $part)
                    @if ($part->nama!=null)
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            @if ($part->link != null)
                            <a href="{{$part->link}}" target="_blank" rel="noopener noreferrer"><img style="max-height: 54px" src="{{asset('storage/logo_partner/'.$part->logo)}}" alt="{{$part->nama}}"></a>
                            @else
                            <img src="{{asset('storage/logo_partner/'.$part->logo)}}" style="max-height: 54px" alt="{{$part->nama}}">
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <h1 class="site-logo"><a href="{{route('home')}}" class="text-white"><img style="height: 100px" src="{{asset('storage/logo_long.png')}}" alt="{{ config('app.name') }} logo"></a></h1>
                        </div>
                        <ul>
                            <li>{{isset(App\Contact::where('nama','alamat')->get()->first()->isi) ? App\Contact::where('nama','alamat')->get()->first()->isi : ''}}</li>
                        </ul>
                        <div class="footer-social">
                            <a href="{{isset(App\Contact::where("nama","facebook")->get()->first()->isi) ? App\Contact::where('nama','facebook')->get()->first()->isi: '#'}}"><span class="fa fa-facebook"></span></a>
                            <a href="{{isset(App\Contact::where('nama','twitter')->get()->first()->isi) ? App\Contact::where('nama','facebook')->get()->first()->isi: '#'}}"><span class="fa fa-twitter"></span></a>
                            <a href="{{isset(App\Contact::where('nama','instagram')->get()->first()->isi) ? App\Contact::where('nama','facebook')->get()->first()->isi: '#'}}"><span class="fa fa-instagram"></span></a>
                            <a href="https://www.linkedin.com/in/aezo27"><span class="fa fa-linkedin"></span></a>
                            <a href="https://www.github.com/Aezo27"><span class="fa fa-github"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informasi</h5>
                        <ul>
                            @foreach ($footlink as $foot)
                                <li><a href="{{$foot->link}}">{{$foot->judul}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-widget">
                        <h5>Cek Resi</h5>
                        <div class="card-body" style="display: block;">
                            <form action="#" method="get" name="cek_resi" class="cek_resi">
                                <div class="advanced-search">
                                    <select name="kurir" class="category-btn p-show">
                                        <option value="">-- Pilih Kurir --</option>
                                        <option value="jne">JNE</option>
                                        <option value="jnt">J&T</option>
                                        <option value="sicepat">SiCepat</option>
                                        <option value="wahana">Wahana</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                    <div class="input-group">
                                        <input type="text" name="resi" placeholder="No. Resi..." required>
                                        <button type="submit" class="btn btn-warning" type="button">Cek</button>
                                    </div>
                                </div>
                            </form>
                            <div class="resi bg-white p-3">
                                <div class="loading text-center">

                                </div>
                                <div class="hasil-resi">
                                    <table class="hs-head">
                                        <tr>
                                            <td>No Resi</td>
                                            <td>:</td>
                                            <td id="resi"></td>
                                        </tr>
                                        <tr>
                                            <td>Kurir</td>
                                            <td>:</td>
                                            <td id="kurir"></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td id="status"></td>
                                        </tr>
                                    </table>
                                    <div class="hs-body">
                                        <ul id="manifest">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="{{route('home')}}">{{ config('app.name') }}</a> |  All rights reserved. <br> Template by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Edited by <a href="https://aezo27.github.io" target="_blank">Aezo27</a>.
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ripple" class="bantuan"> <!-- Chat ke Whatsapp Desktop -->
            <span><a style="color: #fff !important" href="{{isset(App\Contact::where('nama','whatsapp')->get()->first()->isi) ? App\Contact::where('nama','whatsapp')->get()->first()->isi:'#'}}"><i class="fa fa-whatsapp"></i>&nbspHubungi Kami...</span></a>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('utama/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('utama/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('utama/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('utama/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('utama/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('utama/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('utama/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('utama/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('utama/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('utama/js/api_ongkir.js')}}"></script>
    <script src="{{asset('utama/plugin/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('utama/js/main.js')}}"></script>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }
    </script>
    @yield('javascript')
</body>
</html>
