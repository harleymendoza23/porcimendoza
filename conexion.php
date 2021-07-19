<?php
class conectar{
   //guarda lo que esta en el servidor
   private $servidor="localhost";
   // lo que esta en nuestra base de datos
   private $baseDatos="porcimendoza";
  //guarda los usuarios 
//    private $usuario="harley23";
//   //guarda la contraseña
//    private $contrasena="Kpsjz1WAHj0OOqjP";
private $usuario="root";
private $contrasena="";
   function conexion(){
       //se llama la clase mysqli_connect y se le agrega los parametros para conctar a la base de datos/
       $conexion=mysqli_connect(
           $this->servidor,
           $this->usuario,
           $this->contrasena,
           $this->baseDatos
       );
       //la funcion devuelve a la conexion con la conexion de la base de datos/
       return $conexion;
   }
}
//se instancia el objeto conectar()
// $oconexion=new conectar();
// if ($oconexion->conexion()){
//   echo "se establecio conexion correctamente";

// }else{
//     echo "no se conecto";
// }
?>