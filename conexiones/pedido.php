<?php
require_once '../conexiones/conexion.php';
class pedido
{
    public $id_pedido = 0;
    public $id_usuario = "";
    public $estado_pedido = 1;
    public $id_session = "";
    public $total = "";
    public $tipo_pago = "";
    public $id_factura = "";

    function crear_pedido()
    {
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql ="INSERT INTO pedido (id_usuario,estado_pedido,id_session,total,tipo_pago,id_factura) 
        VALUES ($this->id_usuario,$this->estado_pedido,null, $this->total,'$this->tipo_pago',$this->id_factura)"; 
        
        $result = mysqli_query($conexion, $sql);
     //echo $sql;
       $sql= "SELECT (LAST_INSERT_ID()) as id_pedido from pedido";
        $result = mysqli_query($conexion, $sql);
       // echo $sql;
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        foreach ($result as $registro){
            $this->id_pedido= $registro['id_pedido'];
           
        }
        return $this->id_pedido;
    }

    function consultar_pedido(){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM pedido pe WHERE pe.id_pedido=$this->id_pedido";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->id_pedido = $registro['id_pedido'];
            $this->id_usuario = $registro['id_usuario'];
            $this->estado_pedido = $registro['estado_pedido'];
            $this->total = $registro['total'];
            $this->tipo_pago = $registro['tipo_pago'];
            $this->id_factura = $registro['id_factura'];
        }
    }
    function actualizarvalortotal($id_pedido,$precio){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql="UPDATE pedido set total=total+$precio where id_pedido=$id_pedido";
        $result = mysqli_query($conexion, $sql);
        //echo $sql;
        return $result;
    }
    function generarCodigoPedido()
    {
        return mt_rand(1, 1000000000);
    }
    function consultar_session($id_session){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM pedido pe INNER JOIN producto pr ON pe.id_pedido=pr.id_pedido WHERE pe.id_session='$id_session'";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro){
            return $registro['id_pedido'];
        }
       return ;
    }
    function cunsultarpedido($id_usuario){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion(); 
        $sql="SELECT * FROM pedido WHERE id_usuario=$id_usuario  and estado_pedido=1";
        $result = mysqli_query($conexion, $sql);
     
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
        foreach ($result as $registro){
            $this->id_pedido= $registro['id_pedido'];

        }
        //si la funcion no encontro nada retorna un vacio y si encunetra algo retorna el id del pedido
       
    }
    function consultarExistePedido($id_factura){
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql="SELECT * FROM pedido where id_factura=$id_factura";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    function listar_pedido()
    {
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        $sql = "SELECT * FROM pedido WHERE eliminado=false";
        $result = mysqli_query($conexion, $sql);
        // //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}