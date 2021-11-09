<?php

$funcion = "";
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}
$opermiso = new permisocontroller();

switch ($funcion) {
    case "nuevopermiso":
        $opermiso->nuevopermiso();
       
        break;
}

class permisocontroller
{
    function nuevopermiso()
    {
        require_once '../conexiones/conexion.php';
        require_once '../conexiones/permiso.php';
        require_once '../conexiones/pagina.php';
        
        $opermiso = new permiso();
        $opermiso->id_pagina = $_GET['id_pagina'];
        $opermiso->id_rol = $_GET['id_rol'];
        $opagina= new pagina();
        $opagina->id_pagina=$_GET['id_pagina'];
        $opagina->consultarPagina();

        $opermiso->id_modulo=$opagina->id_modulo;
        $result = $opermiso->nuevopermiso();
        if ($result) {
            header("location: /PORCIMENDOZA/administrador/permiso.php?id_rol=" . $_GET['id_rol']);
        } else {
            echo "Error al registrar el permiso";
        }
    }
}
