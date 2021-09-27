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
    function consultarimagen()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "SELECT * FROM imagenes WHERE idproducto=$this->idproducto";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    
    }
    function consultarimagen_publicidad()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "SELECT * FROM imagenes WHERE idproducto<>$this->idproducto";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    
    }
}
