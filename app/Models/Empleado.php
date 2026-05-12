<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'puesto', 'salario',
        'fecha_contratacion', 'activo'
    ];
    protected $casts = [
        'salario'           => 'decimal:2',
        'fecha_contratacion'=> 'date',
        'activo'            => 'boolean',
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}