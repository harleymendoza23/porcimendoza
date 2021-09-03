<?php
require_once '../head.php';
?>

<!DOCTYPE html>
<html lang="es">

<body>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>porcimendoza</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  </head>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">INICIO DE SESSION</h3>
          </div>
          <form action="../controller/usuarioController.php" method="POST">
            
            <div class="col-md-4 position-relative">
              <label for="validationTooltipUsername" class="form-label">Correo electronico</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                <input type="email" name="correo" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                <div class="invalid-tooltip">
                  Elija un nombre de usuario único y válido.
                </div>
              </div>
            </div>
   
            <div class="col-md-4 position-relative">
              <label for="validationTooltip03" class="form-label">contraseña</label>
              <div class="input-group has-validation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <input type="password" name="contrasena" class="form-control" minlength="5" maxlength="10" id="validationTooltip03" required>
              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success" name="funcion" value="iniciarSesion">Iniciar Sesión</button>
          </form>
          <p class="mb-1">
            <a href="recuperarContrasena.php">¿Olvidó su contraseña?</a>
          </p>
          <p class="mb-0">
            <a href="registro.php" class="text-center">¿No tiene usuario?</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>