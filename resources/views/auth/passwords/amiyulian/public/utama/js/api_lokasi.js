/*
    Project: Olshop
    Author: Aezo27
    Start: 08 Juni 2020
    https://aezo27.github.io/
*/
// Open Api by to https://github.com/bachors/apiapi#kode-pos-api
// Script by to Aezo27

$(document).ready(function() {
    $.ajax({
        url: 'https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty',
        type: 'GET',
        dataType: 'json',
        success: function(json) {
                for (i = 1; i < Object.keys(json).length; i++) {
                    var prov = "p"+i;
                    $('#provinsi').append($('<option>').text(json[prov]).attr('value', prov));
                    $('.p-show').niceSelect('update');
                }
            }
    });
    $("#provinsi").change(function() {
        var provinsi = $("#provinsi").val();
        if (provinsi != "") {
            $.ajax({
                url: 'https://kodepos-2d475.firebaseio.com/list_kotakab/' + provinsi + '.json?print=pretty',
                type: 'GET',
                cache: false,
                dataType: 'json',
                success: function (json) {
                    $("#kabupaten").html('');
                    for (i = 0; i < Object.keys(json).length; i++) {
                        $('#kabupaten').append($('<option>').text(Object.values(json)[i]).attr('value', Object.keys(json)[i]));
                        $('.p-show').niceSelect('update');
                    }
                }
            });
        } else {
            $('#kabupaten').html('<option value="">-- Pilih Kota/Kabupaten --</option>');
            $('.p-show').niceSelect('update');
        }
    });
    clean = [];
    $("#kabupaten").change(function() {
        var kabupaten = $("#kabupaten").val();
        $.ajax({
            url: 'https://kodepos-2d475.firebaseio.com/kota_kab/'+kabupaten+'.json?print=pretty',
            type: 'GET',
            cache: false,
            dataType: 'json',
            success: function (json) {
                $("#kecamatan").html('');
                arr1 = [];
                ids = [];
                for (i = 0; i < Object.keys(json).length; i++) {
                    arr1[i] = {
                        kecamatan: json[i].kecamatan, kodepos: json[i].kodepos
                    };
                }
                $.each(arr1, function (index, value) {
                    if ($.inArray(value.kecamatan, ids) == -1) {
                        ids.push(value.kecamatan);
                        clean.push(value);
                    }
                });
                for (i = 0; i < Object.keys(clean).length; i++) {
                    $('#kecamatan').append($('<option>').text(clean[i].kecamatan).attr('value', i));
                    $('.p-show').niceSelect('update');
                }
            }
        });
    });
    $("#kecamatan").change(function () {
        var kecamatan = $("#kecamatan").val();
        $('#pos').html($('<option>').text(clean[kecamatan].kodepos).attr('value', clean[kecamatan].kodepos));
        $('.p-show').niceSelect('update');
    });
});
