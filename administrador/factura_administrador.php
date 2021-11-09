<?php
require_once '../conexiones/conexion.php';
require_once '../conexiones/pedido.php';
require_once '../head.php';
?>

<!DOCTYPE html>
<html lang="en">

<div class="card-body table-responsive p-2">
  <table class="table">
    <thead class="table-light">
      <tr>
        <th>
          <h2>PEDIDOS</h2>
        </th>
      </tr>
    </thead>
    <td>Usuario del pedido</td>
    <td>Estado del pedido</td>
    </thead>

    <body>
      <?php

      $oconexion = new conectar();
      $oconexion = $oconexion->conexion();
      $opedido = new pedido();
      $consulta = $opedido->listar_pedido();
      foreach ($consulta as $registro) {
      ?>
        <!-- en este codigo se trabaja html con php -->
        <tr class="table-primary">
          <td></td>
          <td><?php echo $registro['estado_pedido']; ?> </td>
          <th>

          </th>
        </tr>
      <?php
      }
      ?>
    </body>
  </table>
</div>