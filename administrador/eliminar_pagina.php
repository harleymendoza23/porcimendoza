<?php


require_once '../conexiones/pagina.php';
require_once '../conexiones/conexion.php';

$opagina=new pagina();

$opagina->id_pagina=$_GET['id_pagina'];

$result=$opagina->eliminarPagina();
if($result){
    header("location: detallemodulo.php?id_modulo=".$_GET['id_modulo']);
    // echo "registro";
}else{
    echo "error al eliminar la pagina";
}
?>