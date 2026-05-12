<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['nombre', 'pais_origen', 'fundada_en'];
    protected $casts = ['fundada_en' => 'integer'];

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}