public function up(): void
{
    Schema::create('marcas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('pais_origen', 100);
        $table->year('fundada_en')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('marcas');
}