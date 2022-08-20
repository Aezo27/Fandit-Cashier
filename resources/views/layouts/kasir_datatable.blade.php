<div class="table-responsive">
  <table id="kasir-list" class="table table-striped">
    <!-- thead -->
    <thead>
      <tr>
        <th> No </th>
        <th style="min-width:200px"> Nama </th>
        <th> Harga</th>
        <th style="width:100px"> Jumlah</th>
        <th> Total</th>
        <th style="width:10%"></th>
      </tr>
    </thead><!-- /thead -->
    <!-- tbody -->
    <tbody>
      <!-- create empty row to passing html validator -->
      @if ($datas != null)
        @foreach ($datas as $data)
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$data['nama']}}</td>
            <td class="harga" data-harga="{{$data['harga_jual']}}">{{$data['harga_jual']}}</td>
            <td class="jumlah">
              <input type="number" class="form-control jml" id="tf2" min="0" max="30" step="1" data-id="{{$data['id']}}" name="jml" value="{{$data['jumlah']}}" placeholder="">
              <input type="hidden" value="{{$data['stok']}}">
            </td>
            <td style="font-weight: bold" data-total="{{$data['total']}}" class="total">{{$data['total']}}</td>
            <td style="display: flex"><a href="javascript:void(0)" id="delete-kasir" data-id="{{$data['id']}}" class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-times"></i></a></td>
          </tr>
          @endforeach
        @endif
    </tbody><!-- /tbody -->
  </table><!-- /.table -->
</div>