<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = [
        'nombre', 'apellido', 'dpi', 'telefono',
        'correo', 'direccion', 'fecha_nacimiento'
    ];
    protected $casts = ['fecha_nacimiento' => 'date'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}