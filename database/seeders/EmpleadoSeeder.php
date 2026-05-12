<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        $faker   = Faker::create('es_MX');
        $puestos = ['vendedor','vendedor','vendedor','mecánico','mecánico','gerente','recepcionista'];

        for ($i = 0; $i < 50; $i++) {
            DB::table('empleados')->insert([
                'nombre'             => $faker->firstName(),
                'apellido'           => $faker->lastName(),
                'puesto'             => $faker->randomElement($puestos),
                'salario'            => $faker->randomFloat(2, 4500, 18000),
                'fecha_contratacion' => $faker->dateTimeBetween('-10 years', '-1 month')->format('Y-m-d'),
                'activo'             => $faker->boolean(85),
                'created_at'         => now(),
                'updated_at'         => now(),
            ]);
        }
    }
}