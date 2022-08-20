/*  ---------------------------------------------------
    Template Name: Fashi
    Description: Fashi eCommerce HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com/
    Editor: Aezo27
    Editor URI: https://aezo27.github.io/
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

$(document).ready(function ($){
/*//////////////////////////////////////////////////////////////////
[ Preloader ]*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

/*//////////////////////////////////////////////////////////////////
[ Background Set ]*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

/*//////////////////////////////////////////////////////////////////
[ Navigation ]*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });
    $('.produts-sidebar-filter').children().clone().appendTo('#sidenav_target');

/*//////////////////////////////////////////////////////////////////
[ Hero Slider ]*/
    var owl;
    owl = $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoplayTimeout: 7000,
        autoHeight: false,
        autoplay: true,
    });
    owl.on('changed.owl.carousel', function (e) {
        owl.trigger('stop.owl.autoplay');
        owl.trigger('play.owl.autoplay');
    });

/*//////////////////////////////////////////////////////////////////
[ Product Slider ]*/
   $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 3,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplayHoverPause: true,
        autoplay: false,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

/*//////////////////////////////////////////////////////////////////
[ logo Carousel ]*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        rewind: true,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

/*//////////////////////////////////////////////////////////////////
[ Product Single Slider ]*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        rewind: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
    });

/*//////////////////////////////////////////////////////////////////
[ Language Flag jse ]*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });

/*//////////////////////////////////////////////////////////////////
[ Range Slider ]*/
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	    rangeSlider.slider({
		range: true,
		min: minPrice,
        max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('$' + ui.values[0]);
			maxamount.val('$' + ui.values[1]);
		}
	});
	minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

/*//////////////////////////////////////////////////////////////////
[ Radio Btn ]*/
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });

/*//////////////////////////////////////////////////////////////////
[ Nice Select ]*/
    $('.sorting, .p-show').niceSelect();

/*//////////////////////////////////////////////////////////////////
[ Single Product ]*/
	$('.product-thumbs-track .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});

    // $('.product-pic-zoom').zoom();


/*//////////////////////////////////////////////////////////////////
[ Quantity change ]*/
    function qty_change() {
        $(document).on('click', '.qtybtn', function () {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            var harga = $button.parent().parent().find('input[name="harga"]').val();
            var id = $button.parent().parent().find('input[name="product_id[]"]').val();
            var stock = parseInt($button.parent().parent().find('input[name="stock"]').val());
            if ($button.hasClass('inc')) {
                if (oldValue < stock) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    var newVal = oldValue;
                }
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            var total = newVal*harga;
            var newTotal = 'Rp. ' + total.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
            $('#brg'+id).html(newTotal);
            $button.parent().find('input').val(newVal);
        });
    };
    qty_change();
/*//////////////////////////////////////////////////////////////////
[ Upload Image ]*/
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#gambar').attr('src', e.target.result);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#myFile").change(function () {
        if (this.files[0].size > 2000000) {
            $(this).val('')
            Swal.fire({
                title: 'File Terlalu Besar',
                type: 'error',
                confirmButtonColor: '#d47e00',
            });
        } else {
            readURL(this);
        }
    });
/*//////////////////////////////////////////////////////////////////
[ Reseller Section ]*/
    $(document).on('change', '#acc-reseller', function (e) {
        if (this.checked) {
            $(".res").show();
        } else {
            $(".res").hide();
        }
    });

/*//////////////////////////////////////////////////////////////////
[ Custom File Input ]*/
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

