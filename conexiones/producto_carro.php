<?php
require_once '../conexiones/conexion.php';
class productoc
{
    public $id_producto = 0;
    public $id_pedido = "";
    public $nombre_producto = "";
    public $peso_producto = "";
    public $precio_producto = "";
    public $id_inclusion_productos = "";
    public $id_session="";
    function agregar_producto()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "INSERT INTO producto (id_pedido,nombre_producto,peso_producto,precio_producto,id_inclusion_productos) 
        VALUES ($this->id_pedido,'$this->nombre_producto',$this->peso_producto,$this->precio_producto,$this->id_inclusion_productos)";
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }
    function consultar_producto()
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();
        $sql = "SELECT pr.nombre_producto, pr.peso_producto, pr.precio_producto FROM pedido pe INNER JOIN producto pr ON pe.id_pedido=pr.id_pedido WHERE pe.id_session='$this->id_session'";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }
}
