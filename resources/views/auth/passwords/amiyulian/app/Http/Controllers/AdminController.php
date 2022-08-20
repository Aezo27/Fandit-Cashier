<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Category;
use Illuminate\Http\Request;
use App\data_reseller;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Order;
use App\Product;
use App\Color;
use App\Tag;
use App\Size;
use App\Faq;
use App\Contact;
use App\Service;
use App\Color_Product;
use App\Datajual;
use App\Footer_Link;
use App\Text_Banner;
use App\Testimoni;
use App\Voucher;
use App\Partner;
use Illuminate\Support\Facades\Mail;
use Carbon\Traits\Test;
use Illuminate\Support\Facades\DB;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin','verified']);
    }

    public function index()
    {
        $orders=Order::where('status','!=', 'finish')->get();
        $orders2=Order::where('status', 'finish')->get();
        $product=Product::all();
        return view('admin.home', compact('orders','orders2', 'product'));
    }
    // public function profil()
    // {
    //     $id=Session::get('id');
    //     $data = data_reseller::where('id', $id)->first();
    //     return view('admin.profil', compact('data'));
    // }
    public function edit_profil()
    {
        $id=Session::get('id');
        $data = data_reseller::where('id', $id)->first();
        return view('admin.edit_profil', compact('data'));
    }
    public function op_orders()
    {
        $orders=Order::where('status','!=', 'finish')->get();
        return view('admin.op_orders', compact('orders'));
    }
    public function finish_orders()
    {
        $orders2=Order::where('status', 'finish')->get();
        return view('admin.finish_orders', compact('orders2'));
    }
    public function cetak_laporan(Request $request)
    {
      DB::enableQueryLog();
      // dd(Datajual::all());
      if (request()->ajax()) {
        // if (!empty($request->from_date)) {
        //   $start = $request->from_date;
        //   $end = $request-> to_date;
        //   $data = Datajual::whereBetween('created_at', array($start, $end));
        // } else if(!empty($request->search[value])) {

        // } else {
        //   $data = Datajual::select();
        // }
        // return DataTables::eloquent($data)
        // ->addColumn('total', function (Datajual $data) {
        //   return 'Rp. ' . number_format(($data->jumlah * ($data->harga != null ? $data->harga : $data->harga_diskon)), 0, ',', '.');
        // })
        // ->addColumn('data_barang', function (Datajual $data) {
        //   return $data->barang.' x '.$data->jumlah;
        // })
        // ->addColumn('date', function (Datajual $data) {
        //   return $data->created_at->format('d-m-Y');
        // })
        // ->rawColumns(['total', 'date'])->toJson();

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        $start_date = $request->get('from_date');
        $end_date = $request->get('to_date').' 23:59:59';

        // Total records
        $totalRecords = Datajual::select('count(*) as allcount')->count();
        
        // Fetch records
        if (!empty($start_date)) {
          $records = Datajual::orderBy($columnName, $columnSortOrder)
          ->where('barang', 'like', '%' . $searchValue . '%')
          ->whereBetween('created_at', array($start_date, $end_date))
          ->skip($start)
          ->take($rowperpage)
          ->get();
        } else {
          $records = Datajual::orderBy($columnName, $columnSortOrder)
          ->where('barang', 'like', '%' . $searchValue . '%')
          ->orWhere('order_id', 'like', '%' . $searchValue . '%')
          ->skip($start)
          ->take($rowperpage)
          ->get();
        }
        
        $totalRecordswithFilter = $records->count();

        $data_arr = array();

        foreach ($records as $record) {
          $id = $record->id;
          $order_id = $record->order_id;
          $barang = $record->barang;
          $jumlah = $record->jumlah;
          $total = 'Rp. ' . number_format(($record->total), 0, ',', '.');
          $date = $record->created_at;

          $data_arr[] = array(
            "id" => $id,
            "order_id" => $order_id,
            "barang" => $barang,
            "jumlah" => $jumlah,
            "total" => $total,
            "created_at" => $date->format('d-m-Y')
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
      $orders2=Datajual::all();
      return view('admin.cetak_laporan', compact('orders2'));
    }

    public function export_dataJual(Request $req) 
    {
      $startDate = $req->from_date;
      $endDate = $req->to_date;
      if ($startDate != null) {
        return Excel::download((new LaporanExport)->startDate($startDate)->endDate($endDate), 'data_jual_'.$startDate.'_'.$endDate.'.xlsx');
      } else {
        return Excel::download((new LaporanExport), 'data_jual.xlsx');
      }
    }

    public function update(Request $request)
    {
        $id = Session::get('id');
        $this->validate($request, [
            'email' => 'required',
            'nama_toko' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpeg,jpg,png|max:2000',
        ]);

        // Foto Profil
        if ($request->file('foto')!=null) {
            // penamaan gambar
            $img = $id.'.png';
            // request gambar
            $request->file('foto')->storeAs('profil/', $img);
        } else {
            $foto_profil=data_reseller::where('id',$id)->value('foto_profil');
            if ($foto_profil=!null) {
                $img = data_reseller::where('id',$id)->value('foto_profil');
            } else {
                $img = null;
            }
        }

        //   Cek if exist
        $update = data_reseller::findOrFail($id);
        $update2 = user::findOrFail($id);

        // Update Data
        $nama = ucfirst($request->nama);
        $alamat = ucfirst($request->alamat);
        $update->update([
            'nama_toko' => $request->nama_toko,
            'nama' => $nama,
            'no_hp' => $request->no_hp,
            'alamat' => $alamat,
            'foto_profil' => $img,
        ]);
        $update2->update([
            'name' => $request->nama_toko,
            'email' => $request->email,
        ]);
        return redirect()->back();
    }
    public function hapusOrder($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function cancelOrder($id)
    {
        Order::findOrFail($id)->delete();
        return redirect(route('on_process_orders'));
    }
    public function lihatOrder($idOrder)
    {
        $order = Order::findOrFail($idOrder);
        return view('admin.dataOrder', compact('order'));
    }
    public function addResi(Request $request, $idOrder)
    {
        $this->validate($request, [
            'no_resi' => 'required',
        ]);
        $updateResi = Order::findOrFail($idOrder);
        if ($updateResi->no_resi == null) {
            foreach ($updateResi->products as $prod) {
                if ($prod->stok > 0) {
                    $prod->decrement('stok');
                }
            }
        }
        $updateResi->update([
            'no_resi' => $request->no_resi,
            'status' => "diproses",
        ]);
        if ($updateResi) {
            Mail::send('mail/mail2', ['order' => $updateResi], function ($message) use ($updateResi) {
                $message->to($updateResi->email);
                $message->subject("Resi Order - #" . $updateResi->id);
            });
        }

        return redirect()->back();
    }
    public function productList()
    {
        $product = Product::all();
        return view('admin.product_list', compact('product'));
    }
    public function addProduct()
    {
        $category = Category::all();
        $color = Color::all();
        return view('admin.add_product', compact('category', 'color'));
    }
    public function hapusProduct($id)
    {
        Product::findOrFail($id)->delete();
        Tag::where('product_id', $id)->delete();
        Color_Product::where('product_id', $id)->delete();
        Size::where('product_id', $id)->delete();
        File::deleteDirectory(storage_path('app/product').'/'.$id);
        return redirect()->back();
    }
    public function seeProduct($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        $tag = Tag::where('product_id', $id);
        $color = Color::all();
        $size = Size::where('product_id', $id);
        return view('admin.edit_product', compact('category', 'color', 'tag', 'size', 'product'));
    }
    public function inputProduct(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'berat' => 'required|integer',
            'ket1' => 'required',
            'ket2' => 'required',
            'category_id' => 'required|integer',
            'tag.*' => 'required',
            'warna.*' => 'required',
            'gambar_utama' => 'mimes:jpeg,jpg,png|required',
            'gambar1' => 'mimes:jpeg,jpg,png',
            'gambar2' => 'mimes:jpeg,jpg,png',
            'gambar3' => 'mimes:jpeg,jpg,png',
        ]);
        $id = time();
        if ($request->tag !=null) {
            foreach ($request->tag as $tag) {
                Tag::create([
                    'product_id' => $id,
                    'judul' => ucwords($tag),
                ]);
            }
        }
        if ($request->warna != null) {
            foreach ($request->warna as $warna) {
                Color_Product::create([
                    'product_id' => $id,
                    'color_id' => $warna,
                ]);
            }
        }

        if ($request->file('gambar_utama') != null) {
            $img = $id . '_utama.png';
            $request->file('gambar_utama')->storeAs('product/'.$id.'/', $img);
        } else {
            $img = null;
        }
        if ($request->file('gambar1') != null) {
            $img1 = $id . '_1.png';
            $request->file('gambar1')->storeAs('product/'.$id.'/', $img1);
        } else {
            $img1 = null;
        }
        if ($request->file('gambar2') != null) {
            $img2 = $id . '_2.png';
            $request->file('gambar2')->storeAs('product/'.$id.'/', $img2);
        } else {
            $img2 = null;
        }
        if ($request->file('gambar3') != null) {
            $img3 = $id . '_3.png';
            $request->file('gambar3')->storeAs('product/'.$id.'/', $img3);
        } else {
            $img3 = null;
        }
        $nama = ucwords($request->nama_barang);
        if ($request->harga_diskon!=null) {
            $diskon = $request->harga_diskon;
        } else {
            $diskon = 0;
        }
        if ($request->link!=null) {
            $link = $request->link;
        } else {
            $link = null;
        }
        $product = Product::create([
            'id' => $id,
            'nama_barang' => $nama,
            'harga' => $request->harga,
            'harga_diskon' => $diskon,
            'berat' => $request->berat < 1000 ? 1000 : $request->berat,
            'stok' => $request->stok,
            'ket1' => $request->ket1,
            'ket2' => $request->ket2,
            'category_id' => $request->category_id,
            'gambar_utama' => $img,
            'gambar2' => $img1,
            'gambar3' => $img2,
            'gambar4' => $img3,
            'views' => 0,
            'link' => $link,
        ]);
        Size::create([
            'product_id' => $id,
            's' => $request->s,
            'm' => $request->m,
            'l' => $request->l,
            'xl' => $request->xl,
            'xxl' => $request->xxl,
        ]);
        return redirect(route('productList'));
    }
    public function editProduct(Request $request, $id)
    {
        Tag::where('product_id', $id)->delete();
        Color_Product::where('product_id', $id)->delete();
        Size::where('product_id', $id)->delete();
        $prod = Product::findOrFail($id);
        if ($request->tag != null) {
            foreach ($request->tag as $tag) {
                if ($tag != '') {
                    Tag::create([
                        'product_id' => $id,
                        'judul' => ucwords($tag),
                    ]);
                }
            }
        }
        if ($request->warna != null) {
            foreach ($request->warna as $warna) {
                Color_Product::create([
                    'product_id' => $id,
                    'color_id' => $warna,
                ]);
            }
        }

        if ($request->file('gambar_utama') != null) {
            $img = $id . '_utama.png';
            $request->file('gambar_utama')->storeAs('product/' . $id . '/', $img);
        } else {
            if ($prod->gambar_utama != null) {
                $img = $prod->gambar_utama;
            } else {
                $img = null;
            }
        }
        if ($request->file('gambar1') != null) {
            $img1 = $id . '_1.png';
            $request->file('gambar1')->storeAs('product/' . $id . '/', $img1);
        } else {
            if ($prod->gambar2 != null) {
                $img1 = $prod->gambar2;
            } else {
                $img1 = null;
            }
        }
        if ($request->file('gambar2') != null) {
            $img2 = $id . '_2.png';
            $request->file('gambar2')->storeAs('product/' . $id . '/', $img2);
        } else {
            if ($prod->gambar3 != null) {
                $img2 = $prod->gambar3;
            } else {
                $img2 = null;
            }
        }
        if ($request->file('gambar3') != null) {
            $img3 = $id . '_3.png';
            $request->file('gambar3')->storeAs('product/' . $id . '/', $img3);
        } else {
            if ($prod->gambar4 != null) {
                $img3 = $prod->gamba4;
            } else {
                $img3 = null;
            }
        }
        if ($request->harga_diskon!=null) {
            $diskon = $request->harga_diskon;
        } else {
            $diskon = 0;
        }
        if ($request->link!=null) {
            $link = $request->link;
        } else {
            $link = null;
        }
        $nama = ucwords($request->nama_barang);
        $prod->update([
            'id' => $id,
            'nama_barang' => $nama,
            'harga' => $request->harga,
            'harga_diskon' => $diskon,
            'stok' => $request->stok,
            'berat' => $request->berat < 1000 ? 1000 : $request->berat,
            'ket1' => $request->ket1,
            'ket2' => $request->ket2,
            'category_id' => $request->category_id,
            'gambar_utama' => $img,
            'gambar2' => $img1,
            'gambar3' => $img2,
            'gambar4' => $img3,
            'link' => $link,
        ]);
        Size::create([
            'product_id' => $id,
            's' => $request->s,
            'm' => $request->m,
            'l' => $request->l,
            'xl' => $request->xl,
            'xxl' => $request->xxl,
        ]);
        return redirect(route('productList'));
    }
    public function categories()
    {
        $categories = Category::paginate(10);
        return view('admin.categories', compact('categories'));
    }
    public function addCategories(Request $request)
    {
        Category::create([
            'judul' => $request->judul,
        ]);
        return redirect()->back();
    }
    public function delCategories($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function color()
    {
        $colors = Color::paginate(10);
        return view('admin.color', compact('colors'));

    }
    public function addColor(Request $request)
    {
        Color::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        return redirect()->back();
    }
    public function delColor($id)
    {
        Color::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function reseller()
    {
        $reseller = data_reseller::all();
        return view('admin.reseller', compact('reseller'));
    }
    public function dataReseller($id)
    {
        $reseller = data_reseller::findOrFail($id);
        $user = User::findOrFail($id);
        return view('admin.dataReseller', compact('reseller', 'user'));
    }
    public function delReseller($id)
    {
        data_reseller::findOrFail($id)->delete();
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function indexShopping()
    {
        $home_slide = DB::table('home_slide')->get();
        $banca = DB::table('banner_category')->get();
        $category = Category::all();
        $partner = Partner::all();
        $dis_wid = DB::table('discount_widgets')->first();
        return view('admin.indexPage', compact('home_slide', 'banca', 'dis_wid', 'category', 'partner'));
    }
    public function addHomeSlide(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required',
            'isi' => 'required',
            'link' => 'required',
            'bg' => 'mimes:jpeg,jpg,png',
        ]);
        $home_slide = DB::table('home_slide')->where('id', $id);
        $home_slide->update([
            'category' => $request->category,
            'title' => $request->title,
            'isi' => $request->isi,
            'link' => $request->link,
            'diskon' => $request->diskon,
        ]);
        if ($request->file('bg') != null) {
            $img =  'hero-'.$id.'.png';
            $request->file('bg')->storeAs('public/home_slide/', $img);
        }
        return redirect()->back();
    }
    public function delHomeSlide($id)
    {
        $home_slide = DB::table('home_slide')->where('id', $id);
        $home_slide->update([
            'category' => null,
            'title' => null,
            'isi' => null,
            'link' => null,
            'diskon' => null,
        ]);
        return redirect()->back();
    }
    public function addBanCat(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'bg' => 'mimes:jpeg,jpg,png',
        ]);
        $category = Category::where('judul', $request->judul)->first()->id;
        $bancat = DB::table('banner_category')->where('id', $id);
        $bancat->update([
            'judul' => $request->judul,
            'link' => route('category').'?cate='.$category,
        ]);
        if ($request->file('bg') != null) {
            $img =  'banner-'.$id.'.png';
            $request->file('bg')->storeAs('public/banner_category/', $img);
        }
        return redirect()->back();
    }
    public function addPartner(Request $request, $id)
    {
        $this->validate($request, [
            'bg' => 'mimes:jpeg,jpg,png',
        ]);
        $partner = Partner::findOrFail($id);
        if ($request->nama!=null) {
            $nama = $request->nama;
        } else {
            $nama = null;
        }
        $partner->update([
            'nama' => $nama,
            'link' => $request->link,
        ]);
        if ($request->file('logo') != null) {
            $img =  'logo-'.$id.'.png';
            $request->file('logo')->storeAs('public/logo_partner/', $img);
        }
        return redirect()->back();
    }
    public function addDisWid(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'nama_barang' => 'required',
            'isi' => 'required',
            'harga' => 'required|integer',
            'link' => 'required',
            'waktu_selesai' => 'required',
            'bg' => 'mimes:jpeg,jpg,png',
        ]);
        $diswid = DB::table('discount_widgets')->where('id', $id);
        $diswid->update([
            'judul' => $request->judul,
            'nama_barang' => $request->nama_barang,
            'isi' => $request->isi,
            'harga' => $request->harga,
            'link' => $request->link,
            'waktu_selesai' => $request->waktu_selesai,
        ]);
        if ($request->file('bg') != null) {
            $img =  'diskon.png';
            $request->file('bg')->storeAs('public/', $img);
        }
        return redirect()->back();
    }
    public function seeFaq()
    {
        $faqs = Faq::paginate(10);
        return view('admin.seeFaq', compact('faqs'));
    }
    public function dataFaq($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.dataFaq', compact('faq'));
    }
    public function delFaq($id)
    {
        $faqs = Faq::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function addFaq(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        Faq::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->back();
    }
    public function updateFaq(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ]);
        $faq = Faq::findOrFail($id);
        $faq->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect(route('seeFaq'));
    }
    public function seeContact()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }
    public function updateContact(Request $request)
    {
        foreach ($request->contact as $key => $isi) {
            $contacts = Contact::findOrFail($key+1);
            $contacts->update([
                'isi' => $isi,
            ]);
        }
        return redirect()->back();
    }
    public function seeFootLink()
    {
        $links = DB::table('footer_link')->get();
        return view('admin.footLink', compact('links'));
    }
    public function updateFootLink(Request $request)
    {
        foreach ($request->link as $key => $link) {
            $fl = Footer_Link::findOrFail($key+1);
            $fl->update([
                'judul' => $request->judul[$key],
                'link' => $link,
            ]);
        }
        return redirect()->back();
    }
    public function textBanner()
    {
        $textb = Text_Banner::all();
        return view('admin.textBanner', compact('textb'));
    }
    public function updateTextBanner(Request $request)
    {
        foreach ($request->judul as $key => $judul) {
            $tb = Text_Banner::findOrFail($key+1);
            $tb->update([
                'judul' => $judul,
                'isi' => $request->isi[$key],
            ]);
        }
        return redirect()->back();
    }
    public function service()
    {
        $services = Service::paginate(10);
        return view('admin.services', compact('services'));
    }
    public function addService(Request $request)
    {
        Service::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect()->back();
    }
    public function delService($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.editService', compact('service'));
    }
    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        return redirect(route('service'));
    }
    public function testimoni()
    {
        $testimoni = Testimoni::paginate(10);
        return view('admin.testimoni', compact('testimoni'));
    }
    public function addTestimoni(Request $request)
    {
        $this->validate($request, [
            'foto' => 'mimes:jpeg,jpg,png',
        ]);
        if ($request->file('foto') != null) {
            $img = 'person_'.(Testimoni::latest()->first()->id+1).'.png';
            $request->file('foto')->storeAs('iklan_pic/', $img);
        } else {
            $img = null;
        }
        Testimoni::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'foto' => $img,
        ]);
        return redirect()->back();
    }
    public function delTestimoni($id)
    {
        $testi = Testimoni::findOrFail($id);
        File::delete(storage_path('app/iklan_pic/'.$testi->foto));
        Testimoni::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function editTestimoni($id)
    {
        $testi = Testimoni::findOrFail($id);
        return view('admin.editTestimoni', compact('testi'));
    }
    public function updateTestimoni(Request $request, $id)
    {
        $this->validate($request, [
            'foto' => 'mimes:jpeg,jpg,png',
        ]);
        $testi = Testimoni::findOrFail($id);
        if ($request->file('foto') != null) {
            $img = $testi->foto;
            $request->file('foto')->storeAs('iklan_pic/', $img);
        }
        $testi->update([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
        ]);
        return redirect(route('testimoni'));
    }
    public function updateBG(Request $request)
    {
        $this->validate($request, [
            'bg' => 'mimes:jpeg,jpg,png',
            'toko' => 'mimes:jpeg,jpg,png',
        ]);
        if ($request->file('bg') != null) {
            $request->file('bg')->storeAs('iklan_pic/', 'hero_2.png');
        }
        if ($request->file('toko') != null) {
            $request->file('toko')->storeAs('iklan_pic/', 'about_1.png');
        }
        return redirect()->back();
    }
    public function bank()
    {
        $bank = Bank::all();
        return view('admin.bank', compact('bank'));
    }
    public function addBank(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'mimes:jpeg,jpg,png',
        ]);
        if ($request->file('barcode') != null) {
            $img = $request->rek.'.png';
            $request->file('barcode')->storeAs('public/bank/', $img);
        } else {
            $img = null;
        }
        Bank::create([
            'nama_bank' => $request->bank,
            'no_rek' => $request->rek,
            'an' => $request->an,
            'barcode' => $img,
        ]);
        return redirect()->back();
    }
    public function delBank($id)
    {
        $bank = Bank::findOrFail($id);
        File::delete(storage_path('app/public/bank/'.$bank->barcode));
        Bank::findOrFail($id)->delete();
        return redirect()->back();
    }
    public function editBank($id)
    {
        $bank = Bank::findOrFail($id);
        return view('admin.editBank', compact('bank'));
    }
    public function updateBank(Request $request, $id)
    {
        $bank = Bank::findOrFail($id);
        $this->validate($request, [
            'barcode' => 'mimes:jpeg,jpg,png',
        ]);
        if ($request->file('barcode') != null) {
            $img = $bank->barcode;
            $request->file('barcode')->storeAs('public/bank/', $img);
        }
        $bank->update([
            'nama_bank' => $request->bank,
            'no_rek' => $request->rek,
            'an' => $request->an,
        ]);
        return redirect(route('bank'));
    }
    public function voucher()
    {
        $voucher = Voucher::all();
        return view('admin.voucher', compact('voucher'));
    }
    public function addVoucher(Request $request)
    {
        if ($request->jenis== 1) {
            Voucher::create([
                'kode' => $request->kode,
                'persen' => $request->potongan,
            ]);
        } else {
            Voucher::create([
                'kode' => $request->kode,
                'potongan' => $request->potongan,
            ]);
        }

        return redirect()->back();
    }
    public function delVoucher($id)
    {
        Voucher::findOrFail($id)->delete();
        return redirect()->back();
    }
}
