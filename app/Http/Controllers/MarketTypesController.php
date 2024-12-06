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

    public function create() {
        return view('market-types.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        MarketType::create($request->all());
        return redirect()->route('market-types.index')->with('success', 'Tipo de mercado creado exitosamente.');
    }

    public function edit(MarketType $marketType)
    {
        return view('market-types.edit', compact('marketType'));
    }

    public function update(Request $request, MarketType $marketType)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $marketType->update($request->all());
        return redirect()->route('market-types.index')->with('success', 'Tipo de mercado actualizado exitosamente.');
    }

    public function destroy(MarketType $marketType)
    {
        $marketType->delete();
        return redirect()->route('market-types.index')->with('success', 'Tipo de mercado eliminado exitosamente.');
    }
}
