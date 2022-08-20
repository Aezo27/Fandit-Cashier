<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['verify' => true]);
// Main Routes
Route::get('/', 'ProductController@index')->name('home');
Route::get('/iklan', 'ProductController@iklan')->name('iklan');
Route::get('contact', 'ProductController@contact')->name('contact');
Route::get('faq', 'ProductController@faq')->name('faq');

// Product Routes
Route::get('product', 'ProductController@product')->name('product');
Route::get('product/search', 'ProductController@search')->name('search');
Route::get('product/tag', 'ProductController@tag')->name('tag');
Route::get('product/category', 'ProductController@category')->name('category');
Route::get('product/size', 'ProductController@size')->name('size');
Route::get('product/color', 'ProductController@color')->name('colors');
Route::get('product/payment/{id}', 'ProductController@payment')->name('payment');
Route::post('product/payment/{id}/finish', 'ProductController@finishOrder')->name('finishOrder');
Route::post('product/payment/postpayment', 'ProductController@postpayment')->name('postpayment');
Route::get('product/{id}', 'ProductController@detail')->name('detail');
Route::get('load-more-data', 'ProductController@more_data')->name('load_more');
Route::get('load-more-data-search', 'ProductController@more_data_search')->name('load_more_search');
Route::get('reseller', 'ProductController@loadData')->name('loadData');

// Check-out Routes
Route::get('check-out', 'ProductController@check_out')->name('check_out');
Route::post('check-out/bayar', 'ProductController@bayar')->name('bayar');
Route::post('check-out/{id}/batal', 'ProductController@deleteOrder')->name('cancel_order');
Route::get('provinsi/', 'OngkirController@getProvinsi')->name('getProvinsi');
Route::get('kota/{id}', 'OngkirController@getKota')->name('getKota');
Route::get('kota/{id}/kec', 'OngkirController@getKec')->name('getKec');
Route::get('origin={city_origin}&originType=city&destination={city_destination}&destinationType=subdistrict&weight={weight}&courier={courier}', 'OngkirController@getOngkir');
Route::get('waybill={waybill}&courier={courier}', 'OngkirController@cekResi');
Route::get('voucher/{kode_voucher}', 'ProductController@voucher');

// Add Fav Routes
Route::post('fav', 'ProductController@favorit')->name('fav');
Route::get('fav/{id}/delete', 'ProductController@deleteFav')->name('deleteFav');
Route::get('fav/clear', 'ProductController@clearFav')->name('clearFav');

// Add Cart Routes
Route::get('cart', 'ProductController@cart')->name('cart');
Route::post('cart/add', 'ProductController@addToCart')->name('add_cart');
Route::post('cart/update', 'ProductController@updateCart')->name('update_cart');
Route::get('cart/{id}/delete', 'ProductController@deleteCart')->name('delete_cart');
Route::get('cart/clear', 'ProductController@clearCart')->name('clearCart');

// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

// Admin Routes
Route::get('admin', 'AdminController@index')->name('admin');
Route::get('admin/profile', 'AdminController@profil')->name('profile');
Route::get('admin/profile/edit_profile', 'AdminController@edit_profil')->name('edit_profile');
Route::post('admin/profile/edit_profile/update', 'AdminController@update')->name('update_profile');

Route::get('admin/on-process-orders', 'AdminController@op_orders')->name('on_process_orders');
Route::get('admin/finish-orders', 'AdminController@finish_orders')->name('finish_orders');
Route::any('admin/cetak_laporan', 'AdminController@cetak_laporan')->name('cetak_laporan');
Route::any('admin/cetak_laporan/get', 'AdminController@export_dataJual')->name('expor_excel');
// Route::any('admin/get_lapo', 'AdminController@get_lapo')->name('get_lapo');
Route::post('admin/hapusorder/{id}', 'AdminController@hapusOrder')->name('hapusOrder');
Route::post('admin/cancelorder/{id}', 'AdminController@cancelOrder')->name('cancelOrder');
Route::get('admin/order/{idOrder}', 'AdminController@lihatOrder')->name('lihatOrder');
Route::post('admin/resi/{idOrder}', 'AdminController@addResi')->name('addResi');

Route::get('admin/product', 'AdminController@productList')->name('productList');
Route::post('admin/product/{id}/delete', 'AdminController@hapusProduct')->name('hapusProduct');
Route::post('admin/product/{id}/edit', 'AdminController@editProduct')->name('editProduct');
Route::get('admin/product/{id}', 'AdminController@seeProduct')->name('seeProduct');
Route::get('admin/add-product', 'AdminController@addProduct')->name('addProduct');
Route::post('admin/add-product/input', 'AdminController@inputProduct')->name('inputProduct');

