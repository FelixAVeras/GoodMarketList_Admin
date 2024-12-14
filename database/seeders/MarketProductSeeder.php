<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Market;
use App\Models\Product;

class MarketProductSeeder extends Seeder
{
    public function run(): void
    {
        $markets = Market::all();
        $products = Product::all();

        if ($markets->isEmpty() || $products->isEmpty()) {
            $this->command->info('No markets or products found. Please seed them first.');
            return;
        }

        foreach ($products as $product) {
            $randomMarkets = $markets->random(rand(1, 3));

            foreach ($randomMarkets as $market) {
                DB::table('market_product')->insert([
                    'market_id' => $market->id,
                    'product_id' => $product->id,
                    'price' => rand(50, 500)
                ]);
            }
        }
    }
}
