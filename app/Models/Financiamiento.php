<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Financiamiento extends Model
{
    protected $table = 'financiamientos';
    protected $fillable = [
        'venta_id', 'monto_total', 'cuota_inicial',
        'plazo_meses', 'tasa_interes', 'cuota_mensual', 'estado'
    ];
    protected $casts = [
        'monto_total'   => 'decimal:2',
        'cuota_inicial' => 'decimal:2',
        'tasa_interes'  => 'decimal:2',
        'cuota_mensual' => 'decimal:2',
        'plazo_meses'   => 'integer',
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}