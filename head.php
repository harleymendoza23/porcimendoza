<?php session_start(); ?>

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
        </ul>
      </div>

      <form class="d-flex">
        <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">inicio de sesion</a>
        <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">registrarse</a>
        <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>

      </form>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  $carrito_mio;
  $carrito_mio = $_SESSION['carrito'];
  $_SESSION['carrito'] = $carrito_mio;

  // contamos nuestro carrito
  if (isset($_SESSION['carrito'])) {
    for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
      if ($carrito_mio[$i] != NULL) {
        $total_cantidad = $carrito_mio['cantidad'];
        $total_cantidad++;
        $totalcantidad += $total_cantidad;
      }
    }
  }
  ?>



  <!-- MODAL CARRITO -->
  <div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">



          <div class="modal-body">
            <div>
              <div class="p-2">
                <ul class="list-group mb-3">
                  <?
                  if (isset($_SESSION['carrito'])) {
                    $total = 0;
                    for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                      if ($carrito_mio[$i] != NULL) {
                  ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div class="row col-12">
                            <div class="col-6 p-0" style="text-align: left; color: #000000;">
                              <h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <? echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; 
                                                                                                      ?></h6>
                            </div>
                            <div class="col-6 p-0" style="text-align: right; color: #000000;">
                              <span class="text-muted" style="text-align: right; color: #000000;"><? echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> €</span>
                            </div>
                          </div>
                        </li>
                  <?
                        $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                      }
                    }
                  }
                  ?>
                  <li class="list-group-item d-flex justify-content-between">
                    <span style="text-align: left; color: #000000;">Total (EUR)</span>
                    <strong style="text-align: left; color: #000000;"><?php
                                                                      if (isset($_SESSION['carrito'])) {
                                                                        $total = 0;
                                                                        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                                                          if ($carrito_mio[$i] != NULL) {
                                                                            $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                                                          }
                                                                        }
                                                                      }
                                                                      echo $total; ?> €</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL CARRITO -->

</body>

</html>

<!-- 
  
 -->