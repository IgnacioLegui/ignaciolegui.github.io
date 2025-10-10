<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Fight Lab - Autenticación</title>
</head>
<body class="bg-dark d-flex align-items-center justify-content-center vh-100 text-white">

  <div class="card bg-dark border-danger shadow-lg p-4" style="width: 100%; max-width: 420px;">
    <div class="text-center mb-4">
      <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
        <i class="bi bi-flask fs-1 text-white"></i>
      </div>
      <h2 class="fw-bold text-danger">Fight Lab</h2>
      <p class="text-white-50">Accedé al sistema</p>
    </div>
    <?php if (isset($error)): ?>
  <div class="alert alert-danger" role="alert">
    <?= htmlspecialchars($error) ?>
  </div>
<?php endif; ?>

    <form action="<?= APP_URL ?>authentication/login" method="POST" autocomplete="off">
      <div class="mb-3">
        <label for="userName" class="form-label text-white">Usuario</label>
        <input type="text" class="form-control bg-dark text-white border-danger" id="userName" name="userName" required placeholder="Ej: admin">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label text-white">Contraseña</label>
        <input type="password" class="form-control bg-dark text-white border-danger" id="password" name="password" required placeholder="********">
      </div>
      <button type="submit" class="btn btn-danger w-100 mt-3" >
        Ingresar
      </button>
    </form>
  </div>
</body>
</html>