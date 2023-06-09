<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/team', function () {
    return view('team');
});
Route::get('/drop', function(){
    return view('shop.newdrop');
});
Route::get('/shop/detail', function(){
    return view('shop.details');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/reviews', [ProductController::class, 'showReviews'])->name('products.reviews');
    Route::resource('orders', OrderController::class);
    Route::resource('stores', StoreController::class);
    Route::get('stores/{store}/staff', [StoreController::class, 'staff'])->name('stores.staff');
    Route::get('/stores/{store}/stocktaking', [StoreController::class, 'stocktaking'])->name('stores.stocktaking');
});

use App\Http\Controllers\ImageController;

Route::get('/photos', [ImageController::class, 'index'])->name('photos.index');
Route::get('/photos/create', [ImageController::class, 'create'])->name('photos.create');
Route::post('/photos', [ImageController::class, 'store'])->name('photos.store');

require __DIR__.'/auth.php';
