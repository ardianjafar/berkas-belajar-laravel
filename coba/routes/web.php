<?php

use App\Http\Controllers\{DashboardPostController, PostController,LoginController, RegisterController};
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

Route::get('/', function () {
    return view('home',[
        'title'     => "Home",
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

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);
Route::get('/dashboard', function() {
   return view('dashboard.index'); 
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class,'checkSLug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');