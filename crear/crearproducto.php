<?php
 require_once '../conexion/producto.php';
 require_once '../conexion.php';
 $oProducto=new producto();
 $oProducto->id=$_GET ['id'];
 $oProducto->nombreProducto=$_GET['nombreProducto'];
 $oProducto->peso=$_GET['peso'];
 $oProducto->precio=$_GET['precio'];
 $oProducto->archivos=$_GET['archivos'];
 $oProducto->tipopeso=$_GET['tipopeso'];
 $result=$oProducto->nuevoproducto();
 if($result){
    header("Location: ../productos/listarproducto.php");
}else{
    echo "error al registrar las notas";
}
?>
<!-- Location: listarcurso.php -->