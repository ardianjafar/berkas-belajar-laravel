<?php

use App\Http\Controllers\{PesanController,HomeController};
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('pesan/{id}', [PesanController::class,'index'])->name('pesan.index');
Route::post('pesan/{id}', [PesanController::class,'pesan'])->name('pesan.item');
Route::get('keranjang', [PesanController::class,'keranjang'])->name('keranjang');
Route::delete('keranjang/{id}', [PesanController::class,'delete'])->name('keranjang.delete');
Route::get('konfirmasi-checkout', [PesanController::class,'konfirmasi'])->name('konfirmasi');