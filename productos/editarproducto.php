<?php


require_once '../conexiones/producto.php';
require_once '../conexiones/conexion.php';
//se instancia el objeto producto
$oproducto=new producto();
$oproducto->id=$_GET['id']; 
$oproducto->nombreProducto=$_GET['nombreProducto'];
$oproducto->detalleproducto=$_GET['detalleproducto'];
$oproducto->peso=$_GET['peso'];
$oproducto->tipopeso=$_GET['tipopeso'];
$oproducto->precio=$_GET['precio'];

$result=$oproducto->actualizarproducto();
if($result){
    header("Location: productoslista.php");
}else{
    echo "error al actualizar el producto";
}
?>