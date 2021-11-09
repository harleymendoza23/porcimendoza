<?php session_start();
//se crea para implemetar los permisos
//el explode vuelve un arreglo la variable en este caso es ? divide la variable en un antes del signo de pregunta 
$enlace = explode("?", $_SERVER['REQUEST_URI']);
if (file_exists("../controller/usuarioController.php"))
  require_once '../controller/usuarioController.php';
else
  require_once 'controller/usuarioController.php';
$ousuariocontroller = new usuarioController();
$ousuariocontroller->verificar_permiso($enlace[0]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/porcimendoza/css/bootstrap.min.css" rel="stylesheet">

  <link href="/porcimendoza/css/porcimendoza.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- <script src="/porcimendoza/js/popper.min.js"></script> -->
  <script src="/porcimendoza/js/jquery-3.6.0.min.js"></script>
  <script src="/porcimendoza/js/bootstrap.min.js"></script>
  
  <link rel="shortcut icon"  href="https://images.vexels.com/media/users/3/242851/isolated/preview/96a5d53e7c121ea684c79a71ff25d93b-animales-urbangrunge-cr-4-1.png" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/sweetalert2/sweetalert2.min.css">

  <link rel="stylesheet" href="/porcimendoza/assets/plugins/toastr/toastr.min.css ">

  <link rel="stylesheet" href="/porcimendoza/assets/dist/css/adminlte.min.css">



  <link href="/porcimendoza/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- <link href="/porcimendoza/assets/css/all.min.css" rel="stylesheet"> -->

  <!-- <link rel="stylesheet" href="/porcimendoza/css/ionicons.min.css"> -->
  <!-- <link rel="stylesheet" href="/porcimendoza/assets/css/css-font.css"> -->
  <link rel="stylesheet" href="/porcimendoza/assets/plugins/fontawesome-free/css/all.min.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />





  <title>porcimendoza</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #85C1E9;">


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item"><strong><a class="nav-link active" aria-current="page" href="http:/porcimendoza/index.php"> PRODUCTOS</a></strong></li>

      </ul>
    </div>
    <?php 
    if (isset($_SESSION['id_usuario'])) {
     $ousuariocontroller=new usuarioController();
    $menu= $ousuariocontroller->verificar_menu();
   // print_r($menu);
     if(count($menu)!=0){
    ?>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <strong><i class="fas fa-users-cog"></i> Administrador</strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php 
              foreach($menu as $registro){
                ?>
                <li><a href="http:<?php echo $registro['enlace']; ?>" class="nav-link active" aria-current="page"><i class="fas fa-user-tag"></i> <?php echo $registro['nombre_pagina']; ?></a></li>
            
                <?php
              }
              ?>
               </ul>
          </li>
        </ul>
      </div>

    <?php
     }
    }
    ?>




    <div class="col-md-3">
      <li style="list-style: none;" role="presentation"><a href="http:/porcimendoza/index.php" class="navbar-brand">
          <h1 class="card-title"><img class="imagen" width="80" heigth="70" src="https://images.vexels.com/media/users/3/242851/isolated/preview/96a5d53e7c121ea684c79a71ff25d93b-animales-urbangrunge-cr-4-1.png">porcimendoza</h1>
        </a></li>
    </div>
    <?php
    if (file_exists("../porcimendoza/conexiones/usuario.php"))
      require_once '../porcimendoza/conexiones/usuario.php';
    else
      require_once '../conexiones/usuario.php';
    ?>
    <?php
    if (isset($_SESSION['id_usuario'])) {
      $oUser = new usuario();
      $registro = $oUser->consultarusuario_perfil($_SESSION['id_usuario']);
      $nombre_usuario = $oUser->getNombreUser();
    ?>
      <a href="http:/porcimendoza/login/perfil.php"><img src="https://img.icons8.com/ios/50/000000/user--v2.png" class="nav-link active" style="font-family:Times New Roman;" /><?php echo $nombre_usuario; ?></a>
      <a href="http:/porcimendoza/controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
    <?php
    } else {
    ?>
      <a href="http:/porcimendoza/login/login.php" class="nav-link active">Inicio de sesion</a>
      <a href="http:/porcimendoza/login/registro.php" class="nav-link active">Registrarse</a>

    <?php
    }
    if (isset($_SESSION['id_usuario'])){
      ?>
<a href="http:/porcimendoza/carro de compras/cart.php" class="nav-link active"><i class="fas fa-cart-plus"></i>Carro de compras</a>
 
      <?php
    }

    ?>
    
     


    <br>

    <div class="row g-2">
      <div class="col-md-3"> </div>
      <label id="relojnumerico" class="reloj" onload="cargarReloj()" style="color: #080808; color:black;letter-spacing: 5px;"></label>



      <?php
      date_default_timezone_set('America/Bogota');
      $fechaActual = Date("Y-m-d");
      ?>
      <label><?php echo $fechaActual; ?></label>
    </div>
    <script>
      function cargarReloj() {

        // Haciendo uso del objeto Date() obtenemos la hora, minuto y segundo 
        var fechahora = new Date();
        var hora = fechahora.getHours();
        var minuto = fechahora.getMinutes();
        var segundo = fechahora.getSeconds();

        // Variable meridiano con el valor 'AM' 
        var meridiano = "AM";


        // Si la hora es igual a 0, declaramos la hora con el valor 12 
        if (hora == 0) {

          hora = 12;

        }

        // Si la hora es mayor a 12, restamos la hora - 12 y mostramos la variable meridiano con el valor 'PM' 
        if (hora > 12) {

          hora = hora - 12;

          // Variable meridiano con el valor 'PM' 
          meridiano = "PM";

        }

        // Formateamos los ceros '0' del reloj 
        hora = (hora < 10) ? "0" + hora : hora;
        minuto = (minuto < 10) ? "0" + minuto : minuto;
        segundo = (segundo < 10) ? "0" + segundo : segundo;

        // Enviamos la hora a la vista HTML 
        var tiempo = hora + ":" + minuto + ":" + segundo + " " + meridiano;
        document.getElementById("relojnumerico").innerText = tiempo;
        document.getElementById("relojnumerico").textContent = tiempo;

        // Cargamos el reloj a los 500 milisegundos 
        setTimeout(cargarReloj, 500);

      }

      // Ejecutamos la función 'CargarReloj' 
      cargarReloj();
    </script>
  </nav>







  <script src="/porcimendoza/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="/porcimendoza/assets/dist/js/adminlte.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- se implementa lo de mensajes  -->
  <script>
    <?php
    if (isset($_GET['titulo_mensaje'])) {
    ?>
      swal("<?php echo $_GET['titulo_mensaje']; ?>", "<?php echo $_GET['cuerpo_mensaje']; ?>", "<?php echo $_GET['tipo_mensaje']; ?>");
    <?php
    }
    ?>
  </script>
  </div>
</body>

</html>