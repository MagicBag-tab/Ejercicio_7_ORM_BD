<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'costo_base', 'duracion_horas'];
    protected $casts = [
        'costo_base'     => 'decimal:2',
        'duracion_horas' => 'integer',
    ];

    public function carros()
    {
        return $this->belongsToMany(Carro::class, 'carro_servicio')
                    ->withPivot('empleado_id', 'fecha_servicio', 'costo_final', 'estado')
                    ->withTimestamps();
    }
}