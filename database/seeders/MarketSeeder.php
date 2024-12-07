<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Market;
use App\Models\City;
use App\Models\MarketType;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $markets = [
            ['name' => 'Supermercado Nacional', 'market_type' => 'Supermercado'],
            ['name' => 'Jumbo', 'market_type' => 'Supermercado'],
            ['name' => 'La Sirena', 'market_type' => 'Supermercado'],
            ['name' => 'Plaza Lama', 'market_type' => 'Hipermercado'],
            ['name' => 'Olé', 'market_type' => 'Supermercado'],
            ['name' => 'Carrefour', 'market_type' => 'Hipermercado'],
            ['name' => 'Supermercado Pola', 'market_type' => 'Supermercado'],
            ['name' => 'Supermercado Bravo', 'market_type' => 'Supermercado'],
            ['name' => 'Super Ahorros', 'market_type' => 'Supermercado'],
            ['name' => 'Mercado Modelo', 'market_type' => 'Mercado'],
        ];

        $marketTypes = MarketType::all()->pluck('id', 'name');
        
        if ($marketTypes->isEmpty()) {
            foreach (['Supermercado', 'Hipermercado', 'Mercado'] as $type) {
                $marketTypes[$type] = MarketType::create(['name' => $type])->id;
            }
        }

        $cities = City::all();
        
        if ($cities->isEmpty()) {
            $this->command->info('No hay ciudades en la base de datos. Crea algunas primero.');
            
            return;
        }

        foreach ($markets as $marketData) {
            $market = Market::create([
                'name' => $marketData['name'],
                'market_type_id' => $marketTypes[$marketData['market_type']],
            ]);

            $market->cities()->attach($cities->random(rand(1, 5))->pluck('id'));
        }
    }
}
