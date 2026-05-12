<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FinanciamientoSeeder extends Seeder
{
    public function run(): void
    {
        $faker    = Faker::create();
        $ventas   = DB::table('ventas')->where('metodo_pago','financiamiento')->get();
        $estados  = ['activo','activo','activo','cancelado','mora'];
        $lote     = [];

        foreach ($ventas as $venta) {
            $plazo   = $faker->randomElement([12,24,36,48,60]);
            $tasa    = $faker->randomFloat(2, 8, 24);
            $inicial = $venta->precio_final * $faker->randomFloat(2, 0.1, 0.3);
            $monto   = $venta->precio_final - $inicial;
            $cuota   = ($monto * ($tasa/100/12)) / (1 - pow(1 + $tasa/100/12, -$plazo));

            $lote[]  = [
                'venta_id'      => $venta->id,
                'monto_total'   => $monto,
                'cuota_inicial' => $inicial,
                'plazo_meses'   => $plazo,
                'tasa_interes'  => $tasa,
                'cuota_mensual' => round($cuota, 2),
                'estado'        => $faker->randomElement($estados),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];

            if (count($lote) === 500) {
                DB::table('financiamientos')->insert($lote);
                $lote = [];
            }
        }
        if ($lote) DB::table('financiamientos')->insert($lote);
    }
}