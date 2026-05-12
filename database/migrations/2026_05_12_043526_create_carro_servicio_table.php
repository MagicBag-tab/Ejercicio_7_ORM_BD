<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('carro_servicio', function (Blueprint $table) {
        $table->id();
        $table->foreignId('carro_id')->constrained('carros')->cascadeOnDelete();
        $table->foreignId('servicio_id')->constrained('servicios')->cascadeOnDelete();
        $table->foreignId('empleado_id')->constrained('empleados');
        $table->date('fecha_servicio');
        $table->decimal('costo_final', 10, 2);
        $table->enum('estado', ['pendiente', 'en_proceso', 'completado'])->default('pendiente');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('carro_servicio');
}
};