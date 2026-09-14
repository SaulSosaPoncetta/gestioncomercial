<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión Comercial — Planes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f8; }
        .navbar-brand { color: #14532d !important; font-weight: bold; }
        .plan-card { border: 2px solid #e5e7eb; border-radius: 12px; transition: .2s; }
        .plan-card:hover { border-color: #14532d; transform: translateY(-4px); }
        .btn-primary { background: #14532d; border-color: #14532d; }
        .btn-primary:hover { background: #0f3d21; border-color: #0f3d21; }
        .precio { font-size: 2.2rem; font-weight: bold; color: #14532d; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing.index') }}">Gestión Comercial</a>
        <a href="{{ route('login') }}" class="btn btn-outline-success">Iniciar sesión</a>
    </div>
</nav>

<div class="container py-5">
    <div class="text-center mb-5">
        <span class="badge bg-success-subtle text-success mb-2">Precios</span>
        <h1 class="fw-bold">Elegí el plan que mejor se adapta</h1>
        <p class="text-muted">Todos los planes incluyen acceso completo al sistema.</p>
    </div>

    @if($planes->isEmpty())
    <div class="alert alert-info text-center">No hay planes disponibles en este momento.</div>
    @endif

    <div class="row g-4 justify-content-center">
        @foreach($planes as $plan)
        <div class="col-md-4">
            <div class="card plan-card h-100 p-4 text-center">
                <h4>{{ $plan->nombre }}</h4>
                <div class="precio my-3">${{ number_format($plan->precio, 0) }} <small class="fs-6 text-muted">/ mensual</small></div>
                <p class="text-muted">{{ $plan->descripcion }}</p>
                <button type="button" class="btn btn-primary mt-auto" onclick="abrirRegistro({{ $plan->id }}, '{{ $plan->nombre }}', {{ $plan->precio }})">
                    Elegir plan
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal de registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrate en <span id="planNombre"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formRegistro">
                    @csrf
                    <input type="hidden" name="plan_id" id="plan_id">
                    <div class="mb-2">
                        <label class="form-label">Razón social</label>
                        <input type="text" name="razon_social" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">CUIT / Identificación fiscal</label>
                        <input type="text" name="identificacion_fiscal" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tu nombre</label>
                        <input type="text" name="nombre_admin" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required minlength="8">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required minlength="8">
                    </div>
                    <div id="errorRegistro" class="alert alert-danger d-none mt-2"></div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de éxito -->
<div class="modal fade" id="modalExito" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-center p-4">
            <div class="fs-1 mb-2">✅</div>
            <h4>Registro exitoso</h4>
            <p id="mensajeExito" class="text-muted"></p>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver al inicio</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function abrirRegistro(planId, nombre, precio) {
    document.getElementById('plan_id').value = planId;
    document.getElementById('planNombre').innerText = nombre;
    new bootstrap.Modal(document.getElementById('modalRegistro')).show();
}

document.getElementById('formRegistro').addEventListener('submit', function (e) {
    e.preventDefault();
    const form = e.target;
    const errorBox = document.getElementById('errorRegistro');
    errorBox.classList.add('d-none');

    fetch('{{ route("landing.registrar") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: new FormData(form),
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            bootstrap.Modal.getInstance(document.getElementById('modalRegistro')).hide();
            document.getElementById('mensajeExito').innerText = data.message;
            new bootstrap.Modal(document.getElementById('modalExito')).show();
            form.reset();
        } else {
            errorBox.innerText = data.message;
            errorBox.classList.remove('d-none');
        }
    })
    .catch(() => {
        errorBox.innerText = 'Error de conexión. Intentá de nuevo.';
        errorBox.classList.remove('d-none');
    });
});
</script>

</body>
</html>
