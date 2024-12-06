<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Market;
use App\Models\City;
use App\Models\MarketType;

class MarketsController extends Controller
{
    public function index() {
        $markets = Market::with(['city', 'marketType'])->get();

        return view('markets.index', compact('markets'));
    }

    public function create() {
        $cities = City::all();
        $marketTypes = MarketType::all();

        return view('markets.create', compact('cities', 'marketTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'market_type_id' => 'required|exists:market_types,id',
        ]);

        Market::create($request->all());
        return redirect()->route('markets.index')->with('success', 'Market creado exitosamente.');
    }

    public function edit(Market $market)
    {
        $cities = City::all();
        $marketTypes = MarketType::all();
        return view('markets.edit', compact('market', 'cities', 'marketTypes'));
    }

    public function update(Request $request, Market $market)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required|exists:cities,id',
            'market_type_id' => 'required|exists:market_types,id',
        ]);

        $market->update($request->all());
        return redirect()->route('markets.index')->with('success', 'Market actualizado exitosamente.');
    }

    public function destroy(Market $market)
    {
        $market->delete();
        return redirect()->route('markets.index')->with('success', 'Market eliminado exitosamente.');
    }
}
