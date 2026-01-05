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
