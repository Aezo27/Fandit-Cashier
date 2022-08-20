<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">
@php
$footlink = DB::table('footer_link')->get();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }} | Order - {{$order->id}}</title>
    <link rel="shortcut icon" href="{{asset('storage/logo.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        a {
            text-decoration: none;
        }

        *[x-apple-data-detectors],
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        .im {
            color: inherit !important;
        }

        img.g-img+div {
            display: none !important;
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>

    <style>
        .primary {
            background: #e7ab3c;
        }

        .bg_white {
            background: #ffffff;
        }

        .bg_light {
            background: #f7fafa;
        }

        .bg_black {
            background: #000000;
        }

        .bg_dark {
            background: rgba(0, 0, 0, .8);
        }

        .email-section {
            padding: 2.5em;
        }

        /*BUTTON*/
        .btn {
            padding: 10px 15px;
            display: inline-block;
        }

        .btn.btn-primary {
            border-radius: 5px;
            background: #e7ab3c;
            color: #ffffff;
        }

        .btn.btn-white {
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }

        .btn.btn-white-outline {
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        .btn.btn-black-outline {
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }

        .btn-custom {
            color: rgba(0, 0, 0, .3);
            text-decoration: underline;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0, 0, 0, .4);
        }

        a {
            color: #e7ab3c;;
        }
        a:hover {
            color: #a96007;;
        }

        table {}

        /*LOGO*/

        .logo h1 {
            margin: 0;
        }

        .logo h1 a {
            color: #e7ab3c;
            font-size: 24px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        /*HERO*/
        .hero {
            position: relative;
            z-index: 0;
        }

        .hero .text {
            color: rgba(0, 0, 0, .3);
        }

        .hero .text h2 {
            color: #000;
            font-size: 34px;
            margin-bottom: 0;
            font-weight: 200;
            line-height: 1.4;
        }

        .hero .text h3 {
            font-size: 24px;
            font-weight: 300;
        }

        .hero .text h2 span {
            font-weight: 600;
            color: #000;
        }

        .text-author {
            bordeR: 1px solid rgba(0, 0, 0, .05);
            margin: 0 20px;
            padding: 2em;
            text-align: center;
        }

        .text-author img {
            border-radius: 50%;
            padding-bottom: 20px;
        }

        .text-author h3 {
            margin-bottom: 0;
            text-transform: uppercase;
            text-align: center;
        }

        ul.social {
            padding: 0;
        }

        ul.social li {
            display: inline-block;
            margin-right: 10px;
        }

        /*FOOTER*/

        .footer {
            border-top: 1px solid rgba(0, 0, 0, .05);
            color: rgba(0, 0, 0, .5);
        }

        .footer .heading {
            color: #fff;
            font-size: 20px;
        }

        .footer ul {
            margin: 0;
            padding: 0;
        }

        .footer ul li {
            list-style: none;
            margin-bottom: 10px;
        }

        .footer ul li a, .text {
            color: #fff;
        }
        .sosmed {
            display: flex;
            text-align: center
        }
        .sosmed li{
            padding-right: 20px;
        }
        .or-id {
            text-align: left;
            margin: 0 !important;
        }
        h1 img {
            left: -5px;
            top: 8px;
            position: relative;
        }
        .text {
            text-align: center
        }
        table td {
            vertical-align: top;
        }


        @media screen and (max-width: 500px) {}
    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
        <div
            style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <!-- BEGIN BODY -->
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: center;">
                                    <h1><a href="{{route('home')}}"><img src="{{asset('storage/logo_long.png')}}" alt="{{ config('app.name') }} logo" height="70"></a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em;">
                                    <div class="text">
                                        <h3>Berikut adalah kode resi anda.</h3>
                                    </div>
                                    <div class="isi">
                                        {{-- <p>Halo, {{$order->nama_penerima}}.</p> --}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-author">
                                        <h1 class="name">{{$order->no_resi}}</h1>
                                        <p>klik tombol dibawah ini untuk kembali ke halaman order</p>
                                        <a href="{{route('product')}}/payment/{{$order->id}}" class="btn btn-primary">Cek Order</a>
                                        <p style="text-align: left">jika terdapat masalah pada tombol diatas silahkan klik link dibawah ini.</p>
                                        <p style="text-align: left"><a href="{{route('product')}}/payment/{{$order->id}}">Order #{{$order->id}}</a>.</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <!-- 1 Column Text + Button : END -->
            </table>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin: auto;">
                <tr>
                    <td valign="middle" class="bg_dark footer email-section">
                        <table>
                            <tr>
                                <td valign="top" width="50%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                <h3 class="heading">Contact Info</h3>
                                                <ul>
                                                    <li><span
                                                            class="text">{{App\Contact::where("nama","alamat")->get()->first()->isi}}</span>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="50%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-right: 10px;">
                                                <h3 class="heading">Link</h3>
                                                <ul>
                                                    @foreach ($footlink as $foot)
                                                    <li><a href="https://{{$foot->link}}">{{$foot->judul}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end: tr -->
                <tr>
                    <td class="bg_light" style="text-align: center;">
                        <p>Copyright &copy; 2020 | <a href="{{route('home')}}">{{ config('app.name') }}</a> | All rights reserved.
                        </p>
                    </td>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>
