<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
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
    /**Product Route*/
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

    /**User Route*/
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/edit/{id}', [UserController::class, 'updateCart'])->name('user.update');
    Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('profile');

    Route::post('like', [ProductController::class, 'like'])->name('like');
    Route::delete('like', [ProductController::class, 'unlike'])->name('unlike');

});
/**Admin Routes*/
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/register', [AuthController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [AuthController::class, 'createAdmin'])->name('admin.register');
Route::get('user/lists/show', [UserController::class, 'getAllUser'])->name('user.lists');
Route::get('/export/users', [UserController::class, 'exportUsers'])->name('users.export');
Route::get('user/edit/{id}', [UserController::class, 'create'])->name('user.edit');
Route::post('user/edit/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('category/lists/show', [CategoryController::class, 'getAllCategory'])->name('category.lists');

Route::get('/admin/dashboard', function () {

    return view('admin.dashboard');
})->middleware('auth:admin');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('mail/send', [AuthController::class, 'sendMail']);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('welcome', [HomeController::class, 'logout'])->name('welcome');