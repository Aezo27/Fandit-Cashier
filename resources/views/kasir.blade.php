@extends('layouts.dashboard')
@section('judul', 'Kasir')

@section('content')
  <!-- .app-main -->
  <main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
      <!-- .page -->
      <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{route('home')}}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Kasir Penjualan</a>
                </li>
              </ol>
            </nav><!-- /.breadcrumb -->
            {{-- <!-- floating action -->
            <a href="{{route('gudang.input')}}"><button type="button" class="btn btn-success btn-floated"><span class="fa fa-plus"></span></button></a> <!-- /floating action --> --}}
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Kasir </h1><!-- .btn-toolbar -->
              <div id="dt-buttons" class="btn-toolbar"></div><!-- /.btn-toolbar -->
            </div><!-- /title and toolbar -->
          </header><!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <table style="margin-bottom: 20px;">
                      <tr>
                        <td>Id Transaksi</td>
                        <td>:</td>
                        <td id="id"></td>
                      </tr>
                      <tr>
                        <td>Kasir</td>
                        <td>:</td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td id="tgl"></td>
                      </tr>
                    </table>
                    {{-- <select class="sel-search select2"></select> --}}
                    <!-- .input-group -->
                    <form action="" method="post" id="add">
                      @csrf
                      <div class="input-group has-clearable">
                        <button id="clear-search" type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                        </div>
                        <input type="hidden" id="id_barang" name="barang" val="">
                        <input id="barang-search" type="text" class="form-control" placeholder="Type/ Scan your barcode item" autofocus required>
                        {{-- <input id="barang-search" type="text" onblur="this.focus()" class="form-control" placeholder="Type/ Scan your barcode item" autofocus required> --}}
                      </div><!-- /.input-group -->
                    </form>
                  </div>
                  <div class="col text-right align-self-center">
                    <table class="ml-auto">
                      <tr>
                        <td>
                          Dibayarkan
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          <div class="input-group">
                            <label class="input-group-prepend" for="dibayar">
                              <span class="badge">Rp</span>
                            </label>
                            <input type="number" min="0" class="form-control" value="" name="dibayar" id="dibayar">
                          </div>
                        </td>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Kembalian
                        </td>
                        <td>
                          :
                        </td>
                        <td>
                          <div class="input-group">
                            <label class="input-group-prepend" for="kembalian">
                              <span class="badge">Rp</span>
                            </label>
                            <input type="text" class="form-control" value="" name="kembalian" id="kembalian" readonly>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <h1 class="mb-0">Total</h1>
                        </td>
                        <td>
                          <h1>:</h1>
                        </td>
                        <td>
                          <h1 class="mb-0" data-all="" id="total-all">Rp. 0</h1>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <!-- .card-body -->
              <div class="card-body">
                <div class="dynamic-content">

                </div>
                <div class="form-actions">
                  <a class="btn btn-success" id="simpan" href="javascript:void(0)">Simpan</a>
                  </div>
                </form><!-- /.form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
      </div><!-- /.page -->
    </div>
    @include('layouts.footer')
    <!-- /.wrapper -->
  </main><!-- /.app-main -->
@endsection

