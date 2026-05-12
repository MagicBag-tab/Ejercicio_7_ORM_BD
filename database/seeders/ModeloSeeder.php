<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModeloSeeder extends Seeder
{
    public function run(): void
    {
        $modelos = [
            [1,'Corolla','sedán',4], [1,'Camry','sedán',4], [1,'RAV4','SUV',4],
            [1,'Hilux','pickup',4],  [1,'Land Cruiser','SUV',4],
            [2,'Civic','sedán',4],   [2,'CR-V','SUV',4],    [2,'HR-V','SUV',4],
            [2,'Pilot','SUV',4],     [2,'Ridgeline','pickup',4],
            [3,'F-150','pickup',4],  [3,'Explorer','SUV',4], [3,'Escape','SUV',4],
            [3,'Mustang','deportivo',2], [3,'Ranger','pickup',4],
            [4,'Silverado','pickup',4],[4,'Equinox','SUV',4],[4,'Traverse','SUV',4],
            [4,'Camaro','deportivo',2],[4,'Colorado','pickup',4],
            [5,'Sentra','sedán',4],  [5,'Altima','sedán',4], [5,'Rogue','SUV',4],
            [5,'Frontier','pickup',4],[5,'Pathfinder','SUV',4],
            [6,'Tucson','SUV',4],    [6,'Santa Fe','SUV',4], [6,'Elantra','sedán',4],
            [6,'Sonata','sedán',4],  [6,'Ioniq','eléctrico',4],
            [7,'Sportage','SUV',4],  [7,'Sorento','SUV',4],  [7,'Rio','sedán',4],
            [7,'Telluride','SUV',4], [7,'Stinger','deportivo',4],
            [8,'Jetta','sedán',4],   [8,'Passat','sedán',4], [8,'Tiguan','SUV',4],
            [8,'Golf','sedán',4],    [8,'Touareg','SUV',4],
            [9,'Serie 3','sedán',4], [9,'Serie 5','sedán',4],[9,'X5','SUV',4],
            [9,'M3','deportivo',4],  [9,'X3','SUV',4],
            [10,'Clase C','sedán',4],[10,'Clase E','sedán',4],[10,'GLE','SUV',4],
            [10,'AMG GT','deportivo',2],[10,'GLC','SUV',4],
            [11,'Mazda3','sedán',4], [11,'CX-5','SUV',4],
            [12,'Outlander','SUV',4],[12,'Eclipse','deportivo',4],
            [13,'Jimny','SUV',3],    [13,'Swift','sedán',4],
            [14,'Outback','SUV',4],  [14,'Forester','SUV',4],
            [15,'Wrangler','SUV',4], [15,'Grand Cherokee','SUV',4],
        ];

        $tipos = ['sedán','SUV','pickup','deportivo','camioneta','eléctrico'];

        foreach ($modelos as $m) {
            DB::table('modelos')->insert([
                'marca_id'   => $m[0],
                'nombre'     => $m[1],
                'tipo'       => $m[2],
                'num_puertas'=> $m[3],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
