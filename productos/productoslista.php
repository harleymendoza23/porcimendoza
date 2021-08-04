<?php
require_once '../head.php';
?>
<html>

<head>
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body style="background-color: #2E2F2F;">


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">PORCIMENDOZA</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- tabla -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>NOMBRE DEL PRODUCTO</th>
                <th>DETALLE DEL PRODUCTO</th>
                <th>PESO DEL PRODUCTO</th>
                <th>TIPO DE PESO</th>
                <th>PRECIO</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../conexiones/producto.php';
              require_once '../conexiones/conexion.php';
              $oconexion = new conectar();
              $oconexion = $oconexion->conexion();
              $oproducto = new producto();
              $consulta = $oproducto->listarproducto();
              foreach ($consulta as $registro) {

              ?>
                <tr>
                  <td><?PHP echo $registro['nombreProducto'] ?></td>
                  <td><?php echo $registro['detalleproducto'] ?></td>
                  <td><?php echo $registro['peso'] ?></td>
                  <td><?php echo $registro['tipopeso'] ?></td>
                  <td><?php echo $registro['precio'] ?></td>




                  <th>
                    <a href="../productos/formularioeditar.php?id=<?php echo $registro['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> editar</a>

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

  // $('table').stacktable();