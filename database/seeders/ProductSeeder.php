<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;
use App\Models\Market;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $markets = Market::all();

        $productsByCategory = [
            'Frutas y Verduras' => [
                ['name' => 'Manzana', 'unit' => 'kg'],
                ['name' => 'Plátano', 'unit' => 'kg'],
                ['name' => 'Zanahoria', 'unit' => 'kg'],
                ['name' => 'Espinaca', 'unit' => 'kg'],
                ['name' => 'Pimiento', 'unit' => 'unidad'],
            ],
            'Carnes y Pescados' => [
                ['name' => 'Pollo', 'unit' => 'kg'],
                ['name' => 'Carne de Res', 'unit' => 'kg'],
                ['name' => 'Pescado', 'unit' => 'kg'],
                ['name' => 'Cerdo', 'unit' => 'kg'],
                ['name' => 'Camarones', 'unit' => 'kg'],
            ],
            'Lácteos y Huevos' => [
                ['name' => 'Leche', 'unit' => 'litro'],
                ['name' => 'Huevos', 'unit' => 'docena'],
                ['name' => 'Queso', 'unit' => 'kg'],
                ['name' => 'Yogur', 'unit' => 'unidad'],
                ['name' => 'Mantequilla', 'unit' => 'kg'],
            ],
            'Bebidas' => [
                ['name' => 'Coca-Cola', 'unit' => 'litro'],
                ['name' => 'Agua Mineral', 'unit' => 'litro'],
                ['name' => 'Cerveza', 'unit' => 'litro'],
                ['name' => 'Jugo de Naranja', 'unit' => 'litro'],
                ['name' => 'Café', 'unit' => 'unidad'],
            ],
            'Panadería y Pastelería' => [
                ['name' => 'Pan Blanco', 'unit' => 'unidad'],
                ['name' => 'Pan Integral', 'unit' => 'unidad'],
                ['name' => 'Croissant', 'unit' => 'unidad'],
                ['name' => 'Tarta de Manzana', 'unit' => 'unidad'],
                ['name' => 'Donas', 'unit' => 'unidad'],
            ],
        ];

        // Crear productos
        foreach ($categories as $category) {
            if (!isset($productsByCategory[$category->name])) {
                continue;
            }

            foreach ($productsByCategory[$category->name] as $productData) {
                $product = Product::create([
                    'product_code' => 'PRD-' . strtoupper(str()->random(6)),
                    'barcode' => str_pad(rand(1, 999999999999), 12, '0', STR_PAD_LEFT),
                    'name' => $productData['name'],
                    'unit' => $productData['unit'],
                    'category_id' => $category->id,
                    'average_price' => rand(10, 100) / 10,
                    'image_url' => 'https://via.placeholder.com/150',
                    'isAvailable' => rand(0, 1),
                ]);

                // Asociar mercados aleatoriamente
                $randomMarkets = $markets->random(rand(1, $markets->count()));
                $product->markets()->sync($randomMarkets);
            }
        }
    }
}
