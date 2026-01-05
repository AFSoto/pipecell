<?php


class utils
{
    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }

    public static function isAdmin(): void
    {
        // Si NO existe la sesión de administrador
        if (!isset($_SESSION['admin'])) {
            // Redirigir a la página principal o login
            header("Location: " . BASE_URL . "pagina/index");
            exit(); // Es vital detener el script aquí
        }
    }
}