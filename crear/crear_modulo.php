<?php
 require_once '../conexiones/modulo.php';
 require_once '../conexiones/conexion.php';
 $omodulo=new modulo();
 $omodulo->nombre_modulo=$_GET ['nombre_modulo'];

 $result=$omodulo->nuevomodulo();
 if($result){
    header("Location: ../administrador/modulo.php");
}else{
    echo "error al registrar el modulo";
}
?>