/*//////////////////////////////////////////////////////////////////
// [ Show-cart ]*/
    var openCart = function () {
        $(".cart-hover").toggleClass("active");
        $(".fav-hover").removeClass("active");
    }
    var closeCart = function () {
        $(".cart-hover").removeClass("active");
    }
    var openFav = function () {
        $(".fav-hover").toggleClass("active");
        $(".cart-hover").removeClass("active");
    }
    var closeFav = function () {
        $(".fav-hover").removeClass("active");
    }
    $(document).on('click', '.open-cart', function (event) {
        event.stopPropagation();
        openCart()
    });
    $(document).on('click', '.open-fav', function (event) {
        event.stopPropagation();
        openFav();
    });
    $(document).on('click', function (event) {
        if (!$(event.target).closest('.cart-hover').length && !$(event.target).closest('.fav-hover').length) {
            closeFav();
            closeCart();
        }
    });

 /*//////////////////////////////////////////////////////////////////
[ Slidenav JS ]*/
    $(document).on('click', '[data-toggle="filter-collapse"]',function() {
        event.stopPropagation();
        var navMenuCont = $($(this).data('target'));
        navMenuCont.animate({
            'width': 'toggle'
        }, 350);
    });
    $(document).on('click', function (event) {
        event.stopPropagation();
        if (!$(event.target).closest('.sidenav').length && !$(event.target).closest('.filter-btn').length) {
            if ($(".sidenav").is(":visible")) {
                $(".filter-btn").trigger("click");
            }
        }
    });
    $(".tutup").on('click', function(event) {
        event.stopPropagation();
        $(".filter-btn").trigger("click");
    });

/*//////////////////////////////////////////////////////////////////
[ Sweet-Alert ]*/
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });


/*//////////////////////////////////////////////////////////////////
[ Cart-Fav ]*/
    $('.cariReseller').select2({
        placeholder: 'Masukkan id reseller',
        ajax: {
            url: '/reseller',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama_toko,
                            id: item.nama_toko
                        }
                    })
                };
            },
            cache: true
        }
    });
/*//////////////////////////////////////////////////////////////////
[ Cart-Fav ]*/
    var base = window.location.origin;
    var url = base+'/cart/add';
    var url2 = base+'/fav';
    var url3 = base+'/cart/update';
    $(document).on('submit', '.add_cart', function (e) {
        e.preventDefault();
        var cart_id = $(this).find('.icon_cart_alt');
        $.ajax({
            url: url,
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $(this).serialize(),
            beforeSend: function () {
                $(cart_id).replaceWith('<div class="spin"><i style="display=block;" class="icon_loading"></i></div>');
            },
            success: function (response) {
                $('.spin').replaceWith('<i class="icon_cart_alt" title="Tambah ke keranjang"></i>');
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.shopping-cart').load(' .shopping-cart  > *');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil ditambahkan ke keranjang.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal ditambahkan ke keranjang.'
                    });
                }
            },
            error: function () {
                Toast.fire({
                    type: 'error',
                    title: ' Stok terbatas'
                });
            },
        });
    });
    $(document).on('submit', '.add_fav', function (e) {
        e.preventDefault();
        var prod_id = $(this).find('input[name="prod_id"]').val();
        $.ajax({
            url: url2,
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $(this).serialize(),
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.idfav' + prod_id).replaceWith('<div class="icon fav idfav' + prod_id + '"><a id=' + prod_id + ' class="del_fav delfav_pi" href="' + url2 + '/' + prod_id + '/delete"><i class="icon_heart active" title="Favorit"></i></a></div>');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil ditambahkan ke favorit.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal ditambahkan ke favorit.'
                    });
                }
            }
        });
    });
    $(document).on('click', '.del_fav', function (e) {
        var url = $(this).attr('href');
        var prod_id2 = $(this).attr('id');
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'get',
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.idfav' + prod_id2).replaceWith('<div class="icon fav idfav' + prod_id2 + '"><button><i class="icon_heart_alt" title="Favorit"></i></button></div>');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil dihapus dari favorit.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal dihapus dari favorit.'
                    });
                }
            }
        });
    });
    $(document).on('click', '.del_cart', function (e) {
        e.preventDefault();
        var url2 = $(this).attr('href');
        $.ajax({
            url: url2,
            type: 'get',
            data: $(this).serialize(),
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.shopping-cart').load(' .shopping-cart  > *');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil dihapus dari keranjang.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal dihapus dari keranjang.'
                    });
                }
            }
        });
    });
    $(document).on('click', '.del_fav2', function (e) {
        var url = base + '/fav/clear';
        var prod_id = $(this).find('input[name="prod_id"]').val();
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'get',
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.delfav_pi').replaceWith('<button><i class="icon_heart_alt" title="Favorit"></i></button>');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil membersihkan favorit.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal membersihkan favorit.'
                    });
                }
            }
        });
    });
    $(document).on('click', '.del_cart2', function (e) {
        e.preventDefault();
        var url2 = $(this).attr('href');
        $.ajax({
            url: url2,
            type: 'get',
            data: $(this).serialize(),
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.shopping-cart').load(' .shopping-cart  > *');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil dihapus dari keranjang.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal dihapus dari keranjang.'
                    });
                }
            }
        });
    });
    $(document).on('submit', '.update_cart', function (e) {
        e.preventDefault();
        var prod_id = $(this).find('input[name="prod_id"]').val();
        $.ajax({
            url: url3,
            type: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $(this).serialize(),
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.shopping-cart').load(' .shopping-cart  > *');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil update keranjang.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal update keranjang.'
                    });
                }
            }
        });
    });
    $(document).on('click', '.clearCart', function (e) {
        e.preventDefault();
        var urlNew = base + '/cart/clear';
        $.ajax({
            url: urlNew,
            type: 'get',
            data: $(this).serialize(),
            success: function (response) {
                if (response) {
                    $('#user_data').load(' #user_data > *');
                    $('.shopping-cart').load(' .shopping-cart  > *');
                    Toast.fire({
                        type: 'success',
                        title: ' Berhasil mebersihkan keranjang.'
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Gagal mebersihkan keranjang.'
                    });
                }
            }
        });
    });

