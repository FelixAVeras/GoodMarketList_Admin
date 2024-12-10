<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Market;
use App\Models\City;
use App\Models\MarketType;

use Illuminate\Support\Facades\Log;

class MarketsController extends Controller
{
    public function index() {
        $markets = Market::with(['cities', 'marketType'])->get();

        return view('markets.index', compact('markets'));
    }

    public function show(Market $market)
    {
        // Aquí no es necesario buscar el mercado manualmente con Market::find($id)
        // ya que estamos utilizando la inyección de dependencias de Eloquent.

        // Cargar las relaciones necesarias, por ejemplo, las ciudades y el tipo de mercado.
        $market->load(['cities', 'marketType', 'products']);

        return view('markets.show', compact('market'));
    }

    public function create() {
        $marketTypes = MarketType::all();
        $cities = City::all();
    
        return view('markets.create', compact('marketTypes', 'cities'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'market_type_id' => 'required|exists:market_types,id',
            'city_ids' => 'nullable|array',
            'city_ids.*' => 'exists:cities,id',
        ]);

        $market = Market::create([
            'name' => $request->name,
            'market_type_id' => $request->market_type_id,
        ]);

        // Asignar las ciudades al mercado
        if ($request->has('city_ids')) {
            $market->cities()->sync($request->city_ids);
        }

        return redirect()->route('markets.index')->with('success', 'Mercado creado exitosamente.');
    }

    public function edit(Market $market)
    {
        $marketTypes = MarketType::all();
        $cities = City::all();
    
        return view('markets.edit', compact('market', 'marketTypes', 'cities'));
    }

    public function update(Request $request, Market $market) {
        $request->validate([
            'name' => 'required|string|max:255',
            'market_type_id' => 'required|exists:market_types,id',
            'city_ids' => 'nullable|array',
            'city_ids.*' => 'exists:cities,id',
        ]);

        $market->update([
            'name' => $request->name,
            'market_type_id' => $request->market_type_id,
        ]);

        // Actualizar las ciudades asociadas al mercado
        if ($request->has('city_ids')) {
            $market->cities()->sync($request->city_ids);
        } else {
            $market->cities()->detach(); // Si no se selecciona ninguna ciudad, desvincula todas
        }

        return redirect()->route('markets.index')->with('success', 'Mercado actualizado exitosamente.');
    }

    public function destroy(Market $market)
    {
        $market->delete();
        return redirect()->route('markets.index')->with('success', 'Market eliminado exitosamente.');
    }
}
