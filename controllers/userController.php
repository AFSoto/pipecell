<?php

require_once 'models/user.php';

class userController {
    public function loginVista() {
        require_once 'views/user/login.php';
    }

    public function profile() {
        echo "User Controller: Profile Action";
    }

    public function login(): void {
        // 1. Verificar que lleguen datos por POST
        // var_dump($_POST); exit();
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            
            // 2. Instanciar el modelo
            $usuario = new user();
            
            // 3. Cargar los datos mediante Setters
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            // 4. Intentar el login
            $identity = $usuario->login();
            // var_dump($identity); exit();

            if ($identity && is_object($identity)) {
                // Login exitoso: Crear la sesión
                $_SESSION['identity'] = $identity;

                // Verificar si es administrador (tipo_id = 1 por ejemplo)
                if ($identity->tipo_id == 1) {
                    $_SESSION['admin'] = true;
                }

                header("Location: " . BASE_URL . "admin/index");
            } else {
                // Login fallido
                $_SESSION['error_login'] = "Email o contraseña incorrectos";
                header("Location: " . BASE_URL . "user/login");
            }
        } else {
            header("Location: " . BASE_URL . "pagina/index");
        }
        exit();
    }

    public function logout(): void {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        session_destroy();
        header("Location: " . BASE_URL);
    }
}