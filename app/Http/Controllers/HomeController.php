<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        // $user = User::where('id', Auth::user()->id)->first();
        $barang = Barang::all();
        if (Auth::user()->role == 'admin') {
          $penjualan = Penjualan::all();
        } else {
          $penjualan = Penjualan::where('user_id', Auth::user()->id)->get();
        }
        return view('index', compact('barang', 'penjualan'));
    }
}
