<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\CategoeryContoller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\cart;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
// Route::get('/',[CategoryController::class,'show']);
Route::get('/',[ProductController::class,'index'])->name('home');
Route::get('categories/{category:name}',[CategoryController::class,'show']);
Route::get('products/{product:name}',[ProductController::class,'display']);

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

//     // Route::get('/dashboard', function () { return Inertia::render('Dashboard');});
//     Route::get('/users', function () { return Inertia::render('Dashboard');});


// });


Route::middleware('auth')->group(function () {
    Route::get('/favorites',[FavoriteController::class,'index']);
    Route::post('/favorites/create',[FavoriteController::class,'create'])->name('fav.create');

    Route::get('/carts',[CartController::class,'index']);
    Route::post('/carts/update',[CartController::class,'update'])->name('cart.update');
    Route::post('/carts/create',[CartController::class,'create'])->name('cart.create');
    Route::delete('carts/{id}', [CartController::class,'destroy'])->name('cart.destroy');

    Route::get('/checkOut',[CheckoutController::class,'index']);
    Route::post('/checkOut/store',[CheckoutController::class,'store']);


    Route::get('/profile/show', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/MyOrders', [ProfileController::class, 'ShowOrder'])->name('profile.ShowOrder');
    Route::get('/profile/MyOrders/{order}', [ProfileController::class, 'ShowOrderItem'])->name('profile.ShowOrderItem');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/categories', [CategoeryContoller::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/create', [CategoeryContoller::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [CategoeryContoller::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/edit/{category}', [CategoeryContoller::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/update/{category}', [CategoeryContoller::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [CategoeryContoller::class, 'destroy'])->name('admin.categories.destroy');

    Route::resources(['/admin/products' => AdminProductController::class,]);


});

require __DIR__.'/auth.php';
