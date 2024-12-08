<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Frutas y Verduras',
            'Carnes',
            'Pescados y Mariscos',
            'Lácteos',
            'Panadería',
            'Bebidas',
            'Congelados',
            'Cereales y Galletas',
            'Productos de Limpieza',
            'Higiene Personal',
            'Electrodomésticos',
            'Ropa y Accesorios',
            'Cuidado Infantil',
            'Abarrotes',
            'Snacks y Golosinas',
            'Limpieza'
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
