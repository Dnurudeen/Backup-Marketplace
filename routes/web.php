<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\MarketplaceController;
    use App\Http\Controllers\SellerController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\CategoryController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\SubscriptionController;

    Route::get('/', [MarketplaceController::class, 'index'])->name('marketplace');
    Route::get('/item/{id}', [MarketplaceController::class, 'viewItem'])->name('item.view');

    // Click Route
    // Route::post('/seller/items', [ClickController::class, 'trackItemClick'])->name('track.click');

    // Click Route
    Route::post('/item/{id}', [ItemController::class, 'trackClick'])->name('item.click');

    // Seller routes
    Route::middleware(['auth', 'role:seller', 'check.subscription'])->group(function () {
        // Route::get('/seller/items/create', [SellerController::class, 'createItem'])->name('seller.items.create');
    });
    // Route::middleware(['auth', 'role:seller', 'CheckSellerSubscription'])->group(function () {
    Route::middleware(['auth', 'role:seller'])->group(function () {
        Route::get('/seller/items', [SellerController::class, 'index'])->name('seller.items');
        Route::get('/seller/items/create', [SellerController::class, 'createItem'])->name('seller.items.create');
        Route::post('/seller/items', [SellerController::class, 'storeItem'])->name('seller.items.store');
        Route::get('/seller/items/faq', [SellerController::class, 'faq'])->name('seller.faq');
        Route::get('/seller/items/{id}/edit', [SellerController::class, 'editItem'])->name('seller.items.edit');
        Route::put('/seller/items/{id}', [SellerController::class, 'updateItem'])->name('seller.items.update');
        Route::delete('/seller/items/{id}', [SellerController::class, 'destroyItem'])->name('seller.items.destroy');

        Route::get('/seller/personal-info', [SellerController::class, 'personalInfo'])->name('personal.info');
        Route::put('/seller/personal-info', [SellerController::class, 'updateInfo'])->name('update.personal.info');

        Route::get('/seller/delete-account', [SellerController::class, 'deleteAccount'])->name('delete.account');

        Route::get('/performance', [PerformanceController::class, 'performance'])->name('performance');
        Route::delete('/seller/delete-account', [SellerController::class, 'destroyAccount'])->name('seller.account.destroy');
    });

    // Admin routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/admin/categories', CategoryController::class);
    });

    Route::middleware('auth')->group(function () {
        // Payment Routes
        Route::get('/payments', [PaymentController::class, 'showPaymentsPage'])->name('payments');
        Route::post('/payments', [PaymentController::class, 'processPayment'])->name('payments.store');

        // Ads Routes
        Route::get('/ads', [AdController::class, 'showAdsPage'])->name('ads');
        Route::post('/ads', [AdController::class, 'createAd'])->name('ads.store');
    });

    // Subscription Routes
    Route::get('/subscribe', [SubscriptionController::class, 'showSubscriptionPage'])->name('subscribe');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe.store');


    // Authentication Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
