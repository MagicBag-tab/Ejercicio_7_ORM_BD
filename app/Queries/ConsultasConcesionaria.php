<?php
namespace App\Queries;

use App\Models\Carro;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Marca;

class ConsultasConcesionaria
{
    public static function carrosDisponiblesConDetalle()
    {
        return Carro::with(['modelo.marca', 'color'])
            ->where('estado', 'disponible')
            ->where('anio', '>=', 2020)
            ->orderBy('precio', 'asc')
            ->get();
    }

    public static function ventasUltimoAnio()
    {
        return Venta::with(['cliente', 'empleado', 'carro.modelo'])
            ->where('fecha_venta', '>=', now()->subYear())
            ->orderBy('fecha_venta', 'desc')
            ->get();
    }

    public static function clientesRecurrentes()
    {
        return Cliente::withCount('ventas')
            ->having('ventas_count', '>', 1)
            ->orderByDesc('ventas_count')
            ->limit(50)
            ->get();
    }

    public static function carrosConServiciosCompletados()
    {
        return Carro::with(['modelo.marca', 'servicios' => function ($q) {
                $q->wherePivot('estado', 'completado')
                  ->orderByPivot('fecha_servicio', 'desc');
            }])
            ->whereHas('servicios', fn($q) => $q->wherePivot('estado','completado'))
            ->limit(100)
            ->get();
    }

    public static function topMarcasPorVentas()
    {
        return Marca::withCount(['modelos as total_ventas' => function ($q) {
                $q->join('carros', 'carros.modelo_id', '=', 'modelos.id')
                  ->join('ventas', 'ventas.carro_id', '=', 'carros.id');
            }])
            ->orderByDesc('total_ventas')
            ->limit(5)
            ->get();
    }
}