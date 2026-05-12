<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarroServicioSeeder extends Seeder
{
    public function run(): void
    {
        $faker       = Faker::create();
        $carroIds    = DB::table('carros')->pluck('id')->toArray();
        $servicioIds = DB::table('servicios')->pluck('id')->toArray();
        $empleadoIds = DB::table('empleados')->where('puesto','mecánico')->pluck('id')->toArray();
        $estados     = ['pendiente','en_proceso','completado','completado','completado'];
        $lote        = [];

        for ($i = 0; $i < 1500; $i++) {
            $costo = DB::table('servicios')
                       ->where('id', $sid = $faker->randomElement($servicioIds))
                       ->value('costo_base');
            $lote[] = [
                'carro_id'       => $faker->randomElement($carroIds),
                'servicio_id'    => $sid,
                'empleado_id'    => $faker->randomElement($empleadoIds),
                'fecha_servicio' => $faker->dateTimeBetween('-2 years','now')->format('Y-m-d'),
                'costo_final'    => $costo * $faker->randomFloat(2, 0.9, 1.3),
                'estado'         => $faker->randomElement($estados),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];

            if (count($lote) === 500) {
                DB::table('carro_servicio')->insert($lote);
                $lote = [];
            }
        }
        if ($lote) DB::table('carro_servicio')->insert($lote);
    }
}