<?php
require_once 'conexion.php';



class imagenes
{

    public $id = 0;
    public $idproducto = "";
    public $archivos = "";


    function guardarimagen()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "INSERT INTO imagenes (idproducto,archivos,eliminado) 
        VALUES ('$this->idproducto','$this->archivos',false)"; 
        
        $result = mysqli_query($conexion, $sql);
        return $result;

    }
}
