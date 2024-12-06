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
        MarketType::create(['markettypename' => 'Hipermercado']);
        MarketType::create(['markettypename' => 'Supermercado']);
        MarketType::create(['markettypename' => 'Mercado']);
        MarketType::create(['markettypename' => 'Colmado']);
        MarketType::create(['markettypename' => 'Almacen']);
        MarketType::create(['markettypename' => 'Otros']);
    }
}
