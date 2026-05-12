<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarroSeeder extends Seeder
{
    public function run(): void
    {
        $faker      = Faker::create();
        $modeloIds  = DB::table('modelos')->pluck('id')->toArray();
        $colorIds   = DB::table('colores')->pluck('id')->toArray();
        $estados    = ['disponible','disponible','disponible','vendido','reservado','en_servicio'];
        $lote       = [];

        for ($i = 0; $i < 4000; $i++) {
            $lote[] = [
                'modelo_id'   => $faker->randomElement($modeloIds),
                'color_id'    => $faker->randomElement($colorIds),
                'vin'         => $faker->unique()->regexify('[A-HJ-NPR-Z0-9]{17}'),
                'anio'        => $faker->numberBetween(2015, 2025),
                'kilometraje' => $faker->numberBetween(0, 180000),
                'precio'      => $faker->randomFloat(2, 45000, 850000),
                'estado'      => $faker->randomElement($estados),
                'placa'       => $faker->regexify('[A-Z]{1}[0-9]{6}'),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];

            if (count($lote) === 500) {
                DB::table('carros')->insert($lote);
                $lote = [];
            }
        }
        if ($lote) DB::table('carros')->insert($lote);
    }
}