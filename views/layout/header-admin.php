<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PipeCel Admin - Dashboard</title>

    <!-- javascrip personal -->
    <script src="<?= BASE_URL ?>assets/js/js.js"></script>

    <script>
    // Pasamos la constante de PHP a una variable global de JavaScript
    const BASE_URL = "<?= BASE_URL ?>";
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }
        .nav-link { transition: all 0.2s; }
        .nav-link:hover { color: #0d6efd !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center fw-bold gap-2" href="#">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 40px; height: 40px;">
                    <i class="bi bi-smartphone"></i>
                </div>
                <span class="fs-4">PipeCel</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-bold border-bottom border-primary border-2" href="<?= BASE_URL ?>admin/index">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-medium" href="<?= BASE_URL ?>reparacion/index">Reparaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-medium" href="<?= BASE_URL ?>inventario/index">Inventario</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-medium" href="<?= BASE_URL ?>categoria/index">Categorias</a>
                    </li>
                    
                    <li class="nav-item ms-lg-3">
                        <a href="<?= BASE_URL ?>" class="btn btn-outline-secondary btn-sm px-3 rounded-pill fw-medium">
                            Sitio Público
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-light rounded-circle p-2 text-danger" title="Cerrar Sesión">
                            <i class="bi bi-box-arrow-right fs-5"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>