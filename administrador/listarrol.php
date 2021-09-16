<?php
require '../head.php';
?>




<html>
 
    
  <table class="table">
    <thead>
      <tr>
       <th><h2>roles</h2></th>
    </tr>
    </thead>
  
     
         <tr >
           <th>nombre rol</th>
         
     
           <!-- estos son los iconos<i class="fas fa-plus"></i> -->

           <th><a  href="nuevosroles.php"><i class="fas fa-plus"></i> nuevo</a></th>
           
           
          </tr>
   </thead>

   <body>
   <?php
     require_once '../conexiones/rol.php';
     require_once '../conexiones/conexion.php';
     $oconexion=new conectar();
     $oconexion=$oconexion->conexion();
     $oRol=new rol();
     $consulta=$oRol->listar_rol();
     foreach ($consulta as $registro){
       
        ?>
        <!-- en este codigo se trabaja html con php -->
        <tr class="table-primary">
          <td><?php echo $registro ['nombre_rol'];?> </td>
       
         
          <th>
            <a href="/porcimendoza/administrador/formularioeditarrol.php?id_rol=<?php echo $registro['id_rol'];?>" class="btn btn-warning"><i class="fas fa-edit"></i> editar</a>

           
           <!-- esta parte sirve para mostrarle al cliente los comentarios de si esta seguro de eliminar -->

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro ['id_rol']; ?>);" ><i class="fas fa-trash"></i> eliminar</a>
            <a href="/NOTASESTUDIANTE/detallerol.php?id_rol=<?php echo $registro['id_rol'];?>" class="btn btn-info" ><i class="fas fa-search-plus"></i> detalle del rol</a>
          </th>
        </tr>
      <?php

     }


     ?>


    </body>
 </table>
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
        esta seguro que quiere eliminar el rol
      </div>
      <div class="modal-footer">
        <form action="eliminarrol.php" method="get">
          <input type="text" name="id_rol" id="eliminar"  style="display:none;" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
        <button type="submit" class="btn btn-danger">eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function eliminar(id_rol){
    document.getElementById('eliminar').value=id_rol;
  }
</script>