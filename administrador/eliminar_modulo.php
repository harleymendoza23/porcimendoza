<?php


require_once '../conexiones/modulo.php';
require_once '../conexiones/conexion.php';

$omodulo=new modulo();
$omodulo->id_modulo=$_GET['id_modulo'];
$result=$omodulo->eliminarmodulo();
if($result){
    header("Location: modulo.php");
}else{
    echo "error al eliminar el modulo";
}
?>