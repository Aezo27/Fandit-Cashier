<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangPenjualan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
      /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $this->set_kasir(null);
    
    $barangs =  Barang::all();
    return view('kasir', compact('barangs'));
  }

  public function set_kasir($id_barang)
  {
    $lifetime = time() + 60 * 60 * 24 * 365;// one year
    $id = hexdec(uniqid());
    $tanggal = Carbon::now();

    if (Cookie::get('transaksi') == null) {
       $data=[
         'id'=>$id,
         'tanggal'=>$tanggal->isoFormat('D MMMM Y'),
         'barang' => []
        ];
       $array_json=json_encode($data);
      Cookie::queue('transaksi', $array_json, $lifetime);
      return 'Data telah ditambahkan';
    } else {
      if ($id_barang != null) {
        $data = json_decode(Cookie::get('transaksi'), true);
        $barang =  Barang::where('id', $id_barang)->first();
  
        $data['barang'][$id_barang]= [
          "id" => $barang->id,
          "nama" => $barang->nama_barang,
          "kode" => $barang->kode_scan,
          "jumlah" => 1,
          "harga_jual" => $barang->harga_jual,
          "stok" => $barang->stok,
          "total" => $barang->harga_jual * 1
        ];
        $array_json=json_encode($data);
        Cookie::queue('transaksi', $array_json, $lifetime);
        return [
          'status'     => 'Data telah ditambahkan',
        ];
      }
      return 'Data telah ditambahkan';
    }
  }

  public function update_kasir(Request $request,$id_barang)
  {
    $lifetime = time() + 60 * 60 * 24 * 365;// one year
    $data = json_decode(Cookie::get('transaksi'), true);
    $barang =  Barang::where('id', $id_barang)->first();

    $data['barang'][$id_barang]= [
      "id" => $barang->id,
      "nama" => $barang->nama_barang,
      "kode" => $barang->kode_scan,
      "jumlah" => $request->jumlah,
      "harga_jual" => $barang->harga_jual,
      "stok" => $barang->stok,
      "total" => $barang->harga_jual * $request->jumlah
    ];
    $array_json=json_encode($data);
    Cookie::queue('transaksi', $array_json, $lifetime);
    return [
      'status'     => 'Data telah ditambahkan',
    ];
  }

  public function delete_kasir($id_barang)
  {
    $lifetime = time() + 60 * 60 * 24 * 365;// one year
    $data = json_decode(Cookie::get('transaksi'), true);

    if ($data['barang'][$id_barang]!=null) {
      unset($data['barang'][$id_barang]);
    }

    $array_json=json_encode($data);
    Cookie::queue('transaksi', $array_json, $lifetime);
    return [
      'status'     => 'Data telah Dihapus',
    ];
  }

  public function get_kasir()
  {
    if (Cookie::get('transaksi') == null) {
      $this->set_kasir(null);
    } else {
      return Cookie::get('transaksi');
    }
  }

  public function get_kasir_datatable()
  {
    $kasirs = json_decode($this->get_kasir(), true);
    $datas = $kasirs['barang'] != null ? $kasirs['barang'] : null;
    return view('layouts.kasir_datatable', compact('datas'));
  }

  public function get_barang(Request $request)
  {
    $records = Barang::where('nama_barang', 'like', '%' . $request->search . '%')
              ->orWhere('kode_scan', 'like', '%' . $request->search . '%')
              ->whereNull('deleted_at')
              ->get();
    $data_arr = array();
    foreach ($records as $record) {
      $id = $record->id;
      $nama_barang = $record->nama_barang;
      $kode = $record->kode_scan;
      $harga = $record->harga_jual;
      $stok = $record->stok;

      $data_arr[] = array(
        "id" => $id,
        "text" => $nama_barang,
        "kode" => $kode,
        "label" => $nama_barang,
        "harga_jual" => $harga,
        "stok" => $stok
      );
    }
    return json_encode($data_arr);
  }

  public function simpan_kasir(Request $req)
  {
    $data = json_decode($this->get_kasir());
    DB::beginTransaction();
    try {
      $add = new Penjualan();
      $add->user_id   = Auth::user()->id;
      $add->total     = $req->total == null ? 0 : $req->total;
      $add->bayar     = $req->dibayar == null ? 0 : $req->dibayar;
      $add->kembalian = $req->kembalian == null ? 0 : $req->kembalian;
      $add->unique_id = $data->id;
      $add->save();

      foreach ($data->barang as $barang) {
        $bp =  new BarangPenjualan();
        $bp->barang_id= $barang->id;
        $bp->penjualan_id= $add->id;
        $bp->jumlah= $barang->jumlah;
        $bp->total_harga= $barang->total;
        $bp->save();
        // update stok
        $stok = Barang::where('id', $barang->id)->first();
        $stok->stok = $stok->stok - $barang->jumlah;
        $stok->save(); 
      }


      Cookie::queue(
        Cookie::forget('transaksi')
      );
      DB::commit();
      return [
        'notif'     => 'Berhasil disimpan',
        'alert'     => 'success'
      ];
    } catch (\Exception $e) {
      DB::rollback();
      return [
        'notif'     => 'Gagal disimpan!',
        'alert'     => 'error'
      ];
    }
  }
}