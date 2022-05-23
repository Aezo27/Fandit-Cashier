<?php

namespace App\Http\Controllers;

use App\Models\Lapjual;
use Illuminate\Http\Request;

class LaporanController extends Controller
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
    $laps =  Lapjual::all();
    return view('lapjual', compact('laps'));
  }
}
