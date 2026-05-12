<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VentaSeeder extends Seeder
{
    public function run(): void
    {
        $faker       = Faker::create();
        $carrosVend  = DB::table('carros')->where('estado','vendido')->pluck('id')->toArray();
        $clienteIds  = DB::table('clientes')->pluck('id')->toArray();
        $empleadoIds = DB::table('empleados')->where('puesto','vendedor')->pluck('id')->toArray();
        $metodos     = ['contado','financiamiento','transferencia'];
        $lote        = [];

        $carrosVend = array_slice($carrosVend, 0, 2000);

        foreach ($carrosVend as $carroId) {
            $precio  = DB::table('carros')->where('id',$carroId)->value('precio');
            $desc    = $faker->randomFloat(2, 0, $precio * 0.1);
            $lote[]  = [
                'carro_id'    => $carroId,
                'cliente_id'  => $faker->randomElement($clienteIds),
                'empleado_id' => $faker->randomElement($empleadoIds),
                'precio_final'=> $precio - $desc,
                'descuento'   => $desc,
                'fecha_venta' => $faker->dateTimeBetween('-3 years','now')->format('Y-m-d'),
                'metodo_pago' => $faker->randomElement($metodos),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];

            if (count($lote) === 500) {
                DB::table('ventas')->insert($lote);
                $lote = [];
            }
        }
        if ($lote) DB::table('ventas')->insert($lote);
    }
}