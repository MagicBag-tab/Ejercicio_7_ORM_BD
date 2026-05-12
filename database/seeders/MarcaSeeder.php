<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            ['nombre' => 'Toyota',      'pais_origen' => 'Japón',          'fundada_en' => 1937],
            ['nombre' => 'Honda',       'pais_origen' => 'Japón',          'fundada_en' => 1948],
            ['nombre' => 'Ford',        'pais_origen' => 'Estados Unidos',  'fundada_en' => 1903],
            ['nombre' => 'Chevrolet',   'pais_origen' => 'Estados Unidos',  'fundada_en' => 1911],
            ['nombre' => 'Nissan',      'pais_origen' => 'Japón',          'fundada_en' => 1933],
            ['nombre' => 'Hyundai',     'pais_origen' => 'Corea del Sur',   'fundada_en' => 1967],
            ['nombre' => 'Kia',         'pais_origen' => 'Corea del Sur',   'fundada_en' => 1944],
            ['nombre' => 'Volkswagen',  'pais_origen' => 'Alemania',        'fundada_en' => 1937],
            ['nombre' => 'BMW',         'pais_origen' => 'Alemania',        'fundada_en' => 1916],
            ['nombre' => 'Mercedes',    'pais_origen' => 'Alemania',        'fundada_en' => 1926],
            ['nombre' => 'Mazda',       'pais_origen' => 'Japón',          'fundada_en' => 1920],
            ['nombre' => 'Mitsubishi',  'pais_origen' => 'Japón',          'fundada_en' => 1917],
            ['nombre' => 'Suzuki',      'pais_origen' => 'Japón',          'fundada_en' => 1909],
            ['nombre' => 'Subaru',      'pais_origen' => 'Japón',          'fundada_en' => 1953],
            ['nombre' => 'Jeep',        'pais_origen' => 'Estados Unidos',  'fundada_en' => 1941],
        ];

        foreach ($marcas as $marca) {
            DB::table('marcas')->insert(array_merge($marca, [
                'created_at' => now(), 'updated_at' => now()
            ]));
        }
    }
}