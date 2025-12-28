

<?php

require_once 'models/Reparacion.php';
require_once 'models/caja.php';

class reparacionController {

    public function index(){
        // ----------------------------------------------------------------
        // 1. CARGA DE REPARACIONES (GENERAL Y FILTRADAS)
        // ----------------------------------------------------------------
        $reparacion = new Reparacion(); 
        
        // Lista general para la tabla principal
        $reparaciones_list = $reparacion->getAll();
        
        // Listas filtradas por estado (para contadores, pestañas o filtros)
        $reparaciones_en_proceso = $reparacion->getEnProceso();
        $reparaciones_arregladas = $reparacion->getArregladas();
        $reparaciones_entregadas = $reparacion->getEntregadas();
        
        // ----------------------------------------------------------------
        // 2. CARGA DE CAJAS DISPONIBLES
        // ----------------------------------------------------------------
        
        $caja = new Caja();
        
        // Obtiene SOLO las cajas con estado 'libre' para el SELECT del formulario
        $cajas_list = $caja->getLibres(); 
        
        // ----------------------------------------------------------------
        // 3. CARGA DE LA VISTA
        // ----------------------------------------------------------------
        
        require_once 'views/reparacion/listarReparaciones.php';
    }

    public function save()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: " . BASE_URL); 
        exit();
    }

    // 1. Sanitización y Captura (Mantengo tu lógica de limpieza)
    $nombre_cliente    = limpiarTexto($_POST['nombre_cliente'] ?? null); 
    $telefono_cliente  = limpiarTexto($_POST['telefono_cliente'] ?? null); 
    $caja_id           = limpiarEntero($_POST['caja_id'] ?? null);
    $marca             = limpiarTexto($_POST['marca'] ?? null); 
    $modelo            = limpiarTexto($_POST['modelo'] ?? null);
    $costo_total       = limpiarDecimal($_POST['costo_total'] ?? null);
    $abono             = limpiarDecimal($_POST['abono'] ?? 0.0);
    $descripcion_falla = limpiarTexto($_POST['descripcion_falla'] ?? null);
    $estado_manual     = limpiarTexto($_POST['estado'] ?? 'en_proceso');

    // 2. Validación
    $validated = $nombre_cliente && $caja_id > 0 && $marca && $costo_total !== false;

    if (!$validated) {
        $_SESSION['reparacion_status'] = 'error_validation';
        header("Location: " . BASE_URL . "reparacion/index"); 
        exit();
    }

    try {
        // --- PROCESO DE LA REPARACIÓN ---
        $reparacion = new Reparacion();
        $reparacion->setNombreCliente($nombre_cliente);
        $reparacion->setTelefonoCliente($telefono_cliente);
        $reparacion->setCajaId((int)$caja_id);
        $reparacion->setMarca($marca); 
        $reparacion->setModelo($modelo);
        $reparacion->setDescripcionFalla($descripcion_falla);
        $reparacion->setValorTotal((float)$costo_total);
        $reparacion->setAbono((float)$abono);
        $reparacion->setEstado($estado_manual); 

        // Intentamos guardar la reparación
        if ($reparacion->save()) {
            
            // --- PROCESO DE LA CAJA (Solo si la reparación se guardó) ---
            $caja = new Caja();
            $caja->setId((int)$caja_id); // Seteamos el ID
            
            // Lógica de estado de la caja: 
            // Si la reparación entra como 'en_proceso' o 'arreglado', la caja se ocupa.
            if ($estado_manual !== 'entregado') {
                $caja->setEstado('ocupada');
            } else {
                $caja->setEstado('libre');
            }

            // Llamamos al método sin parámetros como pediste
            $cajaUpdate = $caja->updateEstado();

            if ($cajaUpdate) {
                $_SESSION['reparacion_status'] = 'success';
            } else {
                $_SESSION['reparacion_status'] = 'warning_caja'; // Se guardó reparación pero no se actualizó caja
            }
        } else {
            $_SESSION['reparacion_status'] = 'error_db';
        }

    } catch (Exception $e) {
        $_SESSION['reparacion_status'] = 'error_exception';
    }
    
    header("Location: " . BASE_URL . "reparacion/index"); 
    exit();
}

public function actualizarEstadoAjax() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Iniciamos un buffer de salida para atrapar cualquier HTML que quiera colarse
        ob_start();
        // Capturamos datos del AJAX
        $id_rep = (int)$_POST['id'];
        $id_caja = (int)$_POST['caja_id'];
        $nuevo_estado = $_POST['estado'];

        $reparacion = new Reparacion();
        
        // --- SETTERS ---
        $reparacion->setId($id_rep);
        $reparacion->setCajaId($id_caja);
        $reparacion->setEstado($nuevo_estado);

        // --- EJECUCIÓN SIN PARÁMETROS ---
        $resultado = $reparacion->updateStatus();

        header('Content-Type: application/json');
        if ($resultado) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al procesar la actualización']);
        }
        exit;
    }
}
}