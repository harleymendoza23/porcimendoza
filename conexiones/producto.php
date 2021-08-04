<?php

require_once 'conexion.php';

class producto
{
    //para utilizar las conexiones del archivo  conexion.popover-header

   


    public $id = 0;
    public $nombreProducto = "";
    public $detalleproducto = "";
    public $peso = "";
    public $precio = "";
  
    public $tipopeso = "";

    

    function nuevoproducto()
    {
        
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "INSERT INTO inclusion_productos (nombreProducto,detalleproducto,peso,precio,tipopeso,eliminado) 
        VALUES ('$this->nombreProducto','$this->detalleproducto',$this->peso,$this->precio,'$this->tipopeso',false)"; 
        
        $result = mysqli_query($conexion, $sql);
        
       $sql= "SELECT (LAST_INSERT_ID()) as id from inclusion_productos";
        $result = mysqli_query($conexion, $sql);
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($result[0]);
        foreach ($result as $registro){
            // print_r($registro);
            $id= $registro['id'];
            return $id;
        }
        return $result[0];
        
       
    }


    function listarproducto()
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM inclusion_productos  WHERE eliminado=false";
        //serive para ejecutar la funcion
        $result=mysqli_query($conexion,$sql);
        //organiza el resultado de la consola y lo retorno
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $result;
    }


    function consultarproducto()
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM inclusion_productos ip WHERE ip.id=$this->id and ip.eliminado=false";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {

            //se consultan en los parametros
            $this->id = $registro['id'];
            // $this->archivo = $registro['archivos'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->detalleproducto = $registro['detalleproducto'];
            $this->peso = $registro['peso'];
            $this->precio = $registro['precio'];
            $this->tipopeso = $registro['tipopeso'];
        }
    }

    function actualizarproducto(){
        //se instancia el objeto conectar
        $oconexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oconexion->conexion();
        //consulta para actualizar el registro
        $sql="UPDATE inclusion_productos SET nombreProducto='$this->nombreProducto',
        detalleproducto='$this->detalleproducto',
        peso='$this->peso',
        tipopeso='$this->tipopeso',
        precio='$this->precio',
        WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }

    function eliminarproducto(){
        //se instancia el objeto conectar
        $oconexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oconexion->conexion();
        //consulta para eliminar el registro
        $sql="UPDATE inclusion_productos SET eliminado=1 WHERE id=$this->id";
        // $sql="DELETE FROM estudiante WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
      }
}
?>