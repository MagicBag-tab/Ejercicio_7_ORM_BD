<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('ventas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('carro_id')->constrained('carros');
        $table->foreignId('cliente_id')->constrained('clientes');
        $table->foreignId('empleado_id')->constrained('empleados');
        $table->decimal('precio_final', 12, 2);
        $table->decimal('descuento', 10, 2)->default(0);
        $table->date('fecha_venta');
        $table->enum('metodo_pago', ['contado', 'financiamiento', 'transferencia']);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('ventas');
}
};