/*//////////////////////////////////////////////////////////////////
[ Voucher ]*/
    $(document).on('click', '#voucher', function (e) {
        e.preventDefault();
        var toppr = parseInt($("#ongkir").attr('nilai'));
        var kode_voucher = $('input[name="kupon"]').val();
        var urlVoucher = base + '/voucher/'+kode_voucher;
        if (typeof $("option:selected", "select[name=layanan]").attr('harga') != 'undefined') {
            var harga = parseInt($("option:selected", "select[name=layanan]").attr('harga'));
        } else {
            var harga = 0;
        }
        $.ajax({
            url: urlVoucher,
            type: 'get',
            dataType: 'json',
            success: function (json) {
                $('input[name="kode_voucher"]').val(json['kode']);
                // $('.disc').remove();
                if (json['potongan']!=null) {
                    $('input[name="diskon"]').val();
                    var diskon = toppr - parseInt(json['potongan']) + harga;
                    $('#diskon').replaceWith('<li id="diskon" class="fw-normal">Diskon <span>Rp. -' + parseInt(json['potongan']).toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 })+'</span></li>')
                    $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + diskon.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
                }
                if (json['persen']!=null){
                    var perdis = toppr * (parseInt(json['persen'])/100);
                    $('input[name="diskon"]').val(perdis);
                    var diskon = toppr - perdis + harga;
                    $('#diskon').replaceWith('<li id="diskon" class="fw-normal">Diskon <span>Rp. -' + perdis.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 })+'</span></li>')
                    $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + diskon.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
                }
                Toast.fire({
                    type: 'success',
                    title: ' Voucher berhasil digunakan'
                });
            },
            error: function () {
                Toast.fire({
                    type: 'error',
                    title: ' Voucher tidak bisa dipakai'
                });
            },
        });
    });

/*//////////////////////////////////////////////////////////////////
[ Disable Inspect ]*/
//     $(document).bind("contextmenu",function(e) {
//         return false;
//    });
   document.onkeydown = function(e) {
        if(event.keyCode == 123) {
        return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        return false;
        }
    }
});
