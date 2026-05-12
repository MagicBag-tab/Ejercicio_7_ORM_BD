public function up(): void
{
    Schema::create('colores', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 60);
        $table->string('codigo_hex', 7)->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('colores');
}