<?php
require_once '../conexiones/permiso.php';
require_once '../conexiones/conexion.php';

$opermiso=new permiso();
$opermiso->id_permiso=$_GET['id_permiso'];
$result=$opermiso->eliminarpermiso();
if($result){
    header("location: permiso.php?id_rol=".$_GET['id_rol']);
}else{
    echo "error al eliminar el modulo";
}
