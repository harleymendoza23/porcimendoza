<?php


require_once '../conexiones/conexion.php';
require_once '../conexiones/usuario.php';
// como el id se estaba recibiendo como privado lo que se hace es volverlo publico
$id_usuario=$_GET['id_usuario'];

$ousuario=new usuario();

$result=$ousuario->eliminarusuario($id_usuario);
if($result){
    header("Location: listausuario.php");
}else{
    echo "error al eliminar el usuario";
}
?>