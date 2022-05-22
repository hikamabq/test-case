<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('kategori', KategoriController::class);
    Route::get('/cari_produk', [FormController::class, 'data_produk']);
    Route::get('/cari_kategori', [FormController::class, 'data_kategori']);
    Route::get('/cari_supplier', [FormController::class, 'data_supplier']);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('laporan', LaporanController::class);

});