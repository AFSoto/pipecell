

<?php

require_once './models/caja.php';


class cajaController {

    public function index(){
        
    }

    public function save() {
    if (isset($_POST)) {
        // Capturar y limpiar datos
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;
        $estado = isset($_POST['estado']) ? $_POST['estado'] : 'libre';

        if ($nombre) {
            $caja = new Caja();
            
            // Seteamos los valores al objeto modelo
            $caja->setNombre($nombre);
            $caja->setDescripcion($descripcion);
            $caja->setEstado($estado);

            // Intentamos guardar
            $save = $caja->save();

            if ($save) {
                $_SESSION['caja_res'] = [
                    'status' => 'success',
                    'message' => '¡Caja ' . $nombre . ' registrada correctamente!'
                ];
            } else {
                $_SESSION['caja_res'] = [
                    'status' => 'danger',
                    'message' => 'Error: El número de caja ya existe o hubo un fallo en la base de datos.'
                ];
            }
        } else {
            $_SESSION['caja_res'] = [
                'status' => 'warning',
                'message' => 'Por favor, ingrese un número de caja válido.'
            ];
        }
    }
    
    // Redirigir a la vista principal de cajas o al inicio
    header("Location: " . BASE_URL . "reparacion/index");
    exit();
}
}