Route::get('admin/categories', 'AdminController@categories')->name('categories');
Route::post('admin/categories/add', 'AdminController@addCategories')->name('addCategories');
Route::post('admin/categories/{id}/delete', 'AdminController@delCategories')->name('delCategories');

Route::get('admin/color', 'AdminController@color')->name('color');
Route::post('admin/color/add', 'AdminController@addColor')->name('addColor');
Route::post('admin/color/{id}/delete', 'AdminController@delColor')->name('delColor');

Route::get('admin/voucher', 'AdminController@voucher')->name('voucher');
Route::post('admin/voucher/add', 'AdminController@addVoucher')->name('addVoucher');
Route::post('admin/voucher/{id}/delete', 'AdminController@delVoucher')->name('delVoucher');

Route::get('admin/reseller', 'AdminController@reseller')->name('reseller');
Route::get('admin/reseller/{id}', 'AdminController@dataReseller')->name('dataReseller');
Route::post('admin/reseller/{id}/delete', 'AdminController@delReseller')->name('delReseller');

Route::get('admin/pages/shopping/indexpage', 'AdminController@indexShopping')->name('indexShopping');
Route::get('admin/pages/shopping/homeslide/{id}/delete', 'AdminController@delHomeSlide')->name('delHomeSlide');
Route::post('admin/pages/shopping/homeslide/{id}/add', 'AdminController@addHomeSlide')->name('addHomeSlide');
Route::post('admin/pages/shopping/bancat/{id}/add', 'AdminController@addBanCat')->name('addBanCat');
Route::post('admin/pages/shopping/partner/{id}/add', 'AdminController@addPartner')->name('addPartner');
Route::post('admin/pages/shopping/diswid/{id}/add', 'AdminController@addDisWid')->name('addDisWid');
Route::get('admin/pages/shopping/faq/', 'AdminController@seeFaq')->name('seeFaq');
Route::get('admin/pages/shopping/faq/{id}', 'AdminController@dataFaq')->name('dataFaq');
Route::post('admin/pages/shopping/faq/{id}/update', 'AdminController@updateFaq')->name('updateFaq');
Route::post('admin/pages/shopping/faq/add', 'AdminController@addFaq')->name('addFaq');
Route::post('admin/pages/shopping/faq/{id}/delete', 'AdminController@delFaq')->name('delFaq');
Route::get('admin/footerlink', 'AdminController@seeFootLink')->name('footLink');
Route::post('admin/footerlink/update', 'AdminController@updateFootLink')->name('updateFootLink');
Route::get('admin/pages/landing', 'AdminController@textBanner')->name('textBanner');
Route::post('admin/pages/landing/update', 'AdminController@updateTextBanner')->name('updateTextBanner');
Route::get('admin/pages/landing/service', 'AdminController@service')->name('service');
Route::post('admin/pages/landing/service/add', 'AdminController@addService')->name('addService');
Route::post('admin/pages/landing/service/{id}/delete', 'AdminController@delService')->name('delService');
Route::get('admin/pages/landing/service/{id}', 'AdminController@editService')->name('editService');
Route::post('admin/pages/landing/service/{id}/update', 'AdminController@updateService')->name('updateService');
Route::get('admin/pages/landing/testimoni', 'AdminController@testimoni')->name('testimoni');
Route::post('admin/pages/landing/testimoni/add', 'AdminController@addTestimoni')->name('addTestimoni');
Route::post('admin/pages/landing/testimoni/{id}/delete', 'AdminController@delTestimoni')->name('delTestimoni');
Route::get('admin/pages/landing/testimoni/{id}', 'AdminController@editTestimoni')->name('editTestimoni');
Route::post('admin/pages/landing/testimoni/{id}/update', 'AdminController@updateTestimoni')->name('updateTestimoni');
Route::post('admin/pages/landing/bg/update', 'AdminController@updateBG')->name('updateBG');
Route::get('admin/bank', 'AdminController@bank')->name('bank');
Route::post('admin/bank/add', 'AdminController@addBank')->name('addBank');
Route::post('admin/bank/{id}/delete', 'AdminController@delBank')->name('delBank');
Route::get('admin/bank/{id}', 'AdminController@editBank')->name('editBank');
Route::post('admin/bank/{id}/update', 'AdminController@updateBank')->name('updateBank');

Route::get('admin/contact', 'AdminController@seeContact')->name('seeContact');
Route::post('admin/contact/update', 'AdminController@updateContact')->name('updateContact');


