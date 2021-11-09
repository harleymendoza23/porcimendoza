<?php
require_once '../conexiones/conexion.php';
class productoc
{
    public $id_producto = 0;
    public $id_pedido = "";
    public $id_inclusion_productos = "";
    public $id_session="";
  
    function agregar_producto()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "INSERT INTO producto (id_pedido,id_inclusion_productos,eliminado) 
        VALUES ($this->id_pedido,$this->id_inclusion_productos,false)";
        $result = mysqli_query($conexion, $sql);
       // echo $sql;
        return $result;
    }
    function consultar_producto($id_pedido)
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT pe.id_pedido, pe.id_producto, pr.nombreProducto, pr.peso, pr.precio, pr.tipopeso FROM producto pe INNER JOIN inclusion_productos pr ON pe.id_inclusion_productos=pr.id WHERE pe.id_pedido=$id_pedido AND pe.eliminado=false";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
                return $result;
    }

    function eliminarproductocar($id_producto){
        
        $oconexion= new conectar();
       
        $conexion=$oconexion->conexion();
        
        $sql="UPDATE producto SET eliminado=1 WHERE id_producto=$id_producto";
        
        $result=mysqli_query($conexion,$sql);
        return $result;
      }

      function verificarid(){
        $oconexion= new conectar();
       
        $conexion=$oconexion->conexion();
        $sql = "SELECT * from pedido ";
      }
      function existeproducto($id,$id_pedido){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql="SELECT * FROM producto WHERE id_producto=$id and id_pedido=$id_pedido";
        
        $result=mysqli_query($conexion,$sql);
        echo $sql;
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
      }

}
