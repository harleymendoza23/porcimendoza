<html>
<?php

require_once 'conexiones/producto.php';
$oproducto = new producto();
// $consulta = $oproducto->listarproducto();
if (isset($_GET['page'])) $pagina = $_GET['page'];
else $pagina = 1;
$consulta = $oproducto->listarproducto($pagina);
$numeroregistro = $oproducto->numeroregistro;
$numpagina = intval($numeroregistro / 8);
if (fmod($numeroregistro, 8) > 0) $numpagina++;

?>
<script src="../porcimendoza/js/separador.js"></script>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="css/estilos.css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/index.min.css">
</head>

<body>

  <?php
  require 'head.php';

  ?>
  <br>
  <div class="container-fluid">
    <div class="row" >
      <!-- paginacion -->
      <div class="col col-xl-12">
        <div class="car-tools">
          <ul id="paginacion" class="pagination pagination-sm float-md-right border border-dark">
            <li class="page-item"><a class="page-link" href="index.php?page=1">&laquo;</a></li>
            <?php
            for ($i = 1; $i <= $numpagina; $i++) {
            ?>
              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>">&raquo;</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      
    
      <div class="col col-12">
        <div class="container-fluid">
          <div class="row"> 
            <?php
            foreach ($consulta as $registro) {
            ?>
              <div class="col-md-3">

                <?php
                require_once 'conexiones/imagenes.php';
                $oimagenes = new imagenes();
                $oimagenes->idproducto = $registro['id'];
                $vistaimagen = $oimagenes->consultarimagen();
                ?>
                <div id="uno" class="card mb-100 shadow-sm" style="background-color: #85C1E9;width:auto;height:auto">
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
                      <div class="carousel-inner">
                        <?php
                        $bandera = true;
                        foreach ($vistaimagen as $registroimg) {
                        ?>
                          <div class="carousel-item <?php if ($bandera) {
                                                      $bandera = false;
                                                      echo "active";
                                                    } ?>">
                            <img style=" height: 300px;  width: 200px;" src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="100" class="d-block w-100" style="max-width:100%;  width:auto;height:auto;" alt="...">
                          </div>

                        <?php
                        }
                        ?>
                      </div>

                    </div>
                    <ul class="list-unstyled mt-1 mb-4">
                      <h1 style="text-align:center;" class="card-title pricing-card-title precio"> <span id="<?php echo $registro['id']; ?>" class="">
                          <?php echo $registro['precio']; ?>
                          <!--<script> separador('<?php echo $registro['id']; ?>','<?php echo $registro['precio']; ?>') </script>  -->
                        </span>
                        <script>
                          separador('<?php echo $registro['id']; ?>', '<?php echo $registro['precio']; ?>')
                        </script>
                      </h1>
                    </ul>
                    <ul class="list-unstyled mt-4 mb-2">

                      <li><?php echo $registro['peso'] . " " . $registro['tipopeso']; ?></li>

                    </ul>
                  </div>
                  
                 
                    <a href="/porcimendoza/controller/controllerproducto.php?funcion=añadirAlCarrito&id=<?php echo $registro['id']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Añadir al carrito</a>
                  
                  <a href="/porcimendoza/productos/detalleproducto.php?id=<?php echo $registro['id']; ?>" class="btn bg-info" style="width:auto; height: 40px;"> detalle del producto</a>


                </div>

              </div>


            <?php
            }
            ?>


          </div>

        </div>
      </div>
    </div>


</body>
<?php
require_once 'footer.php';
?>

</html>


<script>
  var separador = document.getElementById('separadormayor');

  separador.addEventListener('keyup', (e) => {
    var entrada = e.target.value.split('.').join('');
    entrada = entrada.split('').reverse();

    var salida = [];
    var aux = '';

    var paginador = Math.ceil(entrada.length / 3);

    for (let i = 0; i < paginador; i++) {
      for (let j = 0; j < 3; j++) {

        if (entrada[j + (i * 3)] != undefined) {
          aux += entrada[j + (i * 3)];
        }
      }
      salida.push(aux);
      aux = '';

      e.target.value = salida.join('.').split("").reverse().join('');
    }
  }, false);


</script>
<script src="../porcimendoza/js/filtro.js">
  
</script>