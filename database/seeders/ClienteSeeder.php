<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_MX');
        $lote  = [];

        for ($i = 0; $i < 3000; $i++) {
            $lote[] = [
                'nombre'          => $faker->firstName(),
                'apellido'        => $faker->lastName(),
                'dpi'             => $faker->unique()->numerify('################'),
                'telefono'        => $faker->phoneNumber(),
                'correo'          => $faker->unique()->safeEmail(),
                'direccion'       => $faker->address(),
                'fecha_nacimiento'=> $faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];

            if (count($lote) === 500) {
                DB::table('clientes')->insert($lote);
                $lote = [];
            }
        }
        if ($lote) DB::table('clientes')->insert($lote);
    }
}