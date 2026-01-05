<?php

class adminController {

    public function index() {
        // Lógica para la vista de administración
        utils::isAdmin(); // Verificar que el usuario es administrador
        require_once 'views/admin/dashboard.php';
    }
}