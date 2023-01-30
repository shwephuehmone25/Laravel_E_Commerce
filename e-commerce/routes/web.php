<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('categories', CategoryController::class);

    Route::get('/', [ProductController::class, 'showAllProducts'])->name('lists');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::post('product/edit/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('category/{category_id}', [ProductController::class, 'relatedProducts'])->name('category.show');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('/cart/create', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('cart/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    /**User*/
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile');

    Route::post('like', [ProductController::class, 'like'])->name('like');
    Route::delete('like', [ProductController::class, 'unlike'])->name('unlike');
});

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('welcome', [HomeController::class, 'logout'])->name('welcome');