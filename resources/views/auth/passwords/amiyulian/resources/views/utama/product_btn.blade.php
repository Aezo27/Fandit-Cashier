@php
    $fav = json_decode(request()->cookie('my-fav'), true);
@endphp
@if (isset($fav[$prod->id]))
    <form class="add_fav" action="{{ route('fav') }}" method="POST">
        @csrf
        <input type="hidden" name="prod_id" value="{{ $prod->id }}" class="form-control">
        <div class="icon fav idfav{{ $prod->id }}">
            <a id="{{ $prod->id }}" class="del_fav delfav_pi" href="{{route('fav').'/'.$prod->id.'/delete'}}"><i class="icon_heart active" id="user_data2" title="Favorit"></i></a>
        </div>
    </form>
@else
<form class="add_fav" action="{{ route('fav') }}" method="POST">
    @csrf
    <input type="hidden" name="prod_id" value="{{ $prod->id }}" class="form-control">
    <div class="icon fav idfav{{ $prod->id }}">
        <button><i class="icon_heart_alt" title="Favorit"></i></button>
    </div>
</form>
@endif
{{-- <form class="add_cart" action="{{ route('add_cart') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{$prod->id}}" class="form-control">
    <input type="hidden" name="qty" value="1" class="form-control"> --}}
    <ul>
        {{-- <li class="w-icon active"><button><i class="icon_cart_alt" title="Tambah ke keranjang"></i></button></li> --}}
        <li class="quick-view"><a href="{{route('product').'/'.$prod->id}}">+ Lihat Produk</a></li>
    </ul>
{{-- </form> --}}
