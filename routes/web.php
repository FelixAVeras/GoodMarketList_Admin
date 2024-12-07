<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketTypesController;
use App\Http\Controllers\MarketsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

Route::resource('market-types', MarketTypesController::class);
Route::resource('markets', MarketsController::class);

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductsController::class);

Route::resource('users', UserController::class);