# 🚗 Concesionaria de Carros — Laravel + Eloquent ORM

Laboratorio de modelado de dominio usando Laravel 11 y Eloquent, con entorno Dockerizado.

## Dominio

Sistema de gestión para una concesionaria de vehículos: marcas, modelos, inventario de carros, clientes, empleados, ventas, financiamientos y servicios de taller.

## Tablas implementadas (10)

| Tabla | Descripción |
|---|---|
| `marcas` | Fabricantes de vehículos |
| `modelos` | Modelos por marca |
| `colores` | Colores disponibles |
| `carros` | Inventario de vehículos |
| `clientes` | Compradores registrados |
| `empleados` | Vendedores y mecánicos |
| `ventas` | Transacciones de compra |
| `servicios` | Catálogo de servicios de taller |
| `carro_servicio` | Pivote belongsToMany |
| `financiamientos` | Planes de pago por venta |

## Relaciones implementadas (6)

- `Marca` → `hasMany` → `Modelo`
- `Modelo` → `hasMany` → `Carro`
- `Cliente` → `hasMany` → `Venta`
- `Empleado` → `hasMany` → `Venta`
- `Venta` → `hasOne` → `Financiamiento`
- `Carro` ↔ `belongsToMany` ↔ `Servicio` (vía `carro_servicio`)

## Requisitos

- Docker Desktop instalado
- Docker Compose v2+
- Git

## Instalación y ejecución

### 1. Clonar el repositorio

```bash
git clone <tu-repo-url>
cd concesionaria
```

### 2. Levantar los contenedores

```bash
docker-compose up -d --build
```

Servicios disponibles:
- **App Laravel**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8080 (usuario: `laravel`, contraseña: `secret`)

### 3. Instalar dependencias

```bash
docker exec -it concesionaria_app composer install
```

### 4. Configurar el entorno

```bash
docker exec -it concesionaria_app cp .env.example .env
docker exec -it concesionaria_app php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
docker exec -it concesionaria_app php artisan migrate
```

### 6. Poblar la base de datos (~11,000 registros)

```bash
docker exec -it concesionaria_app php artisan db:seed
```

> El proceso tarda aproximadamente 2-3 minutos.

### 7. Ejecutar las consultas de ejemplo

```bash
docker exec -it concesionaria_app php artisan tinker

# Dentro de tinker:
use App\Queries\ConsultasConcesionaria;
ConsultasConcesionaria::carrosDisponiblesConDetalle();
ConsultasConcesionaria::ventasUltimoAnio();
ConsultasConcesionaria::clientesRecurrentes();
ConsultasConcesionaria::carrosConServiciosCompletados();
ConsultasConcesionaria::topMarcasPorVentas();
```

## Comandos útiles

```bash
# Ver logs
docker-compose logs -f app

# Reiniciar migraciones y seeders
docker exec -it concesionaria_app php artisan migrate:fresh --seed

# Acceder al shell del contenedor
docker exec -it concesionaria_app bash

# Detener contenedores
docker-compose down
```
