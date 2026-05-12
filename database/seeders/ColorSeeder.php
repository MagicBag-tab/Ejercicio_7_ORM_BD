<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colores = [
            ['nombre' => 'Blanco',        'codigo_hex' => '#FFFFFF'],
            ['nombre' => 'Negro',         'codigo_hex' => '#000000'],
            ['nombre' => 'Gris',          'codigo_hex' => '#808080'],
            ['nombre' => 'Plata',         'codigo_hex' => '#C0C0C0'],
            ['nombre' => 'Rojo',          'codigo_hex' => '#FF0000'],
            ['nombre' => 'Azul',          'codigo_hex' => '#0000FF'],
            ['nombre' => 'Azul marino',   'codigo_hex' => '#000080'],
            ['nombre' => 'Verde',         'codigo_hex' => '#008000'],
            ['nombre' => 'Amarillo',      'codigo_hex' => '#FFFF00'],
            ['nombre' => 'Dorado',        'codigo_hex' => '#FFD700'],
            ['nombre' => 'Beige',         'codigo_hex' => '#F5F5DC'],
            ['nombre' => 'Café',          'codigo_hex' => '#A52A2A'],
            ['nombre' => 'Naranja',       'codigo_hex' => '#FFA500'],
            ['nombre' => 'Vino',          'codigo_hex' => '#800000'],
            ['nombre' => 'Champagne',     'codigo_hex' => '#F7E7CE'],
            ['nombre' => 'Grafito',       'codigo_hex' => '#383838'],
            ['nombre' => 'Bronce',        'codigo_hex' => '#CD7F32'],
            ['nombre' => 'Verde militar', 'codigo_hex' => '#4B5320'],
            ['nombre' => 'Celeste',       'codigo_hex' => '#87CEEB'],
            ['nombre' => 'Rosa',          'codigo_hex' => '#FFC0CB'],
        ];

        foreach ($colores as $color) {
            DB::table('colores')->insert(array_merge($color, [
                'created_at' => now(), 'updated_at' => now()
            ]));
        }
    }
}