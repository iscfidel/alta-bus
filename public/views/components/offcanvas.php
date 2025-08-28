<?php include './app/helpers/routes.php'; ?>
<nav class="navbar bg-primary-subtle border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand mt-1 fw-semibold" href="#">
            <img src="<?php echo assets('logometroblanco.png'); ?>" alt="Logo" width="15%" height="25%" class="d-inline-block align-text-top me-2">
            Sistema de Transporte Colectivo Metrorrey
        </a>
        <button class="btn bg-primary-subtle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <i class="fa-solid fa-bars fa-xl" style="color: #ffffff;"></i>
        </button>
    </div>
</nav>


<div class="offcanvas offcanvas-start bg-primary-subtle text-white" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" data-bs-theme="dark">
    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title text-white" id="offcanvasWithBothOptionsLabel"><i class="fa-solid fa-bars fa-xl mx-3" style="color: #ffffff;"></i>Menu Lateral</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p class="text-light">Seleccione alguno de los modulos que se muestra.</p>
        <!-- Aquí puedes agregar tus opciones de menú -->
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-home me-2"></i>Inicio</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="reportesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-chart-bar me-2"></i>Reportes
                </a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="reportesDropdown">
                    <li><a class="dropdown-item text-white" href="#">Contadores</a></li>
                    <li><a class="dropdown-item text-white" href="#">Transmetro</a></li>
                    <li><a class="dropdown-item text-white" href="#">Metro</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-bus-simple me-2" style="color: #ffffff;"></i>Alta Rutas</a>
            </li>
            <li class="nav-item">
                <?php
                function route($path) {
                    return "/report/public/views/" . ltrim($path, "/");
                }
                ?>
                <a class="nav-link text-white" href="/alta_buses/logout"><i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> -->

