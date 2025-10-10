<!--
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Fight Lab - Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../../public/apps/js/item/service.js" defer></script>
  <script src="../../../../public/apps/js/item/controller.js" defer></script>
  <script src="../../../../public/apps/js/item/index.js" defer></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">
  <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home/index.php">Fight Lab</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="../home/index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link active" href="../item/index.php">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="../sale/index.php">Ventas</a></li>
          <li class="nav-item"><a class="nav-link" href="../user/index.php">Usuarios</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
              <i class="bi bi-person-lock"></i> Mi cuenta
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Mis datos</a></li>
              <li><a class="dropdown-item" href="../authentication/index.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4 flex-grow-1">
-->
    <h2 class="text-center mb-4">Gestión de Productos</h2>
    <div class="d-flex justify-content-between mb-3">
      <a class="btn btn-success" href="producto/create">
        <i class="bi bi-archive"></i>
        Crear Nuevo producto</a>
      <button type="button" class="btn btn-info" onclick="exportarPDF()" id="export-button">
        <i class="bi bi-filetype-pdf"></i>
        Exportar lista de Productos
      </button>
    </div>
    <div class="row mb-3">
      <div class="col-md-4">
        <input id="search-user" class="form-control" placeholder="Buscar por nombre de producto..." type="text" />
      </div>
      <div class="col-md-4">
        <select id="filter-role" class="form-select">
          <option value="">Filtrar por Categoria</option>
          <option value="1">1 | Guantes</option>
          <option value="2">2 | Indumentaria</option>
          <option value="3">3 | Protecciones</option>
          <option value="4">4 | Accesorios</option>
        </select>
      </div>
    </div>

    <div id="listado" class="table-responsive">
      <table class="table table-bordered table-dark table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="tabla-items">
          <!-- JS insertará los productos aquí -->
        </tbody>
      </table>
    </div>
     <!-- Toast para notificaciones -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toastSistema" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastMensaje">
        
      </div>
      <button type="button" class="btn-close btn-close-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
    </div>
  </div>
</div>
<!--
  </main>
 
  <footer class="bg-danger text-center text-white py-3">
    Fight Lab v1.0 | José I. Leguizamón | Laboratorio de Programación | Ingeniería en Sistemas | UNPA
  </footer>
</body>
</html>

-->
