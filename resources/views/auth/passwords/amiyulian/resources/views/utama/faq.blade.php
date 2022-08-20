@extends('layouts.utama_master')
@section('faq', 'active')
@section('judul', 'Faq')

@section('konten')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('home')}}"><i class="fa fa-home"></i> Beranda</a>
                        <span>FAQ</span>
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
                <div class="col-lg-12">
                    <div class="faq-accordin">
                        <div class="accordion" id="faq">
                            @foreach ($faq as $f)
                            <div class="card">
                                <div class="card-heading @if($loop->first)active @endif">
                                    <a  @if($loop->first)class="active" @endif data-toggle="collapse" data-target="#collapse{{$f->id}}">
                                        {{$f->judul}}
                                    </a>
                                </div>
                                <div id="collapse{{$f->id}}" class="collapse @if($loop->first)show @endif" data-parent="#faq">
                                    <div class="card-body">
                                        <p>{{$f->isi}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq Section End -->s
@endsection
