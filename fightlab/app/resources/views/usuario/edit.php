<!--

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Fight Lab - Editar Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../../public/apps/js/user/service.js" defer></script>
  <script src="../../../../public/apps/js/user/controller.js" defer></script>
  <script src="../../../../public/apps/js/user/edit.js" defer></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-dark text-white">
  <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home/index.php">Fight Lab</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="../home/index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="../item/index.php">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="../sale/index.php">Ventas</a></li>
          <li class="nav-item"><a class="nav-link active" href="../user/index.php">Usuarios</a></li>
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

    <h2 class="text-center mb-4">Editar Usuario</h2>
    <form id="formularioEdicion" autocomplete="off">
       <input type="hidden" id="id" name="id" />
      <div class="mb-3">
        <label class="form-label" for="apellido">Apellido</label>
        <input class="form-control" id="apellido" name="apellido" minlength="2" maxlength="30" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="nombres">Nombres</label>
        <input class="form-control" id="nombres" name="nombres" minlength="2" maxlength="50" />
      </div>
      <div class="mb-3">
        <label class="form-label" for="cuenta">Cuenta</label>
        <input class="form-control" id="cuenta" name="cuenta" minlength="4" maxlength="20" required />
      </div>
      <div class="mb-3">
        <label class="form-label" for="perfil">Perfil</label>
        <select class="form-select" id="perfil" name="perfil" required>
          <option value="">Seleccione una opción</option>
          <option value="operador">Operador</option>
          <option value="administrador">Administrador</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" maxlength="100" required />
      </div>
      <div class="mb-3">
        <label class="form-label" for="estado">Estado</label>
        <input type="number" class="form-control" id="estado" name="estado" maxlength="100" required />
      </div>
       <div class="mb-3">
        <label class="form-label" for="clave">Clave</label>
        <input type="password" class="form-control" id="clave" name="clave" minlength="8" maxlength="25" required />
      </div>
      <div class="mb-3">
        <label class="form-label" for="confirmacion">Confirmación de clave</label>
        <input type="password" class="form-control" id="confirmarClave" name="confirmarClave" minlength="8" maxlength="25" required />
      </div>
      <div class="d-flex flex-wrap gap-2">
        <button type="button" id="btnEditar" class="btn btn-warning">Editar</button>
        <button type="submit"  class="btn btn-success">Actualizar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
        <button type="button" id="btnCancelar" class="btn btn-light">Cancelar</button>
        <button type="button" id="btnExportarPDF" class="btn btn-info text-white">Exportar a PDF</button>
        <a href="usuario/index" class="btn btn-secondary" >Volver</a>
      </div>
    </form>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toastSistema" class="toast text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastMensaje"></div>
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