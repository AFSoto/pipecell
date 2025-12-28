<!-- ===================== FOOTER ===================== -->
<footer class="bg-white border-top mt-auto">
    <div class="container py-4">
        <div class="row">

            <div class="col-md-4">
                <h5 class="fw-bold text-danger">PipeCel</h5>
                <p class="text-muted small">
                    Expertos en reparación de celulares y venta de accesorios.
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Enlaces Rápidos</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none text-muted">Inicio</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Reparaciones</a></li>
                    <li><a href="#" class="text-decoration-none text-muted">Inventario</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold">Contacto</h6>
                <p class="text-muted small mb-1">
                    <i class="bi bi-telephone"></i> +57 311 310 5244
                </p>
                <p class="text-muted small">
                    <i class="bi bi-envelope"></i> info@pipecel.com
                </p>
            </div>

        </div>

        <hr>

        <p class="text-center text-muted small mb-0">
            © 2025 PipeCel. Todos los derechos reservados.
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

<script>
    const toggleBtn = document.getElementById('toggleTheme');
    const body = document.body;

    toggleBtn.addEventListener('click', () => {
        body.setAttribute(
            'data-bs-theme',
            body.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark'
        );
    });
</script>

</body>
</html>
