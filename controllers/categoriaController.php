

<?php

require_once 'models/categoria.php';

class categoriaController {

    public function index(){
        utils::isAdmin(); // Protección de administrador

        // instanciaas el mosdelo y obtener datos
        $categoria = new Categoria();
        $categorias = $categoria->getAll();


        require_once 'views/admin/categorias/listar.php';
    }

    public function save(): void {
        // 1. Protección
        utils::isAdmin();

        if (isset($_POST) && !empty($_POST['nombre'])) {
            $categoria = new Categoria();
            
            // 2. Cargamos los datos de los inputs POST
            $categoria->setNombre($_POST['nombre']);
            $categoria->setDescripcion($_POST['descripcion'] ?? null);

            // 3. Ejecutamos el guardado
            $save = $categoria->save();

            if ($save) {
                $_SESSION['categoria_res'] = "Categoría creada con éxito";
                header("Location: " . BASE_URL . "categoria/index");
            } else {
                $_SESSION['error_categoria'] = "Error al guardar: El nombre ya existe o hay un problema técnico";
                header("Location: " . BASE_URL . "categoria/index");
            }
        } else {
            $_SESSION['error_categoria'] = "El nombre de la categoría es obligatorio";
            header("Location: " . BASE_URL . "categoria/index");
        }
        exit();
    }


    public function update(): void {

            // 1. Protección
    utils::isAdmin();

    if (isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
        $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion'] : null;

        $categoria = new Categoria();
        $categoria->setId($id);
        
        // 1. Buscamos los datos actuales en la DB para no perder información
        $datosActuales = $categoria->getOne();

        if ($datosActuales) {
            // 2. Si el POST viene vacío, mantenemos lo que ya estaba en la DB
            $nuevoNombre = ($nombre !== null) ? $nombre : $datosActuales->nombre;
            $nuevaDesc = ($descripcion !== null) ? $descripcion : $datosActuales->descripcion;

            // 3. Seteamos los valores definitivos
            $categoria->setNombre($nuevoNombre);
            $categoria->setDescripcion($nuevaDesc);

            $save = $categoria->edit();

            if ($save) {
                $_SESSION['categoria_res_update'] = "Categoría actualizada correctamente";
                header("Location: " . BASE_URL . "categoria/index");
            } else {
                $_SESSION['error_categoria_update'] = "No se pudo actualizar la categoría";
                header("Location: " . BASE_URL . "categoria/index");
            }
        }
    } else {
        header("Location: " . BASE_URL . "categoria/index");
    }
    exit();
}


public function delete(): void {
    // 1. Protección
    utils::isAdmin();

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        
        $categoria = new Categoria();
        $categoria->setId($id);

        // Ejecuta el borrado lógico (UPDATE estado = 'inactivo')
        $delete = $categoria->delete();

        if ($delete) {
            $_SESSION['categoria_res_delete'] = "La categoría ha sido eliminada del listado.";
        } else {
            $_SESSION['error_categoria_delete'] = "No se pudo eliminar la categoría.";
        }
    }
    
    header("Location: " . BASE_URL . "categoria/index");
    exit();
}


}