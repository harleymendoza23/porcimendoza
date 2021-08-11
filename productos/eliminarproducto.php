<?php


require_once '../conexiones/producto.php';
require_once '../conexiones/conexion.php';

$oproducto=new producto();
$oproducto->id=$_GET['id'];
$result=$oproducto->eliminarproducto();
if($result){
    header("Location: productoslista.php");
}else{
    echo "error al eliminar el producto";
}
?>