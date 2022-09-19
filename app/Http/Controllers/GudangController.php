<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GudangController extends Controller
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
    $tags =  Tag::all();
    return view('gudang_input', compact('tags'));
  }

  public function edit($id)
  {
    $tags =  Tag::all();
    $old_tag = [];
    $barang =  Barang::with('tag')->where('id', $id)->firstOrFail();
    foreach ($barang->tag as $tag) {
      $old_tag[] = $tag->nama_tag;
    }
    return view('gudang_edit', compact('tags', 'barang', 'old_tag'));
  }

  // gudang list
  public function show()
  {
    $barang =  Barang::all();
    return view('gudang_list', compact('barang'));
  }

  public function get_barang(Request $request)
  {
    if ($request->ajax()) {

      $draw = $request->get('draw');
      $start = $request->get("start");
      $rowperpage = $request->get("length"); // Rows display per page

      $columnIndex_arr = $request->get('order');
      $columnName_arr = $request->get('columns');
      $order_arr = $request->get('order');
      $searchValue = $request->get('search');

      $columnIndex = $columnIndex_arr[0]['column']; // Column index
      $columnName = $columnName_arr[$columnIndex]['data']; // Column name
      $columnSortOrder = $order_arr[0]['dir']; // asc or desc
      // $searchValue = $search_arr['value']; // Search value
      $filter = $request->get('filter'); // Search value
      $type = $request->get('type') == null ? 'all' : $request->get('type'); // Search value

      // Total records
      $totalRecords = Barang::select('count(*) as allcount')->count();

      // Fetch records
      if ($type == 'all') {
        if (!empty($filter)) {
          if ($filter == 'harga_jual' || $filter == 'harga_satuan') {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, $searchValue)
              ->whereNull('deleted_at');
          } else {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, 'like', '%' . $searchValue . '%')
              ->whereNull('deleted_at');
          }
        } else {
          $data = Barang::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
              $query->where('nama_barang', 'like', '%' . $searchValue . '%')
                ->orWhere('kode_scan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_satuan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_jual', 'like', '%' . $searchValue . '%');
            })->whereNull('deleted_at');
        }
      } elseif ($type == '0' || $type == '1') {
        $operation = $type == '0' ? '=' : '>=';
        if (!empty($filter)) {
          if ($filter == 'harga_jual' || $filter == 'harga_satuan') {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, $searchValue)
              ->where('stok', $operation, $type)
              ->whereNull('deleted_at');
          } else {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, 'like', '%' . $searchValue . '%')
              ->where('stok', $operation, $type)
              ->whereNull('deleted_at');
          }
        } else {
          $data = Barang::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
              $query->where('nama_barang', 'like', '%' . $searchValue . '%')
                ->orWhere('kode_scan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_satuan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_jual', 'like', '%' . $searchValue . '%');
            })
            ->where('stok', $operation, $type)
            ->whereNull('deleted_at');
        }
      } else {
        if (!empty($filter)) {
          if ($filter == 'harga_jual' || $filter == 'harga_satuan') {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, $searchValue)
              ->whereNotNull('deleted_at');
          } else {
            $data = Barang::orderBy($columnName, $columnSortOrder)
              ->where($filter, 'like', '%' . $searchValue . '%')
              ->whereNotNull('deleted_at');
          }
        } else {
          $data = Barang::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
              $query->where('nama_barang', 'like', '%' . $searchValue . '%')
                ->orWhere('kode_scan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_satuan', 'like', '%' . $searchValue . '%')
                ->orWhere('harga_jual', 'like', '%' . $searchValue . '%');
            })
            ->whereNotNull('deleted_at');
        }
      }

      $totalRecordswithFilter = $data->get()->count();
      if ($rowperpage != -1) {
        $records = $data->skip($start)
          ->take($rowperpage)
          ->get();
      } else {
        $records = $data->get();
      }

      $data_arr = array();

      foreach ($records as $record) {
        $id = $record->id;
        $kode_scan = $record->kode_scan;
        $nama_barang = $record->nama_barang;
        $harga_jual = $record->harga_jual;
        $harga_satuan = $record->harga_satuan;
        $stok = $record->stok;
        $gambar = $record->gambar;
        $deleted_at = $record->deleted_at;

        $data_arr[] = array(
          "id" => $id,
          "kode_scan" => $kode_scan,
          "nama_barang" => $nama_barang,
          "harga_jual" => $harga_jual,
          "harga_satuan" => $harga_satuan,
          "stok" => $stok,
          "gambar" => $gambar,
          "deleted_at" => $deleted_at
        );
      }

      $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "query" => DB::getQueryLog(),
        "aaData" => $data_arr
      );
      echo json_encode($response);
      exit;
    }
  }

  public function add(Request $req)
  {
    $cek_barang = barang::where('kode_scan', $req->kode_barang)->first();
    if ($cek_barang) {
      return back()->with([
        'notif'     => 'Kode barang telah ada!',
        'alert'     => 'error'
      ])->withInput();
    }
    DB::beginTransaction();
    try {
      $add = new Barang();
      $add->nama_barang   = ucwords($req->nama_barang);
      $add->kode_scan     = $req->kode_barang;
      $add->stok          = $req->stok;
      $add->harga_satuan  = $req->harga_satuan;
      $add->harga_jual    = $req->harga_jual;
      $add->catatan       = $req->catatan;
      $add->created_by    =  Auth::user()->id;

      if ($req->file('gambar') != null) {
        $name = str_replace(' ', '_', $req->nama_barang);
        $img = $name . '.' . $req->file('gambar')->extension();
        $req->file('gambar')->storeAs('public/', $img);
      } else {
        $img = null;
      }

      $add->gambar = $img;
      $add->save();

      // table tags
      if ($req->tags != '') {
        foreach ($req->tags as $tag) {
          $cek = tag::where('nama_tag', strtolower(ltrim($tag)))->first();
          $barang_tag = new BarangTag();

          if (!$cek) {
            $ins_tag =  new tag();
            $ins_tag->nama_tag = strtolower(ltrim($tag));
            $ins_tag->created_by    =  Auth::user()->id;
            $ins_tag->save();

            $barang_tag->tag_id =  $ins_tag->id;
          } else {
            $barang_tag = new BarangTag();
            $barang_tag->tag_id =  $cek->id;
          }

          $barang_tag->barang_id = $add->id;
          $barang_tag->save();
        }
      }

      DB::commit();
      return back()->with([
        'notif'     => 'Berhasil ditambahkan',
        'alert'     => 'success'
      ]);
    } catch (\Exception $e) {
      DB::rollback();
      return back()->with([
        'notif'     => 'Gagal ditambahkan!',
        'alert'     => 'error'
      ])->withInput();
    }
  }

  public function update(Request $req)
  {
    if ($req->kode_barang != $req->old_kode_barang) {
      $cek_barang = barang::where('kode_scan', $req->kode_barang)->first();
      if ($cek_barang) {
        return back()->with([
          'notif'     => 'Kode barang telah ada!',
          'alert'     => 'error'
        ])->withInput();
      }
    }
    DB::beginTransaction();
    try {
      $add = Barang::where('id', $req->id)->firstOrFail();
      $add->nama_barang   = ucwords($req->nama_barang);
      $add->kode_scan     = $req->kode_barang;
      $add->stok          = $req->stok;
      $add->harga_satuan  = $req->harga_satuan;
      $add->harga_jual    = $req->harga_jual;
      $add->catatan       = $req->catatan;
      $add->updated_by    =  Auth::user()->id;

      if ($req->file('gambar') != null) {
        File::delete(storage_path('app/public') . '/' . $add->gambar);
        $name = str_replace(' ', '_', $req->nama_barang);
        $img = $name . '.' . $req->file('gambar')->extension();
        $req->file('gambar')->storeAs('public/', $img);
        $add->gambar = $img;
      }

      $add->save();

      BarangTag::where('barang_id', $add->id)->delete();
      // table tags
      if ($req->tags != '') {
        foreach ($req->tags as $tag) {
          $cek = tag::where('nama_tag', strtolower(ltrim($tag)))->first();
          $barang_tag = new BarangTag();

          if (!$cek) {
            $ins_tag =  new tag();
            $ins_tag->nama_tag = strtolower(ltrim($tag));
            $ins_tag->created_by    =  Auth::user()->id;
            $ins_tag->save();

            $barang_tag->tag_id =  $ins_tag->id;
          } else {
            $barang_tag = new BarangTag();
            $barang_tag->tag_id =  $cek->id;
          }

          $barang_tag->barang_id = $add->id;
          $barang_tag->save();
        }
      }

      DB::commit();
      return redirect()->route('gudang.show')->with([
        'notif'     => 'Berhasil ditambahkan',
        'alert'     => 'success'
      ]);
    } catch (\Exception $e) {
      DB::rollback();
      return back()->with([
        'notif'     => 'Gagal ditambahkan!',
        'alert'     => 'error'
      ])->withInput();
    }
  }

  public function delete(Request $req)
  {
    // dd($req);
    DB::beginTransaction();
    try {
      $del = Barang::findOrFail($req->id);
      if ($del->deleted_at == null) {
        $del->deleted_at = Carbon::now();
        $del->updated_by    =  Auth::user()->id;
        $del->save();
      } else {
        $barang_tag = BarangTag::where('barang_id', $del->id);
        $barang_tag->delete();
        $img = $del->gambar;
        $del->delete();
        File::delete(storage_path('app/public') . '/' . $img);
      }

      DB::commit();
      return [
        'notif'     => 'Berhasil dihapus',
        'alert'     => 'success'
      ];
    } catch (\Exception $e) {
      DB::rollback();
      return $e;
      return [
        'notif'     => 'Gagal dihapus!',
        'alert'     => 'error'
      ];
    }
  }

  public function restore(Request $req)
  {
    // dd($req);
    DB::beginTransaction();
    try {
      $del = Barang::findOrFail($req->id);
      $del->deleted_at = null;
      $del->updated_by    =  Auth::user()->id;
      $del->save();

      DB::commit();
      return [
        'notif'     => 'Berhasil direstore',
        'alert'     => 'success'
      ];
    } catch (\Exception $e) {
      DB::rollback();
      return $e;
      return [
        'notif'     => 'Gagal direstore!',
        'alert'     => 'error'
      ];
    }
  }
}