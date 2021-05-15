<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
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




// Route::get('/contoh',[ContohController::class, 'index']) => apa bila controller terdapat resource

Route::get('/post/search', [SearchController::class, 'post'])->name('posts.search');

Route::get('/post', [PostController::class, 'index'])->name('posts.index');

Route::prefix('post')->middleware('auth')->group(function () {


    Route::get('create', [PostController::class, 'create'])->name('posts.create');
    Route::post('store', [PostController::class, 'store']);
    Route::get('{post:slug}/edit', [PostController::class, 'edit']);
    Route::patch('{post:slug}/edit', [PostController::class, 'update']);
    Route::delete('{post:slug}/delete', [PostController::class, 'destroy']);
});


Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag:slug}', [TagController::class, 'show'])->name('tags.show');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');



Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
