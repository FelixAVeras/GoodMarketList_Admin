<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MarketType;

class MarketTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketType::create(['name' => 'Hipermercado']);
        MarketType::create(['name' => 'Supermercado']);
        MarketType::create(['name' => 'Mercado']);
        MarketType::create(['name' => 'Colmado']);
        MarketType::create(['name' => 'Almacen']);
        MarketType::create(['name' => 'Otros']);
    }
}
