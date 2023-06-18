<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StaffController;
use App\Models\Staff;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/team', function () {return view('team');});
Route::get('/drop', [ProductController::class, 'shopIndex'])->name('drop');
Route::get('/drop/details/{productId}', [ProductController::class, 'showDetails'])->name('drop.details');
Route::get('/collection', function () {return view('collection');});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class ,'index'])->name('cart');
    Route::post('/cart', [CartController::class ,'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class ,'destroy'])->name('cart.destroy');
    Route::get('/cart/empty', [CartController::class ,'empty'])->name('cart.empty');
    Route::get('cart/checkout', [CheckoutController::class ,'index'])->name('checkout.index');
    Route::post('cart/checkout', [CheckoutController::class , 'store'])->name('checkout.store');

});

//confirmar pedido

//EN DESARROLLO


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/reviews', [ProductController::class, 'showReviews'])->name('products.reviews');
    
    Route::resource('orders', OrderController::class);
    
    Route::get('stores/{store}/staff', [StoreController::class, 'staff'])->name('stores.staff');
    Route::get('staff', [StaffController::class, 'create'])->name('staff.create');

    Route::get('/photos', [ImageController::class, 'index'])->name('photos.index');
    Route::get('/photos/create', [ImageController::class, 'create'])->name('photos.create');
    Route::post('/photos', [ImageController::class, 'store'])->name('photos.store');
    Route::post('/photos/destroy', [ImageController::class, 'destroy'])->name('photos.destroy');

    //en desarrollo
    Route::post('staff', [StaffController::class, 'store'])->name('staff.store');
});

Route::middleware('auth','role:admin|staff')->group(function () {
    Route::get('/stores/{store}/stocktaking', [StoreController::class, 'stocktaking'])->name('stores.stocktaking');
    Route::resource('stores', StoreController::class);
});

Route::fallback(function () {
    return view('welcome');
});

require __DIR__.'/auth.php';