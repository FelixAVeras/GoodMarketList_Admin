<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MarketType;

class MarketTypesController extends Controller
{
    public function index() {
        $marketTypes = MarketType::all();

        return view('market-types.index', compact('marketTypes'));
    }
}
