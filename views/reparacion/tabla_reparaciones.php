<?php
// Este archivo usa $lista_a_mostrar y $titulo pasados por require
if (isset($lista_a_mostrar) && is_array($lista_a_mostrar) && count($lista_a_mostrar) >= 1):
?>
    <h5 class="card-title mb-3"><?= $titulo ?> (<?= count($lista_a_mostrar) ?> Registros)</h5>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Caja</th>
                    <th>Cliente</th>
                    <th>Marca</th>
                    <th>Costo Total</th>
                    <th>Abono</th>
                    <th>Saldo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_a_mostrar as $rep): ?>
                    <?php
                    $saldo_pendiente = $rep['valor_total'] - $rep['abono'];
                    $saldo_class = ($saldo_pendiente > 0) ? 'text-danger' : 'text-success';
                    ?>
                    <tr>
                        <td class="small text-muted">#<?= htmlspecialchars($rep['id']) ?></td>
                        
                        <td class="fw-bold text-center"><?= htmlspecialchars($rep['caja_id']) ?></td>
                        
                        <td><?= htmlspecialchars($rep['nombre_cliente']) ?></td>
                        
                        <td><?= htmlspecialchars($rep['marca']) ?></td>
                        
                        <td>$<?= number_format($rep['valor_total'], 0, ',', '.') ?></td>
                        
                        <td>$<?= number_format($rep['abono'], 0, ',', '.') ?></td>
                        
                        <td class="fw-bold <?= $saldo_class ?>">
                            $<?= number_format($saldo_pendiente, 0, ',', '.') ?>
                        </td>
                        
                        <td>
                            <select class="form-select form-select-sm select-estado"
                                data-id="<?= $rep['id'] ?>"
                                data-caja="<?= $rep['caja_id'] ?>">
                                <option value="en_proceso" <?= $rep['estado'] == 'en_proceso' ? 'selected' : '' ?>>En proceso</option>
                                <option value="arreglado" <?= $rep['estado'] == 'arreglado' ? 'selected' : '' ?>>Arreglado</option>
                                <option value="entregado" <?= $rep['estado'] == 'entregado' ? 'selected' : '' ?>>Entregado</option>
                            </select>
                        </td>
                        
                        <td>
                            <a href="<?= BASE_URL ?>reparacion/detalle?id=<?= $rep['id'] ?>" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye"></i> Ver Más
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php else: ?>
    <div class="text-center py-5">
        <i class="bi bi-info-circle fs-1 text-muted"></i>
        <h6 class="fw-bold mt-3">
            No hay reparaciones en este filtro (<?= $titulo ?>)
        </h6>
        <p class="text-muted mb-0">
            Intenta revisar otro estado o añade una nueva reparación.
        </p>
    </div>
<?php endif; ?>