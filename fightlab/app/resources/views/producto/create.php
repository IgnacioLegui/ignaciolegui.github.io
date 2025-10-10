<!--
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fight Lab - Nuevo Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../../public/apps/js/item/service.js" defer></script>
  <script src="../../../../public/apps/js/item/controller.js" defer></script>
  <script src="../../../../public/apps/js/item/create.js" defer></script>
</head>
<body class=" d-flex flex-column min-vh-100 bg-dark text-white">
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
      </div>
    </div>
  </nav>

  <main class="container py-4 flex-grow-1">
-->
    <h2 class="text-center mb-4">Nuevo Producto</h2>
    <form action="/producto/save" method="POST" id="formularioAlta" autocomplete="off">
      <div class="mb-3">

        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50" />
      </div>
      <div class="mb-3">
        <label for="codigo" class="form-label">Codigo</label>
        <input type="text" class="form-control" id="codigo" name="codigo" min="0" step="0.01" pattern="^[a-zA-Z0-9_]+$" required />
      </div>
      <div class="mb-3">
        <label class="form-label" for="categoria">Categoría</label>
        <select class="form-select" id="categoria" name="categoria" required>
          <option value="">Seleccione una opción</option>
          <option value="1">Guantes</option>
          <option value="2">Indumentaria</option>
          <option value="3">Protecciones</option>
          <option value="4">Accesorios</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea class="form-control" name="descripcion" id="descripcion" minlength="10" required></textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required />
      </div>
      <div class="mb-3">
        <label class="form-label" for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" min="0" required />
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="producto/index" class="btn btn-secondary">Volver</a>
      </div>
    </form>
     <!-- Toast para notificaciones -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toastSistema" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastMensaje">
        Acción realizada con éxito
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
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