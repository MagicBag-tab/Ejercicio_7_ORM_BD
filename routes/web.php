<?php
use Illuminate\Support\Facades\Route;
use App\Queries\ConsultasConcesionaria;

Route::get('/carros-disponibles', function () {
    return response()->json(ConsultasConcesionaria::carrosDisponiblesConDetalle());
});

Route::get('/ventas-anio', function () {
    return response()->json(ConsultasConcesionaria::ventasUltimoAnio());
});

Route::get('/clientes-recurrentes', function () {
    return response()->json(ConsultasConcesionaria::clientesRecurrentes());
});

Route::get('/carros-servicios', function () {
    return response()->json(ConsultasConcesionaria::carrosConServiciosCompletados());
});

Route::get('/top-marcas', function () {
    return response()->json(ConsultasConcesionaria::topMarcasPorVentas());
});