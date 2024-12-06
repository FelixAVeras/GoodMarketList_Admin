<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketTypesController;

Route::resource('market-types', MarketTypesController::class);
