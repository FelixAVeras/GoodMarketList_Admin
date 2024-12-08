<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Market;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'markets')->get();
        
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $markets = $product->markets;
        
        return view('products.show', compact('product', 'markets'));
    }

    public function create()
    {
        $markets = Market::all();
        $categories = Category::all();

        return view('products.create', compact('markets', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => 'required|unique:products',
            'barcode' => 'nullable',
            'name' => 'required',
            'unit' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'markets' => 'required|array',
            'barcodes' => 'nullable|string',
            'isAvailable' => 'boolean',
        ]);

        $validated['isAvailable'] = $request->has('isAvailable');

        $product = Product::create($validated);

        // Asociar los códigos de barras
        if ($request->barcodes) {
            $barcodes = explode(',', $request->barcodes);
            foreach ($barcodes as $barcode) {
                ProductBarcode::create([
                    'product_id' => $product->id,
                    'barcode' => trim($barcode),
                ]);
            }
        }

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            foreach ($request->markets as $marketId) {
                $market = Market::find($marketId);
                $product->markets()->attach($market);
            }
        } 
        elseif ($user->hasRole('manager')) {
            $managerMarket = $user->market;
            $product->markets()->attach($managerMarket);
        }

        $product->average_price = $product->calculateAveragePrice();
        $product->save();

        return redirect()->route('products.index');
    }

}
