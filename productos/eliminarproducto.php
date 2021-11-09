<?php


require_once '../conexiones/producto.php';
require_once '../conexiones/conexion.php';

$oproducto=new producto();
$oproducto->id=$_GET['id'];
$result=$oproducto->eliminarproducto();
if($result){
    header("Location: productoslista.php?titulo_mensaje=Excelente&cuerpo_mensaje=Se+ha+eliminado+el+producto+correctamente&tipo_mensaje=success");
}else{
    echo "error al eliminar el producto";
}
?>