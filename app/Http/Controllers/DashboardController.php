<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Market;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index() {
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        $totalMarkets = Market::count();

        $totalProducts = Product::count();

        // $latestProducts = Product::latest()->take(10)->get();
        $latestProducts = Product::with('markets')->latest()->take(10)->get();
        $lastMarket = Market::latest()->first();

        //TODO: hacer modulo de ofertas
        // $latestOffers = Offer::latest()->take(5)->get();

        return view('dashboard.index', 
            compact('user', 'role', 
                'totalMarkets', 'totalProducts',
                'latestProducts', 'lastMarket',));
    }
}
