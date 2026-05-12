<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = ['marca_id', 'nombre', 'tipo', 'num_puertas'];
    protected $casts = ['num_puertas' => 'integer'];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function carros()
    {
        return $this->hasMany(Carro::class);
    }
}