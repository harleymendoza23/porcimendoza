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
    <div class='carrito'>
          
          <p class="carrito-total">
            <span class="simpleCart_quantity">0</span> item(s) <span class="simpleCart_total">$0.00</span>
          </p>

          <div class="bolsa">
            <div class="simpleCart_items"></div>
            <div class="opciones">
              <a class="boton simpleCart_empty" href="javascript:void(0)">Vaciar carrito</a>
              <a class="boton simpleCart_checkout" href="#">Checkout</a>
            </div>
          </div>

        </div>

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
          <div class="card-group mt-3">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <?php
                $bandera = true;
                foreach ($vistaimagen as $registroimg) {
                ?>
                  <div class="carousel-item <?php if ($bandera) {
                                              $bandera = false;
                                              echo "active";
                                            } ?>">
                    <img src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="10000" class="d-block w-100" alt="...">
                  </div>

                <?php
                }
                ?>
              </div>
              
            </div>

            <div class="card">

              
              <h5 class="card-title"><?php echo $registro['nombreProducto']; ?></h5>
              <p><?php echo $registro['detalleproducto']; ?></p>
              <p><?php echo $registro['peso']; ?></p>
              <p><?php echo $registro['precio'] . " " . $registro['tipopeso']; ?></p>
              <a href="/PORCIMENDOZA/productos/detalleproducto.php?id=<?php echo $registro['id']; ?>" class="btn bg-info"> detalle del producto</a>
              <a class="item_add" href="javascript:;"> Añadir al carrito </a>
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