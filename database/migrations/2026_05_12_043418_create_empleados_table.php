public function up(): void
{
    Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->enum('puesto', ['vendedor', 'mecánico', 'gerente', 'recepcionista']);
        $table->decimal('salario', 10, 2);
        $table->date('fecha_contratacion');
        $table->boolean('activo')->default(true);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('empleados');
}