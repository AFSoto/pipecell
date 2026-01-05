<main class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 text-center">

                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-lg"
                    style="width: 100px; height: 100px;">
                    <i class="bi bi-phone display-4"></i>
                </div>

                <h1 class="fw-bold display-5 mb-2">PipeCel Admin</h1>
                <p class="lead text-muted mb-5">Ingresa tus credenciales para continuar</p>

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="display-6 fw-bold mb-2">Iniciar Sesión</h2>
                        <p class="text-muted mb-4">Panel de Administración</p>
                        <?php if (isset($_SESSION['error_login'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4 text-start" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                                    <div>
                                        <?= $_SESSION['error_login']; ?>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php utils::deleteSession("error_login"); ?>
                        <?php endif; ?>

                        <form action="<?= BASE_URL ?>user/login" method="POST">
                            <div class="mb-4 text-start">
                                <label for="email" class="form-label fw-bold">email</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white border-end-0 text-muted px-4">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 ps-0 shadow-none"
                                        id="usuario"
                                        name="email"
                                        placeholder="Ingresa tu usuario"
                                        required>
                                </div>
                            </div>

                            <div class="mb-5 text-start">
                                <label for="password" class="form-label fw-bold">Contraseña</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white border-end-0 text-muted px-4">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password"
                                        class="form-control border-start-0 ps-0 shadow-none"
                                        id="password"
                                        name="password"
                                        placeholder="Ingresa tu contraseña"
                                        required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold rounded-3 shadow py-3 fs-5">
                                    Acceder al Panel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mt-5">
                    <a href="<?= BASE_URL ?>" class="text-decoration-none text-muted fs-5">
                        <i class="bi bi-arrow-left me-2"></i> Volver al sitio público
                    </a>
                </div>

            </div>
        </div>
    </div>
</main>