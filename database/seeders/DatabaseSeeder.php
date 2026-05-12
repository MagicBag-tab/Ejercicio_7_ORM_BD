<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MarcaSeeder::class,        
            ColorSeeder::class,        
            ModeloSeeder::class,       
            EmpleadoSeeder::class,     
            ClienteSeeder::class,     
            CarroSeeder::class,        
            ServicioSeeder::class,     
            VentaSeeder::class,        
            CarroServicioSeeder::class,
            FinanciamientoSeeder::class
        ]);
    }
}