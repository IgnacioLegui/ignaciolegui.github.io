  <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home/index">Fight Lab</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="<?= APP_URL ?>home/index">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= APP_URL ?>producto/index">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= APP_URL ?>sale/index">Ventas</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= APP_URL ?>usuario/index">Usuarios</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-lock"></i> Mi cuenta
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= APP_URL ?>usuario/profile">Mis datos</a></li>
              <li><a class="dropdown-item" href="">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>