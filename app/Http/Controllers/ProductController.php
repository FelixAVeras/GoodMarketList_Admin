<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Product;
use App\Models\Market;
use App\Models\Category;
use App\Models\ProductBarcode;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('manager') && !$user->market) {
            return redirect()->back()->with('error', 'No tiene un mercado asociado.');
        }

        $products = Product::with('category', 'markets')
            ->when($user->hasRole('manager'), function ($query) use ($user) {
                $query->whereHas('markets', fn($q) => $q->where('markets.id', $user->market->id));
            })
            ->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $averagePrice = $product->calculateAveragePrice();

        return view('products.show', [
            'product' => $product,
            'markets' => $product->markets,
            'averagePrice' => $averagePrice,
        ]);
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->hasRole('manager')) {
            $market = $user->market;

            if (!$market) {
                return redirect()->back()->with('error', 'No tiene un mercado asociado.');
            }

            $categories = Category::all();

            return view('products.create', [
                'market' => $market,
                'categories' => $categories,
            ]);
        }

        $markets = Market::all();
        $categories = Category::all();

        return view('products.create', [
            'markets' => $markets,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'barcode' => 'nullable',
            'name' => 'required',
            'unit' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'markets' => $user->hasRole('admin') ? 'required|array' : 'nullable',
            'markets.*' => 'exists:markets,id',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'barcodes' => 'nullable|string',
            'isAvailable' => 'boolean',
            'market_id' => $user->hasRole('manager') ? 'required|exists:markets,id' : 'nullable|exists:markets,id'
        ]);

        $validated['isAvailable'] = $request->has('isAvailable');

        DB::transaction(function () use ($validated, $request, $user) {
            $product = Product::create($validated);

            $marketId = $validated['market_id'];
            $price = $validated['price'];

            $product->markets()->attach($marketId, ['price' => $price]);

            $product->calculateAveragePrice();

            if ($request->barcodes) {
                $this->storeBarcodes($product, $request->barcodes);
            }

            if ($user->hasRole('admin')) {
                foreach ($request->markets as $marketId) {
                    $product->markets()->attach($marketId, ['price' => $validated['price']]);
                }
            } elseif ($user->hasRole('manager')) {
                $managerMarket = $user->market;
                $product->markets()->attach($managerMarket->id, ['price' => $validated['price']]);
            }
        });

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        // Obtener el producto por ID
        $product = Product::findOrFail($id);

        // Obtener las categorías y mercados para usarlos en la vista
        $categories = Category::all();
        $markets = Market::all();

        // Verificar si el usuario tiene un mercado asignado (en caso de ser manager)
        $user = Auth::user();
        $userMarket = $user->hasRole('manager') ? $user->market : null;

        // Pasar el producto, categorías y mercados a la vista
        return view('products.edit', compact('product', 'categories', 'markets', 'userMarket'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'barcode' => 'nullable',
            'name' => 'required',
            'unit' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'market_id' => 'nullable|exists:markets,id',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'isAvailable' => 'boolean',
        ]);

        $validated['isAvailable'] = $request->has('isAvailable');

        DB::transaction(function () use ($validated, $request, $product, $user) {
            // Actualizamos los campos del producto
            $product->update($validated);

            // Actualizamos los mercados y los precios asociados
            $marketId = $validated['market_id'];
            $price = $validated['price'];

            // Limpiamos los mercados actuales y los asociamos con el nuevo precio
            $product->markets()->sync([$marketId => ['price' => $price]]);

            // Si el usuario es un manager, solo puede asociar su propio mercado
            if ($user->hasRole('manager')) {
                $managerMarket = $user->market;
                $product->markets()->sync([$managerMarket->id => ['price' => $validated['price']]]);
            }
        });

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }


    private function storeBarcodes(Product $product, $barcodes)
    {
        if (!$barcodes) return;

        $barcodes = explode(',', $barcodes);

        foreach ($barcodes as $barcode) {
            $exists = ProductBarcode::where('barcode', trim($barcode))->exists();

            if ($exists) {
                throw ValidationException::withMessages([
                    'barcodes' => "El código de barras '{$barcode}' ya existe.",
                ]);
            }

            ProductBarcode::create([
                'product_id' => $product->id,
                'barcode' => trim($barcode),
            ]);
        }
    }
}
