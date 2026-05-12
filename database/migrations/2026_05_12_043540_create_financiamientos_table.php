public function up(): void
{
    Schema::create('financiamientos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('venta_id')->constrained('ventas')->cascadeOnDelete();
        $table->decimal('monto_total', 12, 2);
        $table->decimal('cuota_inicial', 10, 2);
        $table->unsignedTinyInteger('plazo_meses');
        $table->decimal('tasa_interes', 5, 2);
        $table->decimal('cuota_mensual', 10, 2);
        $table->enum('estado', ['activo', 'cancelado', 'mora'])->default('activo');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('financiamientos');
}