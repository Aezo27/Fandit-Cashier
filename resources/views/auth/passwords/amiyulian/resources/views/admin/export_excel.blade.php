<h1>DATA PENJUALAN AMI YULIAN HIJAB {{isset($startDate) ?  $startDate.' - '.$endDate: ''}}</h1>
<br>
<br>
<table>
    <thead>
    <tr>
        <th><b>No</b></th>
        <th><b>Tanggal</b></th>
        <th><b>ID Order</b></th>
        <th><b>Barang</b></th>
        <th><b>Jumlah</b></th>
        <th><b>Total</b></th>
      </tr>
    </thead>
    <tbody>
    @foreach($datajuals as $datajual)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $datajual->created_at->format('d-m-Y') }}</td>
            <td>{{ $datajual->order_id }}</td>
            <td>{{ $datajual->barang }}</td>
            <td>{{ $datajual->jumlah }}</td>
            <td>{{ $datajual->total }}</td>
        </tr>
    @endforeach
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>{{$datajuals->sum('total')}}</b></td>
        </tr>
    </tbody>
</table>