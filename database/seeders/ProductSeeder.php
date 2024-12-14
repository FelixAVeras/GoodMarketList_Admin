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
                ['name' => 'Manzana', 'unit' => 'Libra'],
                ['name' => 'Plátano', 'unit' => 'Unidad'],
                ['name' => 'Zanahoria', 'unit' => 'Libra'],
                ['name' => 'Espinaca', 'unit' => 'Libra'],
                ['name' => 'Pimiento', 'unit' => 'unidad'],
            ],
            'Carnes y Pescados' => [
                ['name' => 'Pollo', 'unit' => 'Libra'],
                ['name' => 'Carne de Res', 'unit' => 'Libra'],
                ['name' => 'Pescado', 'unit' => 'Libra'],
                ['name' => 'Cerdo', 'unit' => 'Libra'],
                ['name' => 'Camarones', 'unit' => 'Libra'],
            ],
            'Lácteos y Huevos' => [
                ['name' => 'Leche', 'unit' => 'litro'],
                ['name' => 'Huevos', 'unit' => 'docena'],
                ['name' => 'Queso', 'unit' => 'Libra'],
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
                    'barcode' => str_pad(rand(1, 999999999999), 12, '0', STR_PAD_LEFT),
                    'name' => $productData['name'],
                    'unit' => $productData['unit'],
                    'category_id' => $category->id,
                    // 'average_price' => rand(10, 100) / 10,
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
