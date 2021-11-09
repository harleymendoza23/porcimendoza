<?php 
require_once '../conexiones/rol.php';
 require_once '../head.php';
require_once '../conexiones/permiso.php';
require_once '../conexiones/conexion.php';




$orol= new rol();
$orol->id_rol=$_GET['id_rol']; 
$listarrol = $orol->consultarrol_permiso();

?>



<!DOCTYPE html>
<html lang="es">

<table class="table">
    <thead>
      <tr>
       <th><center><h2>DAR PERMISO</h2></center></th>
    </tr>
    </thead>
  
     
         <tr >
           <th>paginas con permiso</th>
           <th>nombre modulo</th>
         
           <th><a href="/porcimendoza/administrador/agregarpermiso.php?id_rol=<?php echo $_GET['id_rol'];?>" class="btn btn-info" ><i class="fas fa-search-plus"></i> agregar permiso</a></th>

         
          </tr>
   </thead>
     <body>
    

     <div class="container">
     
     
     <input type="text" name="id_rol" value="<?php echo $orol->id_rol; ?>" style="display:none;">
     
     
      
      <input class="form-control" type="text" name="nombre_rol"  value="<?php echo $orol->nombre_rol; ?>" disabled>
      <table class="table">
      <?php
  
     
     $oconexion=new conectar();
     $oconexion=$oconexion->conexion();
     $opermiso=new permiso();
     $consulta=$opermiso->listaPaginasConPermiso($orol->id_rol);
     foreach ($consulta as $registro){
     
       
        ?>
      
       <!-- en este codigo se trabaja html con php -->
       <tr class="table-primary">
         <td><?php echo $registro ['nombre_pagina'];?> </td>
         <td><?php echo $registro['nombre_modulo'];?></td>
        
      <th>
      <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro ['id_permiso']?>, <?php echo $registro['id_rol']; ?>);" ><i class="fas fa-trash"></i> eliminar</a> -->
      </th>
         
       </tr>
     <?php

    }
    ?>
</table>


                           
                          
    <a href="detallerol.php?id_rol=<?php echo $orol->id_rol; ?>" class="btn btn-outline-info"><i class="fas fa-undo-alt"></i>volver</a>
                          
                    
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
        esta seguro que quiere eliminar el permiso
      </div>
      <div class="modal-footer">
        <form action="eliminarpermiso.php" method="get">
           <input type="" name="id_permiso" id="eliminar" style="display:none;" >
           <input type="" name="id_rol" id="eliminar_permiso" style="display:none;" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
        <button type="submit" class="btn btn-danger">eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function eliminar(id_permiso,id_rol){
    document.getElementById('eliminar').value=id_permiso;
    document.getElementById('eliminar_rol').value = id_rol;
  }
</script>