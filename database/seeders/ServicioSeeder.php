<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Cambio de aceite',          'costo_base' => 250,   'duracion_horas' => 1],
            ['nombre' => 'Revisión de frenos',         'costo_base' => 400,   'duracion_horas' => 2],
            ['nombre' => 'Alineación y balanceo',      'costo_base' => 350,   'duracion_horas' => 1],
            ['nombre' => 'Cambio de llantas',          'costo_base' => 1200,  'duracion_horas' => 2],
            ['nombre' => 'Diagnóstico computarizado',  'costo_base' => 300,   'duracion_horas' => 1],
            ['nombre' => 'Lavado completo',            'costo_base' => 150,   'duracion_horas' => 1],
            ['nombre' => 'Pulido y encerado',          'costo_base' => 600,   'duracion_horas' => 3],
            ['nombre' => 'Cambio de batería',          'costo_base' => 800,   'duracion_horas' => 1],
            ['nombre' => 'Revisión de suspensión',     'costo_base' => 500,   'duracion_horas' => 2],
            ['nombre' => 'Cambio de filtros',          'costo_base' => 200,   'duracion_horas' => 1],
            ['nombre' => 'Revisión de sistema eléctrico','costo_base' => 450, 'duracion_horas' => 2],
            ['nombre' => 'Cambio de correa de tiempo', 'costo_base' => 1500,  'duracion_horas' => 4],
            ['nombre' => 'Revisión de transmisión',    'costo_base' => 700,   'duracion_horas' => 3],
            ['nombre' => 'Revisión de motor',          'costo_base' => 900,   'duracion_horas' => 4],
            ['nombre' => 'Revisión de aire acondicionado','costo_base' => 350,'duracion_horas' => 2],
            ['nombre' => 'Tapizado de interiores',     'costo_base' => 2500,  'duracion_horas' => 8],
            ['nombre' => 'Pintura parcial',            'costo_base' => 3000,  'duracion_horas' => 8],
            ['nombre' => 'Pintura completa',           'costo_base' => 8000,  'duracion_horas' => 24],
            ['nombre' => 'Instalación de accesorios',  'costo_base' => 500,   'duracion_horas' => 2],
            ['nombre' => 'Revisión pre-venta',         'costo_base' => 400,   'duracion_horas' => 2],
        ];

        foreach ($servicios as $s) {
            DB::table('servicios')->insert(array_merge($s, [
                'descripcion' => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]));
        }
    }
}