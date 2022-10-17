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
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

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
    $lifetime = time() + 60 * 60 * 24 * 365; // one year
    $id = hexdec(uniqid());
    $tanggal = Carbon::now();

    if (Cookie::get('transaksi') == null) {
      $data = [
        'id' => $id,
        'tanggal' => $tanggal->isoFormat('D MMMM Y'),
        'barang' => []
      ];
      $array_json = json_encode($data);
      Cookie::queue('transaksi', $array_json, $lifetime);
      return 'Data telah ditambahkan';
    } else {
      if ($id_barang != null) {
        $data = json_decode(Cookie::get('transaksi'), true);
        $barang =  Barang::where('id', $id_barang)->first();

        $data['barang'][$id_barang] = [
          "id" => $barang->id,
          "nama" => $barang->nama_barang,
          "kode" => $barang->kode_scan,
          "jumlah" => 1,
          "harga_jual" => $barang->harga_jual,
          "stok" => $barang->stok,
          "total" => $barang->harga_jual * 1
        ];
        $array_json = json_encode($data);
        Cookie::queue('transaksi', $array_json, $lifetime);
        return [
          'status'     => 'Data telah ditambahkan',
        ];
      }
      return 'Data telah ditambahkan';
    }
  }

  public function update_kasir(Request $request, $id_barang)
  {
    $lifetime = time() + 60 * 60 * 24 * 365; // one year
    $data = json_decode(Cookie::get('transaksi'), true);
    $barang =  Barang::where('id', $id_barang)->first();

    $data['barang'][$id_barang] = [
      "id" => $barang->id,
      "nama" => $barang->nama_barang,
      "kode" => $barang->kode_scan,
      "jumlah" => $request->jumlah,
      "harga_jual" => $barang->harga_jual,
      "stok" => $barang->stok,
      "total" => $barang->harga_jual * $request->jumlah
    ];
    $array_json = json_encode($data);
    Cookie::queue('transaksi', $array_json, $lifetime);
    return [
      'status'     => 'Data telah ditambahkan',
    ];
  }

  public function delete_kasir($id_barang)
  {
    $lifetime = time() + 60 * 60 * 24 * 365; // one year
    $data = json_decode(Cookie::get('transaksi'), true);

    if ($data['barang'][$id_barang] != null) {
      unset($data['barang'][$id_barang]);
    }

    $array_json = json_encode($data);
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

      $items = [];

      foreach ($data->barang as $barang) {
        $namaBarang =  Barang::where('id', $barang->id)->first()->nama_barang;
        $bp =  new BarangPenjualan();
        $bp->barang_id = $barang->id;
        $bp->penjualan_id = $add->id;
        $bp->jumlah = $barang->jumlah;
        $bp->total_harga = $barang->total;
        $bp->save();
        // update stok
        $stok = Barang::where('id', $barang->id)->first();
        $stok->stok = $stok->stok - $barang->jumlah;
        $stok->save();

        // looping ke item
        $items[] = [
          'name' => $namaBarang,
          'qty' => $barang->jumlah,
          'price' => $barang->total / $barang->jumlah,
        ];
      }

      // Set params
      $mid = '123123456';
      $store_name = 'Seneng Utomo';
      $store_address = 'Tangen, Sragen';
      $store_phone = '1234567890';
      $store_email = 'yourmart@email.com';
      $store_website = 'yourmart.com';
      $tax_percentage = 0;
      $transaction_id = $data->id;
      $currency = 'Rp';
      $image_path = public_path() . '/logo_mini.png';

      // Init printer
      $printer = new ReceiptPrinter;
      $printer->init(
        config('receiptprinter.connector_type'),
        config('receiptprinter.connector_descriptor')
      );

      // Set store info
      $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

      // Set currency
      $printer->setCurrency($currency);

      // Add items
      foreach ($items as $item) {
        $printer->addItem(
          $item['name'],
          $item['qty'],
          $item['price']
        );
      }
      // Set tax
      $printer->setTax($tax_percentage);

      // Calculate total
      $printer->calculateSubTotal();
      $printer->calculateGrandTotal();

      // Set transaction ID
      $printer->setTransactionID($transaction_id);

      // Set logo
      // Uncomment the line below if $image_path is defined
      $printer->setLogo($image_path);

      // Set QR code
      $printer->setQRcode([
        'tid' => $transaction_id,
      ]);

      // Print receipt
      $printer->printReceipt();

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
      dd($e);
      return [
        'notif'     => 'Gagal disimpan!',
        'alert'     => 'error'
      ];
    }
  }
}