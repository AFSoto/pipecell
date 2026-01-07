<section class="container-fluid py-4">

    <!-- sesion fash para mostrar si la categoria se creo o hubo un error -->
    <div class="row mb-2">
        <div class="col-12">
            <?php if (isset($_SESSION['categoria_res'])): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                    <div>
                        <strong class="d-block">¡Excelente!</strong>
                        <span class="small"><?= $_SESSION['categoria_res']; ?></span>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php utils::deleteSession('categoria_res'); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_categoria'])): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-octagon-fill me-3 fs-4"></i>
                    <div>
                        <strong class="d-block">Hubo un problema</strong>
                        <span class="small"><?= $_SESSION['error_categoria']; ?></span>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php utils::deleteSession('error_categoria'); ?>
            <?php endif; ?>
        </div>
    </div>


    <!-- session fash para mostrar si la categoria se edito correctamente o hubo un error -->

    <div class="row">
        <div class="col-12">

            <?php if (isset($_SESSION['categoria_res_update'])): ?>
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 d-flex align-items-center mb-4" role="alert">
                    <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <span class="fw-bold">¡Operación exitosa!</span><br>
                        <small><?= $_SESSION['categoria_res_update']; ?></small>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php utils::deleteSession('categoria_res_update'); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_categoria_update'])): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 d-flex align-items-center mb-4" role="alert">
                    <div class="bg-danger text-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <div>
                        <span class="fw-bold">Algo salió mal</span><br>
                        <small><?= $_SESSION['error_categoria_update']; ?></small>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php utils::deleteSession('error_categoria_update'); ?>
            <?php endif; ?>

        </div>
    </div>







    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Gestión de Categorías</h2>
            <p class="text-muted mb-0">Administra las categorías de productos de tu tienda</p>
        </div>
        <button class="btn btn-primary px-4 py-2 fw-bold shadow-sm d-flex align-items-center gap-2 rounded-3" data-bs-toggle="modal" data-bs-target="#modalCategoria">
            <i class="bi bi-plus-lg"></i> Nueva Categoría
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted" style="width: 25%;">Categoría</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted" style="width: 35%;">Descripción</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Productos</th>
                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Valor Inventario</th>
                        <th class="pe-4 py-3 text-end text-uppercase small fw-bold text-muted">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($categorias && $categorias->rowCount() > 0): ?>
                        <?php while ($cat = $categorias->fetch(PDO::FETCH_OBJ)): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 d-flex">
                                            <i class="bi bi-tag-fill fs-5"></i>
                                        </div>
                                        <span class="fw-bold text-dark"><?= $cat->nombre; ?></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-muted small mb-0 text-truncate" style="max-width: 300px;">
                                        <?= $cat->descripcion ? $cat->descripcion : '<span class="text-light-emphasis italic">Sin descripción</span>'; ?>
                                    </p>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border px-3 py-2 fw-medium">Ver productos</span>
                                </td>
                                <td class="text-center text-primary fw-bold">
                                    #<?= $cat->id; ?>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="button"
                                            class="btn btn-link text-dark p-1 shadow-none border-0"
                                            title="Editar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditarCategoria<?= $cat->id ?>">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </button>
                                        <a href="<?= BASE_URL ?>categoria/delete&id=<?= $cat->id ?>"
                                            onclick="return confirm('¿Estás seguro de eliminar esta categoría?')"
                                            class="btn btn-link text-danger p-1 shadow-none" title="Eliminar">
                                            <i class="bi bi-trash3 fs-5"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>




                            <!-- modal para editar categoria  -->

                            <div class="modal fade" id="modalEditarCategoria<?= $cat->id ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg rounded-4">

                                        <div class="modal-header border-0 pt-4 px-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                                    <i class="bi bi-pencil-fill fs-5"></i>
                                                </div>
                                                <div>
                                                    <h5 class="modal-title fw-bold">Editar Categoría</h5>
                                                    <p class="text-muted small mb-0">Modifica la información de la categoría</p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body p-4">
                                            <form action="<?= BASE_URL ?>categoria/update" method="POST">
                                                <input type="hidden" name="id" value="<?= $cat->id ?>">

                                                <div class="mb-3">
                                                    <label class="form-label fw-bold small text-uppercase" style="letter-spacing: 0.5px;">Nombre</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light border-end-0 text-muted">
                                                            <i class="bi bi-type"></i>
                                                        </span>
                                                        <input type="text"
                                                            class="form-control border-start-0 ps-0 shadow-none bg-light"
                                                            name="nombre"
                                                            value="<?= $cat->nombre ?>"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label fw-bold small text-uppercase" style="letter-spacing: 0.5px;">Descripción</label>
                                                    <textarea class="form-control bg-light shadow-none"
                                                        name="descripcion"
                                                        rows="3"><?= $cat->descripcion ?></textarea>
                                                </div>

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2">
                                                    <button type="button" class="btn btn-light fw-bold px-4 rounded-3 text-muted" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary fw-bold px-4 rounded-3 shadow-sm">
                                                        <i class="bi bi-save me-1"></i> Actualizar Cambios
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No hay categorías registradas aún.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>






<!-- modal para crear categoría -->
<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header border-0 pt-4 px-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                        <i class="bi bi-tag-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold" id="modalCategoriaLabel">Nueva Categoría</h5>
                        <p class="text-muted small mb-0">Organiza tus productos por grupos</p>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <form action="<?= BASE_URL ?>categoria/save" method="POST">

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold small text-uppercase" style="letter-spacing: 0.5px;">Nombre de la Categoría</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-type"></i>
                            </span>
                            <input type="text"
                                class="form-control border-start-0 ps-0 shadow-none bg-light"
                                id="nombre"
                                name="nombre"
                                placeholder="Ej: Pantallas, Baterías, Cargadores"
                                required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold small text-uppercase" style="letter-spacing: 0.5px;">Descripción (Opcional)</label>
                        <textarea class="form-control bg-light shadow-none"
                            id="descripcion"
                            name="descripcion"
                            rows="3"
                            placeholder="Breve detalle sobre los productos de esta categoría..."></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2">
                        <button type="button" class="btn btn-light fw-bold px-4 rounded-3 text-muted" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger fw-bold px-4 rounded-3 shadow-sm">
                            <i class="bi bi-check-lg me-1"></i> Guardar Categoría
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>