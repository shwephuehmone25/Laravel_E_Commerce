<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
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
    Route::get('/mypost/{user_id}', [UserController::class, 'getMyPost'])->name('mypost.show');
    Route::get('/contact', [UserController::class, 'getContact'])->name('contact.get');
    Route::post('checkout', [ProductController::class, 'checkOut'])->name('order.checkout');
    Route::post('/rating/{product}', [ProductController::class, 'getRatings'])->name('ratings.get');

    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/reviews/store', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/reviews/show', [ReviewController::class, 'showReviews'])->name('review.show');

    Route::post('like', [ProductController::class, 'like'])->name('like');
    Route::delete('like', [ProductController::class, 'unlike'])->name('unlike');

});
/**Admin Routes*/
Route::group([IsAdmin::class, 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('admin.login');
    Route::get('/admin/register', [AuthController::class, 'showAdminRegisterForm'])->name('admin.register-view');
    Route::post('/admin/register', [AuthController::class, 'createAdmin'])->name('admin.register');
    Route::get('user/lists/show', [AdminUserController::class, 'getAllUser'])->name('user.lists');
    Route::get('/user/create', [AdminUserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [AdminUserController::class, 'store'])->name('user.store');
    Route::get('/export/users', [AdminUserController::class, 'exportUsers'])->name('users.export');
    Route::post('import/users', [AdminUserController::class, 'importUser'])->name('users.import');
    Route::get('user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('user/edit/{user}', [AdminUserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [AdminUserController::class, 'destroy'])->name('user.destroy');
    Route::get('user/chart', [AdminUserController::class, 'getAllUserByChart'])->name('chart');

    Route::get('category/lists/show', [AdminCategoryController::class, 'getAllCategory'])->name('category.lists');
    Route::get('/export/categories', [AdminCategoryController::class, 'exportCategory'])->name('categories.export');
    Route::post('import/categories', [AdminCategoryController::class, 'importCategory'])->name('categories.import');

    Route::get('product/lists/show', [AdminProductController::class, 'getAllProducts'])->name('products.lists');
    Route::get('admin/edit/{product}', [AdminProductController::class, 'edit'])->name('edit.product');
    Route::post('admin/edit/{product}', [AdminProductController::class, 'update'])->name('update.product');
    Route::delete('admin/product/{product}', [AdminProductController::class, 'destroy'])->name('product.remove');

    Route::get('/admin/dashboard', function () {

        return view('admin.dashboard');
    })->middleware('auth:admin');

    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    });
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('mail/send', [AuthController::class, 'sendMail']);
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');