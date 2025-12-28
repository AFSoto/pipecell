<?php

session_start();
require_once 'autoload.php';
require_once 'vendor/autoload.php';
use Dotenv\Dotenv;

// Carga el archivo .env desde la raíz de pipecell
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'helpers/seguridad.php';

// --- NUEVA LÓGICA ---
// Detectamos si es una petición AJAX o si la acción contiene la palabra 'Ajax'
$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
        || (isset($_GET['action']) && str_contains($_GET['action'], 'Ajax'));

if (!$isAjax) {
    require_once 'views/layout/header.php';
}

// --- Controlador principal ---
function show_error() {
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} else {
    show_error();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['action']) && method_exists($controlador, action_default)) {
        $default = action_default;
        $controlador->$default();
    } else {
        show_error();
    }
} else {
    show_error();
}


if (!$isAjax) {
    require_once 'views/layout/footer.php';
}
