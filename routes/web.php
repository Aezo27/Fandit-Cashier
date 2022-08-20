<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

// login
// Auth::routes();
Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);


Route::group(['middleware' => 'auth'], function () {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  // gudang
  Route::get('gudang_input', [App\Http\Controllers\GudangController::class, 'index'])->name('gudang.input');
  Route::post('gudang_input', [App\Http\Controllers\GudangController::class, 'add'])->name('gudang.input.add');
  Route::get('gudang_list', [App\Http\Controllers\GudangController::class, 'show'])->name('gudang.show');
  Route::any('gudang_list/data', [App\Http\Controllers\GudangController::class, 'get_barang'])->name('gudang.show.get_barang');
  Route::post('gudang_list/delete', [App\Http\Controllers\GudangController::class, 'delete'])->name('gudang.delete');
  Route::post('gudang_list/restore', [App\Http\Controllers\GudangController::class, 'restore'])->name('gudang.restore');
  Route::get('gudang_list/{id}', [App\Http\Controllers\GudangController::class, 'edit'])->name('gudang.edit');
  Route::post('gudang_list/update', [App\Http\Controllers\GudangController::class, 'update'])->name('gudang.edit.update');

  Route::get('kasir', [App\Http\Controllers\KasirController::class, 'index'])->name('kasir');
  Route::get('get-kasir', [App\Http\Controllers\KasirController::class, 'get_kasir'])->name('get_kasir');
  Route::get('get-kasir/datatable', [App\Http\Controllers\KasirController::class, 'get_kasir_datatable'])->name('get_kasir.datatable');
  Route::get('kasir/get-barang', [App\Http\Controllers\KasirController::class, 'get_barang'])->name('kasir.get_barang');
  Route::post('get-kasir/{id}', [App\Http\Controllers\KasirController::class, 'set_kasir'])->name('set_kasir');
  Route::post('update-kasir/{id}', [App\Http\Controllers\KasirController::class, 'update_kasir'])->name('update_kasir');
  Route::get('delete-kasir/{id}', [App\Http\Controllers\KasirController::class, 'delete_kasir'])->name('delete_kasir');
  Route::any('simpan-kasir', [App\Http\Controllers\KasirController::class, 'simpan_kasir'])->name('simpan_kasir');

  Route::get('laporan-jual', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan_jual');

});

// admin
Route::group(['middleware' => 'admin'], function () {
  
});