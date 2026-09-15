<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Comercial — Sistema de gestión para tu negocio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #14532d;
            --accent: #2e7d4f;
            --dark: #0f2e1a;
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Segoe UI', sans-serif; }

        .navbar-landing { background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0,0,0,0.08); }
        .text-primary { color: var(--primary) !important; }
        .bg-primary { background: var(--primary) !important; }
        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: var(--dark); border-color: var(--dark); }
        .btn-outline-primary { color: var(--primary); border-color: var(--primary); }
        .btn-outline-primary:hover { background: var(--primary); border-color: var(--primary); }

        .hero {
            background: linear-gradient(135deg, #0f2e1a 0%, #14532d 50%, #1a6b3a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(46,125,79,0.25) 0%, transparent 70%);
            top: -200px; right: -200px;
        }
        .hero::after {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(46,125,79,0.15) 0%, transparent 70%);
            bottom: -100px; left: -100px;
        }
        .hero-badge {
            display: inline-block;
            background: rgba(46,125,79,0.25);
            border: 1px solid rgba(46,125,79,0.5);
            color: #86efac;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 24px;
        }
        .hero h1 { font-size: 3.5rem; font-weight: 800; line-height: 1.1; }
        .hero h1 span { color: #86efac; }
        .btn-hero-primary {
            background: #2e7d4f; color: white; padding: 14px 32px; border-radius: 50px;
            font-weight: 600; text-decoration: none; border: none; transition: all 0.3s;
        }
        .btn-hero-primary:hover { background: #226340; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(46,125,79,0.4); color: white; }
        .btn-hero-outline {
            background: transparent; color: white; padding: 14px 32px; border-radius: 50px;
            font-weight: 600; text-decoration: none; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s;
        }
        .btn-hero-outline:hover { border-color: white; background: rgba(255,255,255,0.1); color: white; }

        .stats-bar { background: var(--primary); }
        .stat-item { text-align: center; padding: 24px; }
        .stat-number { font-size: 2.5rem; font-weight: 800; color: white; }
        .stat-label { color: rgba(255,255,255,0.85); font-size: 14px; }

        .feature-icon {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, #e6f4ea, #d1ecd9);
            border-radius: 16px; display: flex; align-items: center; justify-content: center;
            font-size: 28px; margin-bottom: 16px;
        }
        .feature-card { padding: 32px; border-radius: 16px; border: 1px solid #e9ecef; transition: all 0.3s; height: 100%; }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.1); border-color: var(--primary); }

        .plan-card { border-radius: 20px; border: 2px solid #e9ecef; transition: all 0.3s; overflow: hidden; }
        .plan-card:hover { transform: translateY(-8px); box-shadow: 0 20px 60px rgba(0,0,0,0.12); }
        .plan-card.featured { border-color: var(--primary); }
        .plan-card.featured .plan-header { background: var(--primary); color: white; }
        .plan-price { font-size: 3rem; font-weight: 800; }
        .plan-period { font-size: 14px; color: #6c757d; }
        .btn-plan { padding: 12px 32px; border-radius: 50px; font-weight: 600; text-decoration: none; display: block; text-align: center; }

        footer { background: #0f2e1a; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-landing fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-4" href="#inicio">
            <i class="bi bi-briefcase-fill me-2"></i>Gestión Comercial
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLanding">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navLanding">
            <ul class="navbar-nav mx-auto gap-2">
                <li class="nav-item"><a class="nav-link fw-semibold" href="#inicio">Inicio</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="#producto">Producto</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="#planes">Planes</a></li>
            </ul>
            <div class="d-flex gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar sesión
                </a>
                <a href="#planes" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-rocket me-1"></i>Suscribirse
                </a>
            </div>
        </div>
    </div>
</nav>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5"
     style="z-index:9999;min-width:400px">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-5"
     style="z-index:9999;min-width:400px">
    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<section id="inicio" class="hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-badge"><i class="bi bi-stars me-1"></i>Sistema de gestión para negocios</div>
                <h1 class="text-white mb-4">Gestioná tu <span>negocio</span> de forma inteligente</h1>
                <p class="text-white-50 fs-5 mb-5">
                    Gestión Comercial es el ERP que tu empresa necesita: ventas, compras, stock, caja
                    y multi-sucursal, todo en un solo lugar.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#planes" class="btn-hero-primary"><i class="bi bi-rocket me-2"></i>Empezar ahora</a>
                    <a href="#producto" class="btn-hero-outline"><i class="bi bi-play-circle me-2"></i>Ver características</a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:32px">
                    <div class="row g-3">
                        @foreach([
                            ['bi-cart-check','Ventas','Facturación ágil'],
                            ['bi-box-seam','Stock','Control en tiempo real'],
                            ['bi-truck','Compras','Gestión de proveedores'],
                            ['bi-cash-stack','Caja','Apertura y cierre'],
                            ['bi-building','Multi-sucursal','Varias sedes'],
                            ['bi-graph-up','Reportes','Decisiones con datos'],
                        ] as $feat)
                        <div class="col-4">
                            <div style="background:rgba(255,255,255,0.08);border-radius:12px;padding:16px;color:white">
                                <i class="bi {{ $feat[0] }} fs-2 d-block mb-1" style="color:#86efac"></i>
                                <div style="font-size:11px;font-weight:600">{{ $feat[1] }}</div>
                                <div style="font-size:10px;opacity:0.6">{{ $feat[2] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="stats-bar">
    <div class="container">
        <div class="row">
            @foreach([
                ['bi-people','Módulos completos','12+'],
                ['bi-shield-check','Datos seguros','100%'],
                ['bi-clock','Ahorro de tiempo','5hs/semana'],
                ['bi-star','Satisfacción','⭐⭐⭐⭐⭐'],
            ] as $stat)
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-number">{{ $stat[2] }}</div>
                    <div class="stat-label"><i class="bi {{ $stat[0] }} me-1"></i>{{ $stat[1] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="producto" class="py-6" style="padding:80px 0">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Características</span>
            <h2 class="fw-bold fs-1 mb-3">Todo lo que tu negocio necesita</h2>
            <p class="text-muted fs-5 mx-auto" style="max-width:600px">
                Gestión Comercial reemplaza las planillas y sistemas sueltos con un ERP moderno y fácil de usar.
            </p>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-cart-check','Ventas y facturación','Registrá ventas, generá facturas y notas de crédito en segundos.','success'],
                ['bi-box-seam','Stock e inventario','Control de stock por almacén, con movimientos y transferencias entre sucursales.','primary'],
                ['bi-truck','Compras y proveedores','Gestioná compras, notas de crédito de compra y tus proveedores desde un solo lugar.','warning'],
                ['bi-cash-stack','Caja y caja chica','Apertura y cierre de caja, movimientos y control de caja chica.','info'],
                ['bi-building','Multi-empresa y sucursales','Administrá varias sucursales de tu negocio desde una sola cuenta.','danger'],
                ['bi-graph-up','Reportes y catálogo','Listas de precios, impuestos, monedas y reportes para decidir mejor.','secondary'],
            ] as $f)
            <div class="col-md-6 col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon"><i class="bi {{ $f[0] }} text-{{ $f[3] }}"></i></div>
                    <h5 class="fw-bold mb-2">{{ $f[1] }}</h5>
                    <p class="text-muted mb-0">{{ $f[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="planes" class="py-5" style="background:#f8f9fa;padding:80px 0!important">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Precios</span>
            <h2 class="fw-bold fs-1 mb-3">Elegí el plan que mejor se adapta</h2>
            <p class="text-muted fs-5">Todos los planes incluyen acceso completo al sistema.</p>
        </div>

        @if($planes->isEmpty())
        <div class="alert alert-info text-center">No hay planes disponibles en este momento.</div>
        @else
        <div class="row g-4 justify-content-center">
            @foreach($planes as $index => $plan)
            @php $featured = $index === 1 || $planes->count() === 1; @endphp
            <div class="col-md-6 col-lg-4">
                <div class="plan-card {{ $featured ? 'featured' : '' }}">
                    <div class="plan-header p-4 {{ $featured ? '' : 'bg-light' }}">
                        @if($featured)<span class="badge bg-warning text-dark mb-2">Más popular</span>@endif
                        <h4 class="fw-bold mb-0 {{ $featured ? 'text-white' : '' }}">{{ $plan->nombre }}</h4>
                        @if($plan->descripcion)
                        <p class="mb-0 mt-1 small {{ $featured ? 'text-white-50' : 'text-muted' }}">{{ $plan->descripcion }}</p>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="d-flex align-items-end gap-1 mb-4">
                            <span class="plan-price text-{{ $featured ? 'primary' : 'dark' }}">${{ number_format($plan->precio, 0, ',', '.') }}</span>
                            <span class="plan-period mb-2">/ mensual</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            @foreach(['Acceso completo al sistema','Ventas, compras y stock','Caja y multi-sucursal','Soporte incluido','Actualizaciones gratuitas'] as $item)
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <button class="btn btn-plan {{ $featured ? 'btn-primary' : 'btn-outline-primary' }}"
                                onclick="seleccionarPlan({{ $plan->id }}, '{{ $plan->nombre }}', {{ $plan->precio }})">
                            <i class="bi bi-rocket me-1"></i>Elegir este plan
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f2e1a 0%,#14532d 100%);padding:80px 0!important">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3" style="font-size:2rem">Empezá a gestionar tu negocio hoy</h2>
                <p class="fs-5 mb-4" style="opacity:.9">Creá tu cuenta y accedé al sistema completo en minutos.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#planes" class="btn btn-light btn-lg px-5 fw-bold" style="color:#14532d">
                        <i class="bi bi-rocket me-2"></i>Ver planes
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-white">
                <i class="bi bi-briefcase-fill me-2 text-primary"></i><strong>Gestión Comercial</strong> &copy; {{ date('Y') }}
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('login') }}" class="text-white-50 text-decoration-none">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Iniciar sesión
                </a>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="modalRegistro" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-header border-0 pb-0">
                <div>
                    <h4 class="fw-bold mb-1">Crear cuenta</h4>
                    <p class="text-muted mb-0" id="modalPlanNombre"></p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form id="formRegistro">
                    <input type="hidden" id="reg_plan_id" name="plan_id">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Razón social <span class="text-danger">*</span></label>
                            <input type="text" name="razon_social" id="reg_razon_social" class="form-control form-control-lg"
                                   placeholder="Nombre de tu empresa" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">CUIT / Identificación fiscal <span class="text-danger">*</span></label>
                            <input type="text" name="identificacion_fiscal" id="reg_cuit" class="form-control form-control-lg"
                                   placeholder="Ej: 20-12345678-9" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Tu nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre_admin" id="reg_nombre_admin" class="form-control form-control-lg"
                                   placeholder="Nombre completo" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="reg_email" class="form-control form-control-lg"
                                   placeholder="tu@email.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="reg_pass" class="form-control form-control-lg"
                                   placeholder="Mínimo 8 caracteres" required minlength="8">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirmar contraseña <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                   placeholder="Repetí la contraseña" required minlength="8">
                        </div>
                        <div class="col-12">
                            <div id="planResumen" class="p-3 rounded-3" style="background:#e6f4ea;border:1px solid #b8dfc4"></div>
                        </div>
                        <div id="regError" class="col-12 d-none">
                            <div class="alert alert-danger mb-0" id="regErrorMsg"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary rounded-pill px-5" onclick="procesarRegistro()">
                    <i class="bi bi-check-circle me-1"></i>Registrarme
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExito" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4">
            <div class="modal-body text-center p-5">
                <div class="mb-3" style="font-size:64px">✅</div>
                <h4 class="fw-bold mb-2">Registro exitoso</h4>
                <p class="text-muted mb-4" id="exitoMensaje"></p>
                <a href="{{ route('landing.index') }}" class="btn btn-primary rounded-pill px-5">Volver al inicio</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
let planSeleccionado = null;

function seleccionarPlan(id, nombre, precio) {
    planSeleccionado = { id, nombre, precio };
    document.getElementById('reg_plan_id').value = id;
    document.getElementById('modalPlanNombre').innerHTML =
        `<span class="badge bg-primary">${nombre}</span> — $${precio.toLocaleString('es-AR')} / mensual`;
    document.getElementById('planResumen').innerHTML = `
        <div class="d-flex justify-content-between align-items-center">
            <div><div class="fw-semibold">Plan ${nombre}</div><div class="text-muted small">Mensual</div></div>
            <div class="fw-bold text-primary fs-5">$${precio.toLocaleString('es-AR')}</div>
        </div>`;
    document.getElementById('regError').classList.add('d-none');
    new bootstrap.Modal(document.getElementById('modalRegistro')).show();
}

function procesarRegistro() {
    const form = document.getElementById('formRegistro');
    const errorBox = document.getElementById('regError');
    const errorMsg = document.getElementById('regErrorMsg');
    errorBox.classList.add('d-none');

    fetch('{{ route("landing.registrar") }}', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
        body: new FormData(form),
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('modalRegistro')).hide();
            document.getElementById('exitoMensaje').textContent = data.message;
            setTimeout(() => new bootstrap.Modal(document.getElementById('modalExito')).show(), 400);
            form.reset();
        } else {
            errorMsg.textContent = data.message || 'Error al registrar. Intentá de nuevo.';
            errorBox.classList.remove('d-none');
        }
    })
    .catch(() => {
        errorMsg.textContent = 'Error de conexión. Intentá de nuevo.';
        errorBox.classList.remove('d-none');
    });
}
</script>
</body>
</html>
