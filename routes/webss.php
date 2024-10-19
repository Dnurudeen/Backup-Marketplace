<?php

use App\Http\Controllers\SellerController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\MarketplaceController::class, 'index'])->name('marketplace');
Route::get('/item/{id}', [App\Http\Controllers\MarketplaceController::class, 'viewItem'])->name('item.view');

// Seller routes
Route::middleware(['auth', 'role:seller'])->group(function () {
    Route::get('/seller/items', [SellerController::class, 'index'])->name('seller.items');
    Route::get('/seller/items/create', [SellerController::class, 'createItem'])->name('seller.items.create');
    Route::post('/seller/items', [SellerController::class, 'storeItem'])->name('seller.items.store');
    Route::get('/seller/items/{id}/edit', [SellerController::class, 'editItem'])->name('seller.items.edit');
    Route::put('/seller/items/{id}', [SellerController::class, 'updateItem'])->name('seller.items.update');
    Route::delete('/seller/items/{id}', [SellerController::class, 'destroyItem'])->name('seller.items.destroy');

});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/categories', CategoryController::class);
});


// // route for the seller dashboard
// Route::middleware(['auth', 'role:seller', 'CheckSellerSubscription'])->group(function () {
//     // Route::get('/seller/items', [SellerController::class, 'index']);
//     Route::post('/seller/items', [SellerController::class, 'store']);
//     Route::get('/seller/items', [SellerController::class, 'index'])->name('seller.items');
//     Route::get('/seller/items/create', [SellerController::class, 'createItem'])->name('seller.items.create');
//     Route::post('/seller/items', [SellerController::class, 'storeItem'])->name('seller.items.store');
//     Route::get('/seller/items/{id}/edit', [SellerController::class, 'editItem'])->name('seller.items.edit');
//     Route::put('/seller/items/{id}', [SellerController::class, 'updateItem'])->name('seller.items.update');
//     Route::delete('/seller/items/{id}', [SellerController::class, 'destroyItem'])->name('seller.items.destroy');
// });


// // route for the admin dashboard
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::resource('/admin/categories', CategoryController::class);
// });
