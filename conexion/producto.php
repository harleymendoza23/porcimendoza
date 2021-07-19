<?php

require_once '../conexion.php';
class producto
{
    //para utilizar las conexiones del archivo  conexion.popover-header

   


    public $id = 0;
    public $nombreProducto = "";
    public $peso = "";
    public $precio = "";
    public $archivos = "";
    public $tipopeso = "";

    function subirArchivos()
    {
        foreach ($_FILES["archivos"]['tmp_name'] as $key => $tmp_name) {
            if ($_FILES["archivos"]["name"][$key]) {
                $filename = $_FILES["archivos"]["name"][$key];
                $source = $_FILES["archivos"]["tmp_name"][$key];
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/archivos/imagenes/';
                echo $directorio;

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0, true) or die("no se puede crear el directorio");
                }
                $dir = opendir($directorio);
                $target_path = $directorio . '/' . $filename;

                if (move_uploaded_file($source, $target_path)) {
                    echo "el archivo $filename se ha almacenado de forma exitosa.<br>";
                } else {
                    echo "Ha ocurrido un error, por favor intentalo nuevamente.<br>";
                }
                closedir($dir);
            }
        }
    }

    function nuevoproducto()
    {
        
        $oconxion = new conectar();
        $conexion = $oconxion->conexion();
        $sql = "INSERT INTO inclusion_productos (nombreProducto,peso,precio,tipopeso,eliminado) 
        VALUES ('$this->nombreProducto','$this->peso','$this->precio','$this->tipopeso',false)";
        $result = mysqli_query($conexion, $sql);
        return $result;
        $this->subirArchivos();
    }


    function listarproducto()
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM inclusion_productos ip WHERE eliminado=false";
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
            $this->archivo = $registro['archivo'];
            $this->nombreProducto = $registro['nombreProducto'];
            $this->peso = $registro['peso'];
            $this->precio = $registro['precio'];
            $this->tipopeso = $registro['tipopeso'];
        }
    }
}
