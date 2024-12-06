<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Azua'],
            ['name' => 'Bahoruco'],
            ['name' => 'Barahona'],
            ['name' => 'Dajabón'],
            ['name' => 'Distrito Nacional'],
            ['name' => 'Duarte'],
            ['name' => 'Elías Piña'],
            ['name' => 'El Seibo'],
            ['name' => 'Espaillat'],
            ['name' => 'Hato Mayor'],
            ['name' => 'Hermanas Mirabal'],
            ['name' => 'Independencia'],
            ['name' => 'La Altagracia'],
            ['name' => 'La Romana'],
            ['name' => 'La Vega'],
            ['name' => 'María Trinidad Sánchez'],
            ['name' => 'Monseñor Nouel'],
            ['name' => 'Monte Cristi'],
            ['name' => 'Monte Plata'],
            ['name' => 'Pedernales'],
            ['name' => 'Peravia'],
            ['name' => 'Puerto Plata'],
            ['name' => 'Samaná'],
            ['name' => 'San Cristóbal'],
            ['name' => 'San José de Ocoa'],
            ['name' => 'San Juan de la Maguana'],
            ['name' => 'San Pedro de Macorís'],
            ['name' => 'Sánchez Ramírez'],
            ['name' => 'Santiago de los Caballeros'],
            ['name' => 'Santiago Rodríguez'],
            ['name' => 'Santo Domingo'],
            ['name' => 'Valverde']
        ];

        foreach ($provinces as $province) {
            City::create($province);
        }
    }
}
