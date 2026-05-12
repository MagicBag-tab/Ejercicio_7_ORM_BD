<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'modelo_id', 'color_id', 'vin', 'anio',
        'kilometraje', 'precio', 'estado', 'placa'
    ];
    protected $casts = [
        'anio'        => 'integer',
        'kilometraje' => 'integer',
        'precio'      => 'decimal:2',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'carro_servicio')
                    ->withPivot('empleado_id', 'fecha_servicio', 'costo_final', 'estado')
                    ->withTimestamps();
    }
}