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
            ['CityName' => 'Azua'],
            ['CityName' => 'Bahoruco'],
            ['CityName' => 'Barahona'],
            ['CityName' => 'Dajabón'],
            ['CityName' => 'Distrito Nacional'],
            ['CityName' => 'Duarte'],
            ['CityName' => 'Elías Piña'],
            ['CityName' => 'El Seibo'],
            ['CityName' => 'Espaillat'],
            ['CityName' => 'Hato Mayor'],
            ['CityName' => 'Hermanas Mirabal'],
            ['CityName' => 'Independencia'],
            ['CityName' => 'La Altagracia'],
            ['CityName' => 'La Romana'],
            ['CityName' => 'La Vega'],
            ['CityName' => 'María Trinidad Sánchez'],
            ['CityName' => 'Monseñor Nouel'],
            ['CityName' => 'Monte Cristi'],
            ['CityName' => 'Monte Plata'],
            ['CityName' => 'Pedernales'],
            ['CityName' => 'Peravia'],
            ['CityName' => 'Puerto Plata'],
            ['CityName' => 'Samaná'],
            ['CityName' => 'San Cristóbal'],
            ['CityName' => 'San José de Ocoa'],
            ['CityName' => 'San Juan de la Maguana'],
            ['CityName' => 'San Pedro de Macorís'],
            ['CityName' => 'Sánchez Ramírez'],
            ['CityName' => 'Santiago de los Caballeros'],
            ['CityName' => 'Santiago Rodríguez'],
            ['CityName' => 'Santo Domingo'],
            ['CityName' => 'Valverde']
        ];

        foreach ($provinces as $province) {
            City::create($province);
        }
    }
}
