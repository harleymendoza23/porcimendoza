<html>
<?php

require_once 'conexiones/producto.php';
$oproducto = new producto();
$consulta = $oproducto->listarproducto();



?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/estilos.css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

</head>

<body style="background:#BDC3C7 fixed no-repeat 0 0 ;">

  <?php
  require 'head.php';

  ?>
  <div class="container-fluid">

    <div class="row">


      <?php
      foreach ($consulta as $registro) {
      ?>
        <div class="col col-xl-4 col-md-6 col-12">

          <?php
          require_once 'conexiones/imagenes.php';
          $oimagenes = new imagenes();
          $oimagenes->idproducto = $registro['id'];
          $vistaimagen = $oimagenes->consultarimagen();
          ?>
          <div class="card mb-100 shadow-sm" style="background-color: #85C1E9;width: 90%;height:90%">
            <form id="formulario" name="formulario" method="post" action="cart.php">
              <div class="card-header">
                <h4 class="my-0 font-weight-bold"><?php echo $registro['nombreProducto']; ?></h4>
              </div>
              <div class="card-body">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner" style="width: 100%;height: auto;">
                    <?php
                    $bandera = true;
                    foreach ($vistaimagen as $registroimg) {
                    ?>
                      <div class="carousel-item <?php if ($bandera) {
                                                  $bandera = false;
                                                  echo "active";
                                                } ?>">
                        <img src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="100" class="d-block w-100" style="max-width:100%;  width:auto;height:auto;" alt="...">
                      </div>

                    <?php
                    }
                    ?>
                  </div>

                </div>
                <h1 class="card-title pricing-card-title precio">$/ <span class="">
                    <?php echo $registro['precio']; ?>
                  </span></h1>

                <ul class="list-unstyled mt-5 mb-4">
                  <li></li>
                  <li><?php echo $registro['peso'] . " " . $registro['tipopeso']; ?></li>
                  <li><?php echo $registro['detalleproducto']; ?></li>
                  <br>
                  <a href="/PORCIMENDOZA/productos/detalleproducto.php?id=<?php echo $registro['id']; ?>" class="btn bg-info"> detalle del producto</a>
                  <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </ul>


              </div>
            </form>
          </div>

        </div>

      <?php
      }
      ?>
    </div>
  </div>

</body>
<?php
require_once 'footer.php';
?>

</html>