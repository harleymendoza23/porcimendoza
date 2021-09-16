<?php

require_once '../conexiones/conexion.php';


class rol
{
    public $id_rol = 0;
    public $nombre_rol = "";
    public $nombre = "";
    public $numRegistro = "";
    public $numPagina = "";

    function nuevoRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //Sentencia SQL para insertar nuevo usuario.
        $sql = "INSERT INTO rol (nombre_rol)
    VALUES ('$this->nombre_rol')";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }

    function listar_rol()
    {
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        $sql = "SELECT * FROM rol WHERE eliminado=false";
        $result = mysqli_query($conexion, $sql);
        // //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    // function listarRol($pagina){
    // //Instancia clase conectar
    // $oConexion=new conectar();
    // //Establece conexion con la base de datos.
    // $conexion=$oConexion->conexion();

    // //Buscar numero de registro por filtros
    // $sql = "SELECT count(nombre_rol) as numRegistro FROM rol WHERE eliminado=false;";
    // $result = mysqli_query($conexion, $sql);
    // foreach ($result as $registro) {
    //     $this->numRegistro = $registro['numRegistro'];
    // }
    // //indicamos cuantos elementos vamos a tomar, se le indican los registros que se van a mostrar
    // $inicio = (($pagina - 1) * 10);

    // $sql="SELECT * FROM rol WHERE eliminado=false LIMIT 10 OFFSET $inicio";

    // //se ejecuta la consulta en la base de datos
    // $result=mysqli_query($conexion,$sql);
    // //organiza resultado de la consulta y lo retorna
    // return mysqli_fetch_all($result, MYSQLI_ASSOC);
    // }

    function consultarRol($id_rol)
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        $sql = "SELECT * FROM rol WHERE id_rol=$id_rol";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        //almacena los datos de un solo registro en el objeto rol
        foreach ($result as $registro) {
            $this->id_rol = $registro['id_rol'];
            $this->nombre_rol = $registro['nombre_rol'];
        }
    }

    function actualizarRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();

        //consulta para actualizar el registro
        $sql = "UPDATE rol SET nombre_rol='$this->nombre_rol'
        WHERE id_rol=$this->id_rol";

        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        echo $sql;
        return $result;
    }

    function eliminarRol()
    {
        //Instancia clase conectar
        $oConexion = new conectar();
        //Establece conexion con la base de datos.
        $conexion = $oConexion->conexion();
        //consulta para eliminar el registro
        $sql = "UPDATE rol SET eliminado=1 WHERE id_rol=$this->id_rol";
        // $sql="DELETE FROM estudiante id_rol=$this->id_rol";
        //se ejecuta la consulta
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
}
