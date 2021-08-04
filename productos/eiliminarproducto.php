<?php


require_once '../conexion/producto.php';
require_once '../conexion.php';

$oproducto=new producto();
$oproducto->id=$_GET['id'];
$result=$oproducto->eliminarproducto();
if($result){
    header("Location: productoslista.php");
}else{
    echo "error al eliminar el estudiante";
}
?>