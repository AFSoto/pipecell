<section class="container-fluid py-4">
                


                
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Gestión de Inventario</h1>
            <p class="text-muted mb-0">Administra tu inventario de productos por categorías</p>
        </div>
        
        <button class="btn btn-danger px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2 rounded-3">
            <i class="bi bi-plus-lg"></i> Nuevo Producto
        </button>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 border-start border-danger border-4">
                <div class="card-body p-4">
                    <p class="text-muted small fw-bold text-uppercase mb-2">Total Productos</p>
                    <h2 class="fw-bold mb-1">0</h2>
                    <p class="text-muted small mb-0">Productos activos</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <p class="text-muted small fw-bold text-uppercase mb-2">Inversión Total</p>
                    <h2 class="fw-bold mb-1">$0.00</h2>
                    <p class="text-muted small mb-0">Costo de compra</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 border-start border-danger border-4">
                <div class="card-body p-4">
                    <p class="text-muted small fw-bold text-uppercase mb-2">Ganancia Potencial</p>
                    <h2 class="fw-bold mb-1">$0.00</h2>
                    <p class="text-muted small mb-0">Si se vende todo</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <p class="text-muted small fw-bold text-uppercase mb-2">Unidades en Stock</p>
                    <h2 class="fw-bold mb-1">0</h2>
                    <p class="text-muted small mb-0">Total de unidades</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-3">
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0 text-muted">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0 shadow-none" placeholder="Buscar por nombre o descripción...">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select shadow-none">
                        <option selected>Todas las categorías</option>
                        <option value="1">Celulares</option>
                        <option value="2">Accesorios</option>
                        <option value="3">Repuestos</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 py-5">
        <div class="card-body text-center py-5">
            <!-- <div class="bg-light d-inline-flex align-items-center justify-content-center rounded-circle mb-4" style="width: 80px; height: 80px;">
                <i class="bi bi-box-seam text-muted fs-1"></i>
            </div>
            <h4 class="fw-bold">No hay productos registrados</h4>
            <p class="text-muted mx-auto" style="max-width: 300px;">
                Haz clic en "Nuevo Producto" para comenzar a llenar tu inventario.
            </p> -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="min-width: 250px;">Producto / Código</th>
                    <th class="py-3 text-uppercase small fw-bold text-muted">Categoría</th>
                    <th class="py-3 text-uppercase small fw-bold text-muted">Stock</th>
                    <th class="py-3 text-uppercase small fw-bold text-muted">Inversión y Venta</th>
                    <th class="py-3 text-uppercase small fw-bold text-muted">Estado</th>
                    <th class="pe-4 py-3 text-end text-uppercase small fw-bold text-muted">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-3 me-3">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Pantalla iPhone 13 Pro</h6>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted small">Cód: <strong class="text-secondary">PROD-001</strong></span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark border px-3 py-2 fw-medium">
                            <i class="bi bi-tag-fill text-danger me-1"></i> Repuestos
                        </span>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <span class="fw-bold fs-5 mb-0">12</span>
                            <div class="progress mt-1" style="height: 5px; width: 80px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"></div>
                            </div>
                            <small class="text-muted mt-1" style="font-size: 0.75rem;">Unidades</small>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <span class="text-muted small">Compra: <strong class="text-dark">$85.00</strong></span>
                            <span class="text-success small fw-bold">Venta: $120.00</span>
                        </div>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input shadow-none custom-switch-danger" type="checkbox" checked>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2">Activo</span>
                        </div>
                    </td>
                    <td class="pe-4 text-end">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-light btn-sm rounded-3 border shadow-sm px-3" title="Editar">
                                <i class="bi bi-pencil-square text-primary"></i>
                            </button>
                            <button class="btn btn-light btn-sm rounded-3 border shadow-sm px-3" title="Eliminar">
                                <i class="bi bi-trash3 text-danger"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>
</div>
        </div>
    </div>

</section>

