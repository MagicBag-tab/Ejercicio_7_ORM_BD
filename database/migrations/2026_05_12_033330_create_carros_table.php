public function up(): void
{
    Schema::create('carros', function (Blueprint $table) {
        $table->id();
        $table->foreignId('modelo_id')->constrained('modelos')->cascadeOnDelete();
        $table->foreignId('color_id')->constrained('colores');
        $table->string('vin', 17)->unique();
        $table->year('anio');
        $table->unsignedInteger('kilometraje')->default(0);
        $table->decimal('precio', 12, 2);
        $table->enum('estado', ['disponible', 'vendido', 'reservado', 'en_servicio'])->default('disponible');
        $table->string('placa', 20)->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('carros');
}