<?php
require_once '../head.php';

require_once '../controller/controllerproducto.php';
$oproducto = new controllerproducto();
$consulta = $oproducto->consultar_producto($_SESSION['id_usuario']);
?>
<html>
<script src="../js/separador.js"></script>

<head>
  <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div style="text-align: center">
        <div class="col-md-11">
          <div class="card-header">
            <h3 class="card-title">CARRO DE COMPRAS</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>NOMBRE DEL PRODUCTO</th>
                  <th>PESO DEL PRODUCTO</th>
                  <th>PRECIO</th>
                  <th><a href="../index.php" class="btn btn-success">Desea sea agregar mas productos</a></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $indicador = 0;
                $totalPrecio = 0;
                // print_r($consulta);
                foreach ($consulta as $registro) {
                ?>
                  <?php $indicador += 1; ?>
                  <tr>
                    <td> <?php echo $indicador; ?></td>
                    <td><?php echo $registro['nombreProducto']  ?></td>
                    <td>
                      <?php echo $registro['peso'] . " " . $registro['tipopeso']  ?>
                    </td>
                    <td><span id="<?php echo $registro['id_producto']; ?>">$<?php echo $registro['precio']  ?></span>
                    <script> separador('<?php echo $registro['id_producto']; ?>','<?php echo $registro['precio']; ?>') </script> </td>
                    <td><?php $totalPrecio += $registro['precio']; ?>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id_producto']; ?>);"><i class="fas fa-trash"></i> eliminar</a>
                   </td>
                  </tr>
                <?php
                }
                //mensaje para el usuario cunado la tbala este bacia 
                if(count($consulta)==0){
                  ?>
                  <tr>
                    <td colspan="4">No hay productos seleccionados  </td>
                  </tr>
                  <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div style="text-align: center">
        <div class="col-md-12">
          <div class="card-header">
            <h3 class="card-title">TOTALES</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table style="height: auto; width: 20%;" class="table table-bordered">
            <form action="../controller/usuarioController.php" method="GET">
              <thead>
                <tr>
                  <th>Total de precio</th>

                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>$ <?php echo $totalPrecio; ?></td>
                           
                </tr>
              </tbody>
            </form>
            </table>
          </div>
        </div>
      </div>
    </div>

    <form>
  <script
    src="https://checkout.wompi.co/widget.js"
    data-render="button"
    data-public-key="pub_test_tEBKyYPgoN75xyPZUNeyAG8ZJ2g5xMXz"
    data-currency="COP"
    data-amount-in-cents="<?php echo $totalPrecio; ?>00"
    data-reference="<?php echo $registro['id_pedido'];?>"

    >
  </script>
</form></td>


  </div>
</body>

</html>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">!!ELIMINAR!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        esta seguro que quiere eliminar el porducto
      </div>
      <div class="modal-footer">
        <form action="eliminarcar.php" method="get">
          <input type="" name="id_producto" id="eliminar" style="display:none;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-danger">eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function eliminar(id_producto) {
    document.getElementById('eliminar').value = id_producto;
  }
</script>