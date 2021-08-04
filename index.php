<html>
<?php

require_once 'conexiones/producto.php';
$oproducto = new producto();
$consulta = $oproducto->listarproducto();
require_once 'conexiones/imagenes.php';
$oimagenes = new imagenes();
$oimagenes->guardarimagen();


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
          

            <div class="card-group mt-3">

              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/cerdo.jpeg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/cerdo01.jpeg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/cerdo02.jpeg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

              <div class="card">

                <h5 class="card-title">CERDOS</h5>
                <p><?php echo $registro['nombreProducto']; ?></p>
                <p><?php echo $registro['detalleproducto']; ?></p>
                <p><?php echo $registro['peso']; ?></p>
                <p><?php echo $registro['precio'] . " " . $registro['tipopeso']; ?></p>
                <a href="/PORCIMENDOZA/productos/detalleproducto.php?id=<?php echo $registro['id']; ?>" class="btn bg-info"> detalle del producto</a>

              </div>
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