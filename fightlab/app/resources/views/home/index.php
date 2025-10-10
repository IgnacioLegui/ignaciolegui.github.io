<!--
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fight Lab - Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">
  <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Fight Lab</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="../item/index.php">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="../sale/index.php">Ventas</a></li>
          <li class="nav-item"><a class="nav-link" href="../user/index.php">Usuarios</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-lock"></i> Mi cuenta     
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="javascript:void(0)">Mis datos</a></li>
              <li><a class="dropdown-item" href="../authentication/index.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <main class="container py-4 flex-grow-1"> -->
    <h1 class="text-danger fw-bold mb-4 text-center">Bienvenido a Fight Lab</h1>

    <div class="p-4 bg-dark border border-danger rounded" style="min-height: 300px;">

  <div class="row g-4">
    <!-- Card: Productos -->
    <div class="col-12 col-md-6">
      <div class="card bg-secondary text-white h-100">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5 class="card-title mb-1">Productos</h5>
            <p class="display-6 fw-bold mb-0">
              <?= isset($totalProductos) ? number_format($totalProductos, 0, ',', '.') : '0'; ?>
            </p>
          </div>
          <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
        </div>
      </div>
    </div>

    <!-- Card: Usuarios -->
    <div class="col-12 col-md-6">
      <div class="card bg-secondary text-white h-100">
        <div class="card-body d-flex align-items-center justify-content-between">
          <div>
            <h5 class="card-title mb-1">Usuarios</h5>
            <p class="display-6 fw-bold mb-0">
              <?= isset($totalUsuarios) ? number_format($totalUsuarios, 0, ',', '.') : '0'; ?>
            </p>
          </div>
          <i class="bi bi-people" style="font-size: 3rem;"></i>
        </div>
      </div>
    </div>
  </div>
</div>

  <!--</main>

  <footer class="bg-danger text-center text-white py-3">
    Fight Lab v1.0 | José I. Leguizamón | Laboratorio de Programación | Ingeniería en Sistemas | UNPA
  </footer>

  
</body>
</html>
-->