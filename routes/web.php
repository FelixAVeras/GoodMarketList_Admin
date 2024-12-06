<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketTypesController;
use App\Http\Controllers\MarketsController;
use App\Http\Controllers\CategoryController;

Route::resource('market-types', MarketTypesController::class);
Route::resource('markets', MarketsController::class);

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductsController::class);