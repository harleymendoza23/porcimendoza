<?php


require_once '../conexiones/producto_carro.php';
require_once '../conexiones/conexion.php';

$oproducto=new productoc();
$id_producto=$_GET['id_producto'];
$result=$oproducto->eliminarproductocar($id_producto);
if($result){
    header("Location: cart.php");
}else{
    echo "error al eliminar el producto";
}
?>