<?php
require_once '../conexiones/conexion.php';
require_once '../conexiones/usuario.php';
$id_usuario=$_GET['id_usuario'];

$ousuario=new usuario();

$ousuario->nombre_usuario=$_GET['nombre_usuario'];
$correo=$ousuario->getCorreoUser();
$result=$ousuario->actualizarusuario($id_usuario);
if($result){
    header("location:listausuario.php");
}else{
    echo "error al editar el usuario";
}