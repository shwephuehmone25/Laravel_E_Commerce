<?php

use App\Http\Controllers\AuthController;
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

    Route::get('cart', [ProductController::class, 'cart'])->name('cart.list');
    Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
    Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

    /**User*/
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/edit/{id}', [UserController::class, 'updateCart'])->name('user.update');
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile');

    Route::post('like', [ProductController::class, 'like'])->name('like');
    Route::delete('like', [ProductController::class, 'unlike'])->name('unlike');

});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('mail/send', [AuthController::class, 'sendMail']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('welcome', [HomeController::class, 'logout'])->name('welcome');