<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Category;
use App\data_reseller;
use App\Tag;
use App\Faq;
use App\Footer_Link;
use App\Order_Product;
use App\Service;
use App\Testimoni;
use App\Bank;
use App\Voucher;
use Error;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DateTime;

class ProductController extends Controller
{
    public function index()
    {
        $category=Category::all();
        $home_slide = DB::table('home_slide')->get();
        $banca = DB::table('banner_category')->get();
        $dis_wid=DB::table('discount_widgets')->get()->first();
        $date = isset($dis_wid->waktu_selesai) ? new \DateTime($dis_wid->waktu_selesai) : '';
        $now = new \DateTime();
        return view('utama.index', compact('category', 'dis_wid', 'home_slide', 'banca', 'date', 'now'));
    }
    public function iklan()
    {
        $products = Product::inRandomOrder()->limit(6)->get();
        $products2 = Product::orderBy('views', 'desc')->limit(2)->get();
        $dis_wid=DB::table('discount_widgets')->get()->first();
        $footlink= Footer_Link::all();
        $services= Service::all();
        $testimoni= Testimoni::all();
        $date = new \DateTime($dis_wid->waktu_selesai);
        $now = new \DateTime();
        return view('utama.iklan', compact('dis_wid', 'footlink', 'date', 'now', 'products', 'products2', 'services', 'testimoni'));
    }
    public function product()
    {
        $product = Product::take(9)->get();
        $tot_prod = Product::get();
        return view('utama.product', compact('product', 'tot_prod'));
    }
    public function search(Request $request)
    {
        $category = Category::all();
        if ($request->cate || $request->s) {
            $cari = $request->s;
            $cate = $request->cate;
            $tot_prod = Product::where('nama_barang', 'like', "%" . $cari . "%")
            ->where('category_id', 'like', "%" . $cate . "%")->get();
            $product = Product::where('nama_barang', 'like', "%" . $cari . "%")
            ->where('category_id', 'like', "%" . $cate . "%")->take(12)->get();
            return view('utama.search', compact('product','tot_prod'));
        } else {
            $product = Product::where('nama_barang', 'like', "%unknown%")->get();
            return view('utama.search', compact('product'));
        }
    }
    public function category(Request $request)
    {
        if ($request->cate) {
            $cate = $request->cate;
            $product = Product::where('category_id', $cate)->take(9)->get();
            $tot_prod = Product::where('category_id', $cate)->get();
            return view('utama.product', compact('product', 'tot_prod'));
        } else {
            return redirect(route('product'));
        }
    }
    public function size(Request $request)
    {
        if ($request->size) {
            $size = $request->size;
            $product = Product::whereHas('sizes', function ($q) use ($size) {
                $q->where($size, 1);
            })->take(9)->get();
            $tot_prod = Product::whereHas('sizes', function ($q) use ($size) {
                $q->where($size, 1);
            })->get();
            return view('utama.product', compact('product', 'tot_prod'));
        } else {
            return redirect(route('product'));
        }
    }
    public function color(Request $request)
    {

        if ($request->color) {
            $color = $request->color;
            $product = Product::whereHas('colors', function ($q) use ($color) {
                $q->where('nama', $color);
            })->take(9)->get();
            $tot_prod = Product::whereHas('colors', function ($q) use ($color) {
                $q->where('nama', $color);
            })->get();
            return view('utama.product', compact('product', 'tot_prod'));
        } else {
            return redirect(route('product'));
        }
    }
    public function tag(Request $request)
    {
        if ($request->tag) {
            $tag = $request->tag;
            $product = Product::whereHas('tags', function ($q) use ($tag) {
                $q->where('judul', 'like', '%' . $tag . '%');
            })->take(9)->get();
            $tot_prod = Product::whereHas('tags', function ($q) use ($tag) {
                $q->where('judul', 'like', '%' . $tag . '%');
            })->get();
            return view('utama.product', compact('product', 'tot_prod'));
        } else {
            return redirect(route('product'));
        }
    }
    function more_data(Request $request)
    {
            $cate = $request->cate;
            $size = $request->size;
            $color = $request->color;
            $tag = $request->tag;
        if ($request->cate){
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 9;
                $product = Product::where('category_id', 'like', "%" . $cate . "%")
                    ->skip($skip)->take($take)->get();
                return response()->json($product);
            } else {
                return view('errors.404');
            }
        } else if ($request->tag) {
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 9;
                $product = Product::whereHas('tags', function ($q) use ($tag) {$q->where('judul', 'like', '%' . $tag . '%');})
                    ->skip($skip)->take($take)->get();
                return response()->json($product);
            }
            else {
                return view('errors.404');
            }
        } else if ($request->size) {
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 9;
                $product = Product::whereHas('sizes', function ($q) use ($size) {$q->where($size, 1);})
                    ->skip($skip)->take($take)->get();
                return response()->json($product);
            }
            else {
                return view('errors.404');
            }
        } else if ($request->color) {
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 9;
                $product = Product::whereHas('colors', function ($q) use ($color) {$q->where('nama', $color);})
                    ->skip($skip)->take($take)->get();
                return response()->json($product);
            }
            else {
                return view('errors.404');
            }
        } else {
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 9;
                $product = Product::skip($skip)->take($take)->get();
                return response()->json($product);
            }
            else {
                return view('errors.404');
            }
        }
    }
    function more_data_search(Request $request)
    {
        $cari = $request->s;
        $cate = $request->cate;
        if ($request->cate || $request->s){
            if ($request->ajax()) {
                $skip = $request->skip;
                $take = 12;
                $product = Product::where('nama_barang', 'like', "%" . $cari . "%")
                    ->where('category_id', 'like', "%" . $cate . "%")
                    ->skip($skip)->take($take)->get();
                return response()->json($product);
            } else {
                return view('errors.404');
            }
        }
    }
    public function faq()
    {
        $category = Category::all();
        $faq = Faq::all();
        return view('utama.faq', compact('category','faq'));
    }
    public function contact()
    {
        $category = Category::all();
        return view('utama.contact', compact('category'));
    }
    public function check_out()
    {
        $carts = json_decode(request()->cookie('my-carts'), true);
        $provinsi = OngkirController::getProvinsi();
        if (isset($carts)&&$carts!=null) {
            $subtotal = collect($carts)->sum(function ($q) {
                return $q['qty'] * $q['product_price'];
            });
            $berat = collect($carts)->sum(function ($q) {
                return $q['qty'] * $q['berat'];
            });
            $category = Category::all();
            return view('utama.check_out', compact('category', 'carts', 'subtotal', 'berat', 'provinsi'));
        } else {
            return redirect(route('product'));
        }
    }
    public function getOngkir($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&originType=city&destination=$destination&destinationType=subdistrict&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: f1360ef65e99971b8531fab3ccf5b13b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }
    public function bayar(Request $request)
    {
        $carts = json_decode(request()->cookie('my-carts'), true);
        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        if ($request->kode_voucher!=null) {
            $voucher = json_decode($this->voucher($request->kode_voucher),true);
            if ($voucher['potongan']!=null) {
                $diskon = (int)$voucher['potongan'];
            } else if ($voucher['persen']!=null){
                $diskon = $subtotal * ((int)$voucher['persen']/100);
            } else {
                $diskon = 0;
            }
        } else {
            $diskon = 0;
        }
        $this->validate($request, [
            'nama_penerima' => 'required',
            'prov' => 'required',
            'kab' => 'required',
            'kec' => 'required',
            'kp' => 'required|numeric',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'ongkir' => 'required',
            'kur' => 'required',
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($request->ongkir!=null) {
            $dat_ongkir = json_decode($this->getOngkir(445,$request->kecamatan,1000,$request->kurir),true);
            foreach ($dat_ongkir as $key => $value) {
                foreach ($value['costs'] as $key1 => $value1) {
                    foreach ($value1['cost'] as $key2 => $value2) {
                        if ($value2['value'] == $request->ongkir) {
                            $ongkir = $request->ongkir;
                        }
                    }
                }
            }
        } else {
            return redirect()->back();
        }
        //$id = hexdec(uniqid());
        $id = time();
        $nama = ucwords($request->nama_penerima);
        if ($request->nama_pengirim == null) {
            $pengirim= config('app.name');
        } else {
            $pengirim = $request->nama_pengirim;
        }
        $order = new Order();
        $order->nama_penerima = $nama;
        $order->nama_pengirim = $pengirim;
        $order->provinsi = $request->prov;
        $order->kabupaten = $request->kab;
        $order->kecamatan = $request->kec;
        $order->kode_pos = $request->kp;
        $order->email = $request->email;
        $order->no_hp = $request->no_hp;
        $order->alamat_lengkap = ucwords($request->alamat);
        $order->status = 'pending';
        $order->pesan_tambahan = $request->add_pesan;
        $order->diskon =$diskon;
        $order->kurir = $request->kur;
        $order->ongkir = (int)$ongkir;
        $order->total = $subtotal - $diskon + (int)$ongkir;
        $order->save();

        $id = $order->id;

        foreach($carts as $row){
            $order_product = Order_Product::create([
                'order_id' => $id,
                'product_id' => $row['product_id'],
                'jumlah' => $row['qty'],
            ]);
        }
        if ($order && $order_product) {
            $cookie = Cookie::forget('my-carts');
            Mail::send('mail/mail', ['order' => $order], function ($message) use ($request, $id) {
                $message->to($request->email);
                $message->subject("Order - #" . $id);
            });
        }
        return redirect(route('product').'/'.'payment/'.$id)->withCookie($cookie);
    }
    public function deleteOrder($id)
    {
        $order = Order::findOrfail($id)->delete();
        $order_product = Order_Product::where('order_id', $id)->delete();
        if ($order && $order_product) {
            return redirect(route('product'));
        } else {
            return redirect()->back();
        }
    }
    public function payment($id)
    {
        $order = Order::where('id', $id)->get()->first();
        $category = Category::all();
        $payment = Bank::all();
        if ($order != null) {
            return view('utama.payment', compact('order', 'category', 'payment'));
        } else {
            return view('errors.404');
        }
    }
    public function finishOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => "finish",
        ]);
        return redirect()->back();
    }
    public function postpayment(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'postpayment' => 'mimes:jpeg,jpg,png|max:2000',
        ]);
        if ($request->file('postpayment')!=null) {
            $img = $request->id.'.png';
            $request->file('postpayment')->storeAs('bukti_transfer/', $img);
        } else {
            $img = null;
        }
        $update = Order::findOrFail($request->id);
        $update->update([
            'bukti_tf' => $img,
        ]);
        return redirect()->back();
    }
    public function cart()
    {
        $carts = json_decode(request()->cookie('my-carts'), true);
        $subtotal = collect($carts)->sum(function ($q) {
            return $q['qty'] * $q['product_price'];
        });
        $category = Category::all();
        return view('utama.cart', compact('category','carts','subtotal'));
    }
    public function favorit(Request $request)
    {
        //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'prod_id' => 'required|exists:products,id', //PASTIKAN PRODUCT_IDNYA ADA DI DB
        ]);


        $fav = json_decode($request->cookie('my-fav'), true);
        $product = Product::find($request->prod_id);
        $fav[$request->prod_id] = [
            'product_id' => $product->id,
            'product_name' => $product->nama_barang,
            'product_price' => $product->harga,
            'product_image' => $product->gambar_utama
        ];

        $cookie = cookie('my-fav', json_encode($fav), 10080);
        return redirect()->back()->cookie($cookie);
    }
    public function deleteFav($id)
    {
        $fav = json_decode(request()->cookie('my-fav'), true);
        if ($fav[$id] != null) {
            unset($fav[$id]);
        }
        $cookie = cookie('my-fav', json_encode($fav), 10080);
        return redirect()->back()->cookie($cookie);
    }
    public function clearFav()
    {
        $cookie = Cookie::forget('my-fav');
        return redirect()->back()->cookie($cookie);
    }
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        $carts = json_decode($request->cookie('my-carts'), true);
        if ($carts && array_key_exists($request->product_id, $carts)) {
            $product = Product::findOrFail($request->product_id);
            if ($carts[$request->product_id]['qty'] < $product->stok) {
                $carts[$request->product_id]['qty'] += $request->qty;
            } else {
                return abort(404);
            }
        } else {
            $product = Product::findOrFail($request->product_id);
            if ($product->harga_diskon!=0) {
               $harga = $product->harga_diskon;
            } else {
                $harga = $product->harga;
            }
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'berat' => $product->berat,
                'product_id' => $product->id,
                'product_name' => $product->nama_barang,
                'product_price' => $harga,
                'product_image' => $product->gambar_utama,
                'product_stock' => $product->stok
            ];
        }
        $cookie = cookie('my-carts', json_encode($carts), 10080);
        return redirect()->back()->cookie($cookie);
    }
    public function updateCart(Request $request)
    {
        $carts = json_decode(request()->cookie('my-carts'), true);
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('my-carts', json_encode($carts), 10080);
        return redirect()->back()->cookie($cookie);
    }
    public function deleteCart($id)
    {
        $carts = json_decode(request()->cookie('my-carts'), true);
            if ($carts[$id]!=null) {
                unset($carts[$id]);
            }
        $cookie = cookie('my-carts', json_encode($carts), 10080);
        return redirect()->back()->cookie($cookie);
    }
    public function clearCart()
    {
        $cookie = Cookie::forget('my-carts');
        return redirect()->back()->cookie($cookie);
    }
    public function detail($id)
    {
        $product=Product::where('id', $id)->get()->first();
        $category = Category::all();
        if ($product != null) {
            $product->increment('views');
            $sing_cat = DB::table('categories')
            ->where('id', '=', $product->category_id)
            ->get()->first();
            return view('utama.detail', compact('product', 'category','sing_cat'));
        } else {
            return view('errors.404');
        }
    }
    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = data_reseller::select('nama_toko')->where('id', 'LIKE', '%' . $cari . '%')->get();
            return response()->json($data);
        }
    }
    public function voucher($kode_voucher)
    {
        $voucher = Voucher::where('kode', $kode_voucher)->first();
        if ($voucher!=null) {
            return json_encode($voucher);
        } else {
            return abort(404);
        }

    }
}
