<!-- ===================== CONTENIDO PRINCIPAL ===================== -->
<section class="container-fluid py-4">
    <div class="row g-4">

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-danger border-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Ganancias Hoy</p>
                            <h2 class="fw-bold mb-0">$1.250</h2>
                        </div>
                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-3 d-flex shadow-sm">
                            <i class="bi bi-cash-coin fs-4"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2 py-1 me-2">
                             <i class="bi bi-clock-history me-1"></i>Hoy
                        </span>
                        <small class="text-muted">Actualizado ahora</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Este Mes</p>
                            <h2 class="fw-bold mb-0">$28.450</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 d-flex shadow-sm">
                            <i class="bi bi-graph-up-arrow fs-4"></i>
                        </div>
                    </div>
                    <p class="text-success small mb-0 fw-bold">
                        <i class="bi bi-arrow-up-circle-fill me-1"></i>+15.3% <span class="text-muted fw-normal">vs mes anterior</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100 border-start border-danger border-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Reparaciones</p>
                            <h2 class="fw-bold mb-0">12</h2>
                        </div>
                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-3 d-flex shadow-sm">
                            <i class="bi bi-tools fs-4"></i>
                        </div>
                    </div>
                    <p class="text-muted small mb-0">
                        <strong>156</strong> tareas finalizadas
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="text-muted small fw-bold text-uppercase mb-1" style="letter-spacing: 0.5px;">Inventario</p>
                            <h2 class="fw-bold mb-0">87</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 d-flex shadow-sm">
                            <i class="bi bi-box-seam fs-4"></i>
                        </div>
                    </div>
                    <div class="bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-1 d-inline-block">
                        <small class="fw-bold"><i class="bi bi-exclamation-triangle-fill me-1"></i>8 críticos</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

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
                    <a href="<?= BASE_URL ?>reparacion/index" class="btn btn-danger mt-auto">
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
                    <a href="<?= BASE_URL ?>inventario/index" class="btn btn-danger mt-auto">
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
