<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CitiesSeeder::class);
        $this->call(MarketTypesSeeder::class);
        $this->call(MarketSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MarketProductSeeder::class);
    }
}
