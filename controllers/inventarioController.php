<?php

class inventarioController {
    public function index() {
        utils::isAdmin(); // Verificar que el usuario es administrador
        require_once 'views/admin/inventario/index.php';
    }
}