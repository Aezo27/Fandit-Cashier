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


Route::group(['middleware' => 'auth', 'admin'], function () {
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// admin
Route::group(['middleware' => 'admin'], function () {
  
});
