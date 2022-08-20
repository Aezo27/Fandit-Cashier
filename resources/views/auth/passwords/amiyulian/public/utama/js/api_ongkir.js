/*
    Project: Olshop
    Author: Aezo27
    Start: 08 Juni 2020
    https://aezo27.github.io/
*/
// Api by https://rajaongkir.com
// Script by to Aezo27

$(document).ready(function () {
    var toppr = parseInt($("#ongkir").attr('nilai'));
    $(document).on('change','#provinsi', function() {
        var provinsi = $("#provinsi").val();
        var namaprov = ($("option:selected", "select[name=provinsi]").attr('namaprovinsi'));
        var namakota = ($("option:selected", "select[name=kabupaten]").attr('namakota'));
        $('input[name=prov]').val(namaprov);
        $('input[name=kab]').val(namakota);
        var diskon = parseInt($('input[name=diskon]').val());
        var td = toppr - diskon;
        if (provinsi != "") {
            $.ajax({
                url: '/kota/'+provinsi,
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $('#kabupaten').html('<option value="">-- Pilih Kota/Kabupaten --</option>');
                    $('#kecamatan').html('');
                    $('#layanan').html('');
                    $('#kurir').val('');
                    $("input[name=ongkir]").val(0);
                    $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
                    $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
                    for (i = 0; i < Object.keys(json).length; i++) {
                        $('#kabupaten').append($('<option>').text(json[i].city_name).attr({value: json[i].city_id, namakota: json[i].city_name}));
                        $('.p-show').niceSelect('update');
                        var namaprov = ($("option:selected", "select[name=provinsi]").attr('namaprovinsi'));
                        var namakota = ($("option:selected", "select[name=kabupaten]").attr('namakota'));
                        $('input[name=prov]').val(namaprov);
                        $('input[name=kab]').val(namakota);
                    }
                }
            });
        } else {
            $('#kabupaten').html('');
            $('#kecamatan').html('');
            $('#layanan').html('');
            $('#kurir').val('');
            $("input[name=ongkir]").val(0);
            $('#layanan').html('');
            $('.p-show').niceSelect('update');
            $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
            $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
        }
    });
    $(document).on('change','#kabupaten', function() {
        var kabupaten = $("#kabupaten").val();
        var namakota = ($("option:selected", "select[name=kabupaten]").attr('namakota'));
        var namakec = ($("option:selected", "select[name=kecamatan]").attr('namakec'));
        $('input[name=kab]').val(namakota);
        $('input[name=kec]').val(namakec);
        var diskon = parseInt($('input[name=diskon]').val());
        var td = toppr - diskon;
        if (kabupaten != "") {
            $.ajax({
                url: '/kota/'+kabupaten+'/kec',
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                    $("input[name=ongkir]").val(0);
                    $('#layanan').html('');
                    $('#kurir').val('');
                    $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
                    $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
                    for (i = 0; i < Object.keys(json).length; i++) {
                        $('#kecamatan').append($('<option>').text(json[i].subdistrict_name).attr({value: json[i].subdistrict_id, namakec: json[i].subdistrict_name}));
                        $('.p-show').niceSelect('update');
                        var namakota = ($("option:selected", "select[name=kabupaten]").attr('namakota'));
                        var namakec = ($("option:selected", "select[name=kecamatan]").attr('namakec'));
                        $('input[name=kab]').val(namakota);
                        $('input[name=kec]').val(namakec);
                    }
                }
            });
        } else {
            $('#kecamatan').html('');
            $('#kurir').val('');
            $("input[name=ongkir]").val(0);
            $('#layanan').html('');
            $('.p-show').niceSelect('update');
            $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
            $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
        }
    });
    $(document).on('change','#kecamatan', function() {
        var diskon = parseInt($('input[name=diskon]').val());
        var td = toppr - diskon;
        var namakec = ($("option:selected", "select[name=kecamatan]").attr('namakec'));
        $('input[name=kec]').val(namakec);
        $("input[name=ongkir]").val(0);
        $('#kurir').val('');
        $('#layanan').html('');
        $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
        $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
        // $('#pos').html($('<option>').text(clean[kecamatan].kodepos).attr('value', clean[kecamatan].kodepos));
        $('.p-show').niceSelect('update');
    });
    $(document).on('change', '#kurir', function () {
        var origin = 445;
        var destination = $("select[name=kecamatan]").val();
        var courier = $("select[name=kurir]").val();
        var weight = $("#berat").val();
        var diskon = parseInt($('input[name=diskon]').val());
        var td = toppr - diskon;
        if (courier != '') {
            jQuery.ajax({
                url: "/origin=" + origin + "&originType=city&destination=" + destination + "&destinationType=subdistrict&weight=" + weight + "&courier=" + courier,
                type: 'GET',
                dataType: 'json',
                success: function (json) {
                    $('#layanan').html('<option value="">-- Pilih Layanan --</option>');
                    var namaprov = ($("option:selected", "select[name=provinsi]").attr('namaprovinsi'));
                    var namakota = ($("option:selected", "select[name=kabupaten]").attr('namakota'));
                    $('input[name=prov]').val(namaprov);
                    $('input[name=kab]').val(namakota);
                    // $('#ongkir').prepend($('<option>').text(json[i].city_name).attr('value', json[i].city_id, 'namakota', json[i].city_name));
                    // ini untuk looping data result nya
                    $.each(json, function (key, value) {
                        // ini looping data layanan misal jne reg, jne oke, jne yes
                        $.each(value.costs, function (key1, value1) {
                            // ini untuk looping cost nya masing masing
                            // silahkan pelajari cara menampilkan data json agar lebi paham
                            $.each(value1.cost, function (key2, value2) {
                                $('#layanan').append('<option harga="' + value2.value + '" value="' + value1.service + ' - ' + value2.etd + ' Hari Kerja">' + value1.service + ' - ' + value2.etd + ' Hari Kerja, Rp. ' + value2.value.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</option>');
                                $('.p-show').niceSelect('update');
                                $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
                                $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
                            });
                        });
                    });
                }
            });
        } else {
            $('#kurir').val('');
            $('#layanan').html('');
            $("input[name=ongkir]").val(0);
            $('.p-show').niceSelect('update');
            $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
            $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span>  Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
        }
    });
    $(document).on('change', '#layanan', function () {
        if ($("select[name=kurir]").val()=='jnt') {
            var jenis = 'J&T: '+$("select[name=layanan]").val();
        } else {
            var jenis = $("select[name=kurir]").val()+': '+$("select[name=layanan]").val();
        }
        var jenis2 = jenis.toUpperCase();
        var harga = parseInt($("option:selected", "select[name=layanan]").attr('harga'));
        $("input[name=ongkir]").val(harga);
        $('input[name=kur]').val(jenis2);
        var diskon = parseInt($('input[name=diskon]').val());
        var td = toppr - diskon;
        var toppr2 = td + harga;
        if (jenis != "") {
            $('#kur').replaceWith('<li class="fw-normal" id="kur">' + jenis2 + ' <span> Rp. ' + harga.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) +'</span></li>');
            $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span> Rp. ' + toppr2.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
            $('.p-show').niceSelect('update');
        } else {
            $('#layanan').html('<option value="">-- Pilih Layanan --</option>');
            $('.p-show').niceSelect('update');
            $('#kur').replaceWith('<li id="kur" class="fw-normal">Kurir <span>Rp. 0</span></li>');
            $('#ongkir').replaceWith('<li id="ongkir" class="total-price" nilai=' + toppr + '>Total <span> Rp. ' + td.toLocaleString('id-ID', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + '</span></li>');
        }
    });
    $(document).on('submit', '.cek_resi', function (e) {
        e.preventDefault();
        var waybill = $("input[name=resi]").val();
        var courier = $("select[name=kurir]").val();
        if (courier != '') {
            jQuery.ajax({
                url: "waybill="+ waybill + "&courier=" + courier,
                type: 'GET',
                dataType: 'json',
                beforeSend:function(){
                    $(".resi").show();
                    $(".loading").show();
                    $(".loading").html('<span style="font-weight: bold">Menyambungkan ke server...</span>')
                    $('.hasil-resi').hide();
                    $('#manifest').html('');
                },
                success: function (json) {
                    $('.loading').hide();
                    $('.hasil-resi').show();
                    $('#resi').replaceWith('<td id="no-resi">'+ json['summary']['waybill_number'] +'</td>');
                    $('#kurir').replaceWith('<td id="no-resi">'+ json['summary']['courier_code'] +'</td>');
                    $('#status').replaceWith('<td id="no-resi">'+ json['summary']['status'] +'</td>');
                    for (i = 0; i < Object(json['manifest']).length; i++) {
                        $('#manifest').append('<li>['+ json['manifest'][i]['manifest_date']+' '+ json['manifest'][i]['manifest_time']+'] '+json['manifest'][i]['manifest_description']+': '+ json['manifest'][i]['city_name']  +'</li>');
                    }
                },
                error: function () {
                    $('.loading').html('<span style="font-weight: bold">Tidak ditemukan...</span>');
                },
            });
        }
    });
});
