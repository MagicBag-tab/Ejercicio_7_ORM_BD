<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('clientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->string('dpi', 20)->unique();
        $table->string('telefono', 20)->nullable();
        $table->string('correo')->unique()->nullable();
        $table->text('direccion')->nullable();
        $table->date('fecha_nacimiento')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('clientes');
}
};