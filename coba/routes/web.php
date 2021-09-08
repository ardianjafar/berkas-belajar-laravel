<?php

use App\Http\Controllers\{PostController,LoginController};
use App\Models\Category;
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

Route::get('/home', function () {
    return view('home',[
        'active'    => "home"
    ]);
});
Route::get('/about', function () {
    return view('about',[
        'active'    => "about",
        'title'     => "About",
        'name'      => "Ardian Ja'far",
        'gambar'    => "Manyan.jpg",
        'pekerjaan' => "Backend Developer"
    ]);
});


Route::get('/posts', [PostController::class,'index']);

Route::get('/posts/{post:slug}', [PostController::class,'show']);

Route::get('/categories', function () {
    return view('categories',[
        'title'     => 'Post Categories', 
        'active'    => "categories",
        'categories'     => Category::all(),
    ]);
});

Route::get('/login', [LoginController::class,'index']);