<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'carro_id', 'cliente_id', 'empleado_id',
        'precio_final', 'descuento', 'fecha_venta', 'metodo_pago'
    ];
    protected $casts = [
        'precio_final' => 'decimal:2',
        'descuento'    => 'decimal:2',
        'fecha_venta'  => 'date',
    ];

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function financiamiento()
    {
        return $this->hasOne(Financiamiento::class);
    }
}