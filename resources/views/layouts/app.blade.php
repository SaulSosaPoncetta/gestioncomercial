<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gestión Comercial') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #1e2a38;
        }

        .sidebar .nav-link {
            color: #056717;
            padding: .55rem 1rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: #2c3d50;
            border-radius: .375rem;
        }

        .sidebar .nav-header {
            color: #3c4a3e;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            padding: .75rem 1rem .25rem;
        }

        .main-content {
            flex: 1;
            min-height: 100vh;
            background: #f4f8f5;
        }
    </style>
</head>

<body>
    <div id="app" class="d-flex">
        <nav class="sidebar d-flex flex-column p-2">
            <a class="d-flex align-items-center text-white text-decoration-none px-2 py-3 mb-2"
                href="{{ route('dashboard') }}">
                <i class="bi bi-shop me-2 fs-4"></i>
                <span class="fs-5 fw-semibold">Gestión Comercial</span>
            </a>

            <div class="nav-header">Panel</div>
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            <div class="nav-header">Catálogo</div>
            @if (Route::has('categorias.index'))
                <a class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}"
                    href="{{ route('categorias.index') }}"><i class="bi bi-diagram-3 me-2"></i> Categorías</a>
            @endif
            @if (Route::has('marcas.index'))
                <a class="nav-link {{ request()->is('marcas*') ? 'active' : '' }}" href="{{ route('marcas.index') }}"><i
                        class="bi bi-tags me-2"></i> Marcas</a>
            @endif
            @if (Route::has('productos.index'))
                <a class="nav-link {{ request()->is('productos*') ? 'active' : '' }}"
                    href="{{ route('productos.index') }}"><i class="bi bi-box-seam me-2"></i> Productos</a>
            @endif
            @if (Route::has('listas-precios.index'))
                <a class="nav-link {{ request()->is('listas-precios*') ? 'active' : '' }}"
                    href="{{ route('listas-precios.index') }}"><i class="bi bi-cash-coin me-2"></i> Listas de
                    Precios</a>
            @endif

            <div class="nav-header">Personas</div>
            @if (Route::has('personas.index'))
                <a class="nav-link {{ request()->is('personas*') ? 'active' : '' }}"
                    href="{{ route('personas.index') }}"><i class="bi bi-people me-2"></i> Clientes / Proveedores</a>
            @endif

            <div class="nav-header">Inventario</div>
            @if (Route::has('almacenes.index'))
                <a class="nav-link {{ request()->is('almacenes*') ? 'active' : '' }}"
                    href="{{ route('almacenes.index') }}"><i class="bi bi-building me-2"></i> Almacenes</a>
            @endif
            @if (Route::has('stock.index'))
                <a class="nav-link {{ request()->is('stock*') ? 'active' : '' }}" href="{{ route('stock.index') }}"><i
                        class="bi bi-boxes me-2"></i> Stock</a>
            @endif

            <div class="nav-header">Configuración</div>
            @if (Route::has('empresas.index'))
                <a class="nav-link {{ request()->is('empresas*') ? 'active' : '' }}"
                    href="{{ route('empresas.index') }}"><i class="bi bi-building-gear me-2"></i> Empresas</a>
            @endif
            @if (Route::has('sucursales.index'))
                <a class="nav-link {{ request()->is('sucursales*') ? 'active' : '' }}"
                    href="{{ route('sucursales.index') }}"><i class="bi bi-geo-alt me-2"></i> Sucursales</a>
            @endif
            @if (Route::has('impuestos.index'))
                <a class="nav-link {{ request()->is('impuestos*') ? 'active' : '' }}"
                    href="{{ route('impuestos.index') }}"><i class="bi bi-percent me-2"></i> Impuestos</a>
            @endif
            @if (Route::has('monedas.index'))
                <a class="nav-link {{ request()->is('monedas*') ? 'active' : '' }}"
                    href="{{ route('monedas.index') }}"><i class="bi bi-currency-exchange me-2"></i> Monedas</a>
            @endif

            <div class="mt-auto">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left me-2"></i> Salir ({{ Auth::user()->name ?? '' }})
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </nav>

        <div class="main-content">
            <div class="container-fluid py-4 px-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
