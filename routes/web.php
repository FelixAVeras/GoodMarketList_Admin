<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketTypesController;
use App\Http\Controllers\MarketsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('market-types', MarketTypesController::class);

    Route::resource('markets', MarketsController::class);
    
    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductsController::class);
    
    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);
});

/**Rutas para los roles cuando haya */
// Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//     Route::resource('market-types', MarketTypesController::class);

//     Route::resource('markets', MarketsController::class);
    
//     Route::resource('categories', CategoryController::class);

//     Route::resource('products', ProductsController::class);
    
//     Route::resource('users', UserController::class);

//     Route::resource('roles', RoleController::class);
// });

// Route::group(['middleware' => ['role:manager']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
//     Route::resource('markets', MarketsController::class)->only(['index', 'show']);

//     Route::resource('products', ProductsController::class)->only([
//         'index', 'show', 'create', 'store', 'edit'
//     ])->middleware('permission:create product|edit product|show product|store product');

//     Route::resource('categories', CategoryController::class)->only([
//         'index', 'show', 'create', 'store', 'edit'
//     ])->middleware('permission:show categories|create category|edit category|store category');

//     Route::resource('offers', OffersController::class)->only([
//         'index', 'show', 'create'
//     ])->middleware('permission:show offers|create offer');
// });
