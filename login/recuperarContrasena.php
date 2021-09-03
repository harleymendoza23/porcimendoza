<?php
session_start();

    if(isset($_SESSION['idUser'])){
        
        header("Location: ../botones.php");
        die();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>porcimendoza</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>¿Olvidó su contraseña?</b>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Ingrese su correo electrónico para reestablecer su contraseña</p>
        <p style="color:#FE2D00;">
       </p>
      <form action="../controllers/userController.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Correo electronico" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="funcion" value="recuperarContrasena">Entrar</button>
          </div>
          
        </div>
      </form>
      <p class="mb-1">
        <a href="login.php">Iniciar Sesión</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">¿No tiene usuario?</a>
      </p>
    </div>
    
  </div>
</div>

</body>
</html>