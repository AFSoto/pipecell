<main class="container my-5 flex-grow-1">

<?php if (isset($_SESSION['caja_res'])): ?>
    <div class="alert alert-<?= $_SESSION['caja_res']['status'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['caja_res']['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['caja_res']); // Limpiamos la sesión para que no se repita el mensaje ?>
<?php endif; ?>


    <?php if (isset($_SESSION['reparacion_status'])): ?>
        <?php
        $status = $_SESSION['reparacion_status'];
        $alert_class = '';
        $message = '';

        switch ($status) {
            case 'success':
                $alert_class = 'alert-success';
                $message = '✅ ¡Reparación registrada con éxito!';
                break;
            case 'error_validation':
                $alert_class = 'alert-warning';
                $message = '⚠️ Error: Faltan campos requeridos (Cliente, Marca, Caja o Costo Total). Por favor, revisa el formulario.';
                break;
            case 'error_db':
                $alert_class = 'alert-danger';
                $message = '❌ Error de Base de Datos: No se pudo guardar la reparación. Intenta de nuevo más tarde.';
                break;
            case 'error_exception':
                $alert_class = 'alert-danger';
                $message = '🔥 Error Interno: Ocurrió un fallo en el servidor al intentar procesar la solicitud.';
                break;
            default:
                $alert_class = 'alert-info';
                $message = 'Mensaje de estado desconocido.';
        }
        ?>

        <div class="alert <?= $alert_class ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
        // Limpiar la sesión inmediatamente después de mostrar el mensaje
        Utils::deleteSession('reparacion_status');
        Utils::deleteSession('reparacion_data');
        ?>
    <?php endif; ?>
    <!-- TÍTULO + BOTÓN -->
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h3 class="fw-bold mb-1">Gestión de Reparaciones</h3>
            <p class="text-muted mb-0">
                Registra y administra las reparaciones de celulares
            </p>
        </div>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalNuevaCaja"> <i class="bi bi-plus-lg"></i> Nueva Caja
        </button>

        <button
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalNuevaReparacion">
            <i class="bi bi-plus-lg"></i> Nueva Reparación
        </button>

    </div>

    <!-- TARJETAS DE RESUMEN -->
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Total de Reparaciones</small>
                    <h2 class="fw-bold mb-0">0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Total Abonado</small>
                    <h2 class="fw-bold text-danger mb-0">$0.00</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Saldo Pendiente</small>
                    <h2 class="fw-bold text-danger mb-0">$0.00</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- FILTROS -->
    <div class="row g-3 mb-4">

        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>
                </span>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar por nombre, teléfono o caja...">
            </div>
        </div>

        <div class="col-md-3">
            <select class="form-select" id="filtro-estado">
                <option value="todos" selected>Todos los estados</option>
                <option value="en_proceso_div">En proceso</option>
                <option value="arreglado_div">Arreglado</option>
                <option value="entregado_div">Entregado</option>
            </select>
        </div>

    </div>

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="card shadow-sm mt-3">
        <div class="card-body">

            <div id="todos" class="tabla-contenido">
                <?php $lista_a_mostrar = $reparaciones_list;
                $titulo = 'Todas las Reparaciones';
                require 'tabla_reparaciones.php'; ?>
            </div>

            <div id="en_proceso_div" class="tabla-contenido" style="display: none;">
                <?php $lista_a_mostrar = $reparaciones_en_proceso;
                $titulo = 'Reparaciones en Proceso';
                require 'tabla_reparaciones.php'; ?>
            </div>

            <div id="arreglado_div" class="tabla-contenido" style="display: none;">
                <?php $lista_a_mostrar = $reparaciones_arregladas;
                $titulo = 'Reparaciones Arregladas';
                require 'tabla_reparaciones.php'; ?>
            </div>

            <div id="entregado_div" class="tabla-contenido" style="display: none;">
                <?php $lista_a_mostrar = $reparaciones_entregadas;
                $titulo = 'Reparaciones Entregadas';
                require 'tabla_reparaciones.php'; ?>
            </div>

        </div>
    </div>

</main>







<!-- MODAL NUEVA REPARACIÓN -->
<div class="modal fade" id="modalNuevaReparacion" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-phone"></i> Nueva Reparación
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formNuevaReparacion" method="POST" action="<?= BASE_URL ?>reparacion/save">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Nombre del cliente *</label>
                            <input type="text" name="nombre_cliente" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono_cliente" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Marca *</label>
                            <input type="text" name="marca" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Modelo</label>
                            <input type="text" name="modelo" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="caja_id" class="form-label">Caja *</label>

                            <select name="caja_id" id="caja_id" class="form-select" required>

                                <option value="" selected disabled>-- Seleccione una caja --</option>

                                <?php
                                // 2. Bloque de PHP para verificar y recorrer la lista de cajas libres
                                if (isset($cajas_list) && is_array($cajas_list)):
                                ?>
                                    <?php
                                    // 3. Iterar sobre la lista de cajas libres
                                    foreach ($cajas_list as $caja):
                                    ?>
                                        <option value="<?= htmlspecialchars($caja['id']) ?>">
                                            <?= htmlspecialchars($caja['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <option value="" disabled>No hay cajas libres disponibles</option>
                                <?php endif; ?>

                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="en_proceso" selected>En proceso</option>
                                <option value="arreglado">Arreglado</option>
                                <option value="entregado">Entregado</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Costo total *</label>

                            <input
                                type="text"
                                id="costo_total_visual"
                                class="form-control"
                                placeholder="0.00"
                                required
                                oninput="formatCurrency(this, 'es-CO')"> <input
                                type="hidden"
                                name="costo_total"
                                id="costo_total_hidden">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Abono</label>
                            <input type="number" name="abono" class="form-control" step="0.01" value="0">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Descripción / Falla</label>
                            <textarea name="descripcion_falla" class="form-control" rows="3"></textarea>
                        </div>

                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-danger" form="formNuevaReparacion">
                    Guardar Reparación
                </button>
            </div>

        </div>
    </div>
</div>


<!-- modal para nueva caja  -->
<div class="modal fade" id="modalNuevaCaja" tabindex="-1" aria-labelledby="modalNuevaCajaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevaCajaLabel">
                    <i class="bi bi-box-seam me-2"></i>Registrar Nueva Caja
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASE_URL ?>caja/save" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre  de la Caja / Identificador</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Caja 2" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción (Opcional)</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ej: Estante superior derecho"></textarea>
                    </div>
                    <input type="hidden" name="estado" value="libre">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Caja</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- alerta de que se actulizo un estado de arreglo exitosamente  -->
<!-- <div 
    id="alert-good"
    class="alert alert-success d-flex align-items-center position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
    role="alert"
    style="display: none; z-index: 9999;"
>
    <i class="bi bi-check-circle-fill fs-4 me-2"></i>
    <span>Estado actualizado</span>
</div> -->