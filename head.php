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


  <script src="/PORCIMENDOZA/js/bootstrap.min.js"></script>
  <script src="/PORCIMENDOZA/js/popper.min.js"></script>
  <script src="/PORCIMENDOZA/js/jquery-3.6.0.min.js"></script>

  <title>porcimendoza</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" style="background-color:burlywood">
      <strong><a class="navbar-brand" href="http://localhost/PORCIMENDOZA/inicio.php"><i class="material-icons">home</i>PORCIMENDOZA</a></strong>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item"><strong><a class="nav-link active" aria-current="page" href="http://localhost/PORCIMENDOZA/productos/listarproducto.php"><i class="material-icons">to list</i> PRODUCTOS</a></strong></li>
          <li class="nav-item"><strong><a class="nav-link active" aria-current="page" href="http://localhost/PORCIMENDOZA/productos/productos.php"><i class="material-icons">more</i>AGREGAR PRODUCTOS</a></strong></li>

        </ul>



        <form class="d-flex">
        <a href="controller/usuarioController.php?funcion=cerrarSesion" class="btn btn-ligth">inicio de sesion</a>
        <a href="controller/usuarioController.php?funcion=cerrarSesion" class="btn btn-ligth">registrarse</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="btn btn-ligth"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        </form>
      </div>
    </div>
  </nav>
  <br>