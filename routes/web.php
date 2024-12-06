<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketTypesController;
use App\Http\Controllers\MarketsController;

Route::resource('market-types', MarketTypesController::class);
Route::resource('markets', MarketsController::class);
