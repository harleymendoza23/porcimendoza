<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/PORCIMENDOZA/css/bootstrap.min.css" rel="stylesheet">
  <link href="/PORCIMENDOZA/css/all.min.css" rel="stylesheet">
  <link href="/PORCIMENDOZA/css/porcimendoza.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="/PORCIMENDOZA/js/popper.min.js"></script>
  <script src="/PORCIMENDOZA/js/jquery-3.6.0.min.js"></script>
  <script src="/PORCIMENDOZA/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/sweetalert2/sweetalert2.min.css">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/toastr/toastr.min.css ">

  <link rel="stylesheet" href="/porcimendoza/assets/dist/css/adminlte.min.css">


  <title>porcimendoza</title>
</head>

<body class="hold-transition sidebar-mini">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <li style="list-style: none;" role="presentation"><a href="http:/PORCIMENDOZA/index.php" class="navbar-brand">
          <h4 class="card-title"><img class="imagen" width="80" heigth="70" src="https://images.vexels.com/media/users/3/242851/isolated/preview/96a5d53e7c121ea684c79a71ff25d93b-animales-urbangrunge-cr-4-1.png">PORCIMENDOZA</h4>
        </a></li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <li class="nav-item"><strong><a class="nav-link active" aria-current="page" href="http:/PORCIMENDOZA/index.php"><i class="fas fa-list"></i> PRODUCTOS</a></strong></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <strong><i class="fas fa-users-cog"></i> Administrador</strong>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a href="http:/PORCIMENDOZA/productos/productoslista.php" class="nav-link active" aria-current="page"><i class="fas fa-user-tag"></i> lista de productos</a></li>
                    <li><a href="http:/NOTASESTUDIANTE/listarmodulo.php" class="nav-link active" aria-current="page"><i class="fas fa-layer-group"></i> Modulos</a></li>
          </ul>
        </li>
        <form class="d-flex">
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">inicio de sesion</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">registrarse</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        </form>

      </ul>
    </div>
  </div>
</nav>

</body>

</html>

<!-- 
  
 -->