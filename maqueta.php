<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PipeCel - Panel Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" 
        rel="stylesheet">
</head>
<body data-bs-theme="light">

<!-- ===================== HEADER / NAVBAR ===================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger" href="#">
            <i class="bi bi-phone"></i> PipeCel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reparaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inventario</a>
                </li>
            </ul>
        </div>
    </div>
    <button 
    id="toggleTheme"
    class="btn btn-outline-secondary ms-3"
    type="button"
    title="Cambiar tema">
    <i class="bi bi-moon"></i>
</button>
</nav>

<!-- ===================== CONTENIDO PRINCIPAL ===================== -->
<main class="container my-5">

    <!-- BIENVENIDA -->
    <div class="mb-4">
        <h2 class="fw-bold">Bienvenido a PipeCel</h2>
        <p class="text-muted">
            Sistema de gestión para reparaciones e inventario de celulares
        </p>
    </div>

    <!-- CARDS PRINCIPALES -->
    <div class="row g-4 mb-5">

        <!-- Reparaciones -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <span class="badge bg-danger p-3 rounded-circle">
                            <i class="bi bi-tools fs-5"></i>
                        </span>
                    </div>
                    <h5 class="card-title">Reparaciones</h5>
                    <p class="card-text text-muted">
                        Registra y gestiona las reparaciones de celulares, abonos y saldos pendientes.
                    </p>
                    <a href="#" class="btn btn-danger mt-auto">
                        Ver Reparaciones
                    </a>
                </div>
            </div>
        </div>

        <!-- Inventario -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <span class="badge bg-danger p-3 rounded-circle">
                            <i class="bi bi-box-seam fs-5"></i>
                        </span>
                    </div>
                    <h5 class="card-title">Inventario</h5>
                    <p class="card-text text-muted">
                        Administra tu inventario de accesorios y celulares nuevos por categorías.
                    </p>
                    <a href="#" class="btn btn-danger mt-auto">
                        Ver Inventario
                    </a>
                </div>
            </div>
        </div>

        <!-- Resumen -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <span class="badge bg-danger p-3 rounded-circle">
                            <i class="bi bi-bar-chart fs-5"></i>
                        </span>
                    </div>
                    <h5 class="card-title">Resumen</h5>
                    <p class="card-text text-muted">
                        Visualiza estadísticas y reportes de tu negocio.
                    </p>
                    <button class="btn btn-outline-secondary mt-auto" disabled>
                        Próximamente
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- MÉTRICAS -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Reparaciones Activas</small>
                        <h4 class="fw-bold mb-0">0</h4>
                    </div>
                    <i class="bi bi-tools text-danger fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Productos en Stock</small>
                        <h4 class="fw-bold mb-0">0</h4>
                    </div>
                    <i class="bi bi-box-seam text-danger fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Saldo Pendiente</small>
                        <h4 class="fw-bold mb-0">$0</h4>
                    </div>
                    <i class="bi bi-cash-stack text-danger fs-3"></i>
                </div>
            </div>
        </div>

    </div>

</main>

<!-- ===================== FOOTER ===================== -->
<footer class="bg-white border-top mt-5">
    <div class="container py-4">
        <div class="row">

            <div class="col-md-4">
                <h5 class="fw-bold text-danger">PipeCel</h5>
                <p class="text-muted small">
                    Expertos en reparación de celulares y venta de accesorios.
                    Servicio rápido y confiable con garantía.
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Enlaces Rápidos</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-muted">Inicio</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Reparaciones</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Inventario</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Contacto</h6>
                <p class="text-muted small mb-1">
                    <i class="bi bi-telephone"></i> +57 300 000 0000
                </p>
                <p class="text-muted small mb-1">
                    <i class="bi bi-envelope"></i> info@pipecel.com
                </p>
                <p class="text-muted small">
                    <i class="bi bi-geo-alt"></i> Calle Principal #123
                </p>
            </div>

        </div>

        <hr>

        <p class="text-center text-muted small mb-0">
            © 2025 PipeCel. Todos los derechos reservados.
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

<script>
    const toggleBtn = document.getElementById('toggleTheme');
    const body = document.body;

    toggleBtn.addEventListener('click', () => {
        const currentTheme = body.getAttribute('data-bs-theme');

        if (currentTheme === 'dark') {
            body.setAttribute('data-bs-theme', 'light');
            toggleBtn.innerHTML = '<i class="bi bi-moon"></i>';
        } else {
            body.setAttribute('data-bs-theme', 'dark');
            toggleBtn.innerHTML = '<i class="bi bi-sun"></i>';
        }
    });
</script>

</body>
</html>
