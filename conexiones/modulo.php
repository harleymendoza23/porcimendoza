<?php
class modulo{
  //para utilizar las conexiones del archivo  conexion.popover-header

    
  public $id_modulo=0;
  public $nombre_modulo= "";
  
  

  function nuevomodulo(){
      $oconxion=new conectar();
      $conexion=$oconxion->conexion();
        $sql="INSERT INTO modulo (nombre_modulo,eliminado) 
        VALUES ('$this->nombre_modulo',false)";
         $result=mysqli_query($conexion,$sql);
    return $result;
     
    }
    function listarmodulo(){
        $oconexion=new conectar();
        $conexion=$oconexion->conexion();
        $sql = "SELECT * FROM modulo  WHERE eliminado=false";
        //serive para ejecutar la funcion
        $result=mysqli_query($conexion,$sql);
        //organiza el resultado de la consola y lo retorno
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

 function consultarmodulo(){
  $oconexion=new conectar();
   $conexion =$oconexion->conexion();
   $sql = "SELECT * FROM modulo WHERE id_modulo=$this->id_modulo";
   $result=mysqli_query($conexion,$sql);
   $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
   foreach($result as $registro) {
    
      //se consultan en los parametros
      $this->id_modulo=$registro['id_modulo'];
      $this->nombre_modulo=$registro['nombre_modulo'];
     
    
    }
  }

// function Anterior($Referencia){
//    echo "
//           <input type=\"button\" 
//           onclick=\"window.location='$Referencia?&Pagina=$Referencia'\" 
//           value=\"Retornar\" 
//           name=\"volver\">
//        ";
//        Anterior("estudiante.html");
//  }
     

 function actualizarmodulo(){
  //se instancia el objeto conectar
  $oconexion= new conectar();
  //se establece conexión con la base de datos
  $conexion=$oconexion->conexion();
  //consulta para actualizar el registro
  $sql="UPDATE modulo SET nombre_modulo='$this->nombre_modulo'
  
  WHERE id_modulo=$this->id_modulo";
  //se ejecuta la consulta
  $result=mysqli_query($conexion,$sql);
  // echo $sql;
  return $result;
}
function eliminarmodulo(){
  //se instancia el objeto conectar
  $oconexion= new conectar();
  //se establece conexión con la base de datos
  $conexion=$oconexion->conexion();
  //consulta para eliminar el registro
  $sql="UPDATE modulo SET eliminado=1 WHERE id_modulo=$this->id_modulo";
  // $sql="DELETE FROM estudiante WHERE id=$this->id";
  //se ejecuta la consulta
  $result=mysqli_query($conexion,$sql);
  return $result;
}
}
