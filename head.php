<?php session_start();

?>

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



  <link href="/porcimendoza/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="/porcimendoza/assets/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/porcimendoza/assets/css/ionicons.min.css">
  <link rel="stylesheet" href="/porcimendoza/assets/css/css-font.css">
  <link rel="stylesheet" href="/porcimendoza/assets/plugins/fontawesome-free/css/all.min.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />





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
              <li><a href="http:/PORCIMENDOZA/productos/listausuario.php" class="nav-link active" aria-current="page"><i class="fas fa-layer-group"></i>lista de usuarios </a></li>
              <li><a href="http:/PORCIMENDOZA/administrador/modulo.php" class="nav-link active" aria-current="page"><i class="fas fa-layer-group"></i>lista de modulos </a></li>
              <li><a href="http:/PORCIMENDOZA/administrador/listarrol.php" class="nav-link active" aria-current="page"><i class="fas fa-layer-group"></i>lista de roles </a></li>
            </ul>
          </li>
        </ul>
      </div>

      <form class="d-flex">

        <?php
        if (isset($_SESSION['id_usuario'])) {
        ?>
          <a href="http:/PORCIMENDOZA/carro de compras/cart.php" class="nav-link active">carro de compras</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        <?php
        } else {
        ?>
          <a href="http:/PORCIMENDOZA/login/login.php" class="nav-link active">inicio de sesion</a>
          <a href="http:/PORCIMENDOZA/login/registro.php" class="nav-link active">registrarse</a>

        <?php
        }
        ?>
        <style>
          /* estoy trabajando  */
        </style>
        <?php
        date_default_timezone_set('America/Bogota');
        $fechaActual = Date("Y-m-d");

        ?>
        <p><?php echo $fechaActual; ?></p>
      </form>
      <div id="relojnumerico" class="reloj" onload="cargarReloj()" style="color: #080808;font-size: 20px;font-family: 'Times New Roman', Times, serif;color:black;letter-spacing: 5px;text-align: center;"></div>
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

    </div>
  </nav>




</body>

</html>

<!-- 
  
 -->