@push('custom-js')
    <script>
      $(document).ready(function(){
        function getCokiee() {
          $.ajax({
            url: "{{route('get_kasir')}}",
            dataType: 'json',
            success: function(response){
              console.log(response);
              $('#id').html(response['id']);
              $('#tgl').html(response['tanggal']);
            }
          });
        }

        getCokiee();

        $('#add').on('submit', function(e){
          e.preventDefault();
          $values = $(this).serialize();
          // setTimeout(function() {
          //   if ($('#id_barang').val() == '') {
          //     Toast.fire({
          //         icon: 'error',
          //         title: 'Barang tidak ada didatabase'
          //     });
          //   } else {
          //   }
          // }, 200);
          $.ajax({
            url: "{{route('get_kasir')}}/"+$('#id_barang').val(),
            type: "post",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: $values,
            success: function(response){
              console.log(response);
              setTimeout(function() {
                $('#id_barang').val('');
              }, 300);
              getCokiee();
              table_reload();
            }
          });
        })

        $(document).on('click', '#delete-kasir', function(e){
          e.preventDefault();
          $.ajax({
            url: "delete-kasir/"+$(this).attr('data-id'),
            type: "get",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
              console.log(response);
              getCokiee();
              table_reload();
            }
          });
        })

        $("#barang-search").autocomplete({
          autoFocus: true,
          source: function( request, response ) {
          // Fetch data
          $.ajax({
            url:'{{route("kasir.get_barang")}}',
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            delay: 800,
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
              if (data.length === 1 ) {
                if (data[0].label === $('#barang-search').val() || data[0].kode === $('#barang-search').val()) {
                  $('#id_barang').val(data[0].id);
                  setTimeout(function() {
                    $('#clear-search').trigger('click'); 
                    $('#barang-search').autocomplete('close');
                    if (data[0].stok < 1) {
                      Toast.fire({
                        icon: 'error',
                        title: 'Stok Kosong!!'
                      });
                      return false;
                    }
                    $('#add').submit();
                  }, 200);
                }
              }
            }
          });
        },
        select: function (event, ui) {
          $('#id_barang').val(ui.item.id);
          setTimeout(function() {
            $('#clear-search').trigger('click'); 
            $('#barang-search').autocomplete('close');
            if (ui.item.stok < 1) {
              Toast.fire({
                icon: 'error',
                title: 'Stok Kosong!!'
              });
              return false;
            }
            $('#add').submit();
          }, 200);
           return false;
        }
        });

        function table_reload() {
          $.ajax({
              url: '{{route("get_kasir.datatable")}}',
              method: 'GET',
              success:function(data){
                  $('.dynamic-content').html(data);
                  let total = 0;
                  $('.total').each(function() {
                    total += parseInt($(this).attr('data-total'));
                  })
                  $('#total-all').html('Rp '+(total).toLocaleString('id-ID'))
                  $('#total-all').attr('data-all', total)
              }
          })
        }
        table_reload();

        $(document).on('change', '#dibayar', function(){
          let total = parseInt($('#total-all').attr('data-all'));
          if ($(this).val() >= total) {;
            let kembalian = $(this).val() - total;
            $('#kembalian').val(kembalian);
          }
        });

        $(document).on('change', '.jml', function(){
          let total_harga = 0,
              jml = parseInt($(this).val()),
              total = jml * parseInt($(this).parent().prev().attr('data-harga')),
              id = $(this).attr('data-id');

              $('#dibayar').val('');
              $('#kembalian').val('');
              if (jml > $(this).next().val()) {
                Toast.fire({
                  icon: 'error',
                  title: 'Stok Terbatas!!'
                });
                $(this).val($(this).next().val());
                jml = parseInt($(this).next().val());
                total = jml * parseInt($(this).parent().prev().attr('data-harga'));
                // return false;
              }
          $(this).parent().next().html(total);
          $(this).parent().next().attr('data-total', total);
          $('.total').each(function() {
            total_harga += parseInt($(this).attr('data-total'));
          })
          $('#total-all').html('Rp '+(total_harga).toLocaleString('id-ID'))
          $('#total-all').attr('data-all', total_harga)

          // update
          $.ajax({
            url: "update-kasir/"+id,
            delay: 500,
            type: "post",
            data: {'jumlah': jml},
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
              // table_reload();
              getCokiee();
            }
          });
        });

        $('#simpan').on('click', function(e){
          e.preventDefault();
          $.ajax({
            url: "{{route('simpan_kasir')}}",
            type: "post",
            data: {
              'dibayar': $('#dibayar').val(),
              'kembalian': $('#kembalian').val(),
              'total': $('#total-all').attr('data-all'),
          },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response){
              location.reload();
            }
          });
        });     

        // Select 2 Version
        // let select2 = $('.select2').select2({
        //   minimumInputLength: 3,
        //   closeOnSelect: false,
        //   allowClear: true,
        //   placeholder: 'Type/ Scan your barcode item',
        //   ajax: {
        //     dataType: 'json',
        //     url: '{{route("kasir.get_barang")}}',
        //     delay: 800,
        //     data: function(params) {
        //       return {
        //         search: params.term
        //       }
        //     },
        //     processResults: function (data, page) {
        //       console.log(data);
        //       if (data.length === 1) {
        //         var option = new Option(data[0].text, data[0].id, true, true);
        //         $('.sel-search').append(option).trigger('change').select2("close");
        //         // manually trigger the `select2:select` event
        //         $('.select2').trigger({
        //           type: 'select2:select',
        //           params: {
        //               data: data
        //           }
        //         });
        //       } else {
        //         return {
        //           results: data
        //         };
        //       }
        //     },
        //   }
        // }).on('select2:select', function (evt) {
        //   var data = $(".select2 option:selected").text();
        //   alert("Data yang dipilih adalah "+data);
        // }).on("select2:closing", function(e) {
        //   e.preventDefault();
        // }).on("select2:closed", function(e) {
        //   select2.select2("open");
        // });
        // select2.select2("open");
      });
    </script>
@endpush