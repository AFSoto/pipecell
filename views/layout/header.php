<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PipeCel - Panel Principal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- javascrip personal -->
    <script src="<?= BASE_URL ?>assets/js/js.js"></script>

    <script>
    // Pasamos la constante de PHP a una variable global de JavaScript
    const BASE_URL = "<?= BASE_URL ?>";
    </script>

    <!-- Bootstrap CSS -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" 
        rel="stylesheet">
</head>

<body data-bs-theme="light" class="d-flex flex-column min-vh-100">

<!-- ===================== HEADER / NAVBAR ===================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-0">
    <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>index.php">
    <img
        src="<?= BASE_URL ?>assets/img/logo.svg"
        alt="Logo PipeCel"
        style="height: auto; max-height: 100px; width: auto; display: block;">
    </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>user/loginVista">Admin</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- BOTÓN MODO OSCURO -->
    <button 
        id="toggleTheme"
        class="btn btn-outline-secondary ms-3 me-3"
        type="button">
        <i class="bi bi-moon"></i>
    </button>
</nav>
