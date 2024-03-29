<?php
require_once '../head.php';
?>
<html>

<head>
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body style="background-color: #2E2F2F;">


  <div class="row">
    <div class="col-11,5">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">LISTA DE PRODUCTOS</h3>


        </div>
        <!-- tabla -->
        <div class="card-body table-responsive p-2">

          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>NOMBRE DEL PRODUCTO</th>
                <th>DETALLE DEL PRODUCTO</th>
                <th>DESCRIPCION DEL PRODUCTO</th>
                <th>PESO DEL PRODUCTO</th>
                <th>TIPO DE PESO</th>
                <th>PRECIO</th>
                <th><a href="productos.php"><i class="fas fa-plus"></i> crear producto</a></th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../conexiones/producto.php';
              require_once '../conexiones/conexion.php';
              $oconexion = new conectar();
              $oconexion = $oconexion->conexion();
              $oproducto = new producto();
              $consulta = $oproducto->listarproductodetalle();
              foreach ($consulta as $registro) {

              ?>
                <tr>
                  <td><?PHP echo $registro['nombreProducto'] ?></td>
                  <td><?php echo $registro['detalleproducto'] ?></td>
                  <td><?PHP echo $registro['descripcion'] ?></td>
                  <td><?php echo $registro['peso'] ?></td>
                  <td><?php echo $registro['tipopeso'] ?></td>
                  <td><?php echo $registro['precio'] ?></td>
                  <th>
                    <a href="../productos/formularioeditar.php?id=<?php echo $registro['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> editar</a>
                  </th>
                  <th>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id']; ?>);"><i class="fas fa-trash"></i> eliminar</a>
                  </th>

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

</body>

</html>

<!-- Modal -->
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
        <form action="eliminarproducto.php" method="get">
          <input type="" name="id" id="eliminar" style="display:none;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
          <button type="submit" class="btn btn-danger">eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function eliminar(id) {
    document.getElementById('eliminar').value = id;
  }
</script>