<?php

require_once 'conexion.php';

class usuario
{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacerá el id del usuario de la base datos
    private $id_usuario = "";
    private $usuario = "";
    private $correo = "";
    private $nombre = "";
    private $direccion="";
    private $contrasena = "";
    private $id_rol="";

    //para obtener la información de Id
    public function getIdUser()
    {
        return $this->id_usuario;
    }
    public function getusuario()
    {
        return $this->usuario;
    }
    public function getNombreUser()
    {
        return $this->nombre_usuario;
    }
    public function getCorreoUser()
    {
        return $this->correo;
    }
    public function getcontrasena(){
        return $this->contrasena;
    }
    public function setIdUser($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function setcorreo($correo){
        $this->correo=$correo;
    }
    public function setdireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setNombreUser($nombre_usuario)
    {
        $this->nombre = $nombre_usuario;
    }
    public function getdireccion()
    {
       return $this->direccion;
    }
    public function getid_rol(){
        return $this->id_rol;
    }
    public function setid_rol($id_rol){
        $this->id_rol=$id_rol;
    }
    //función que gestiona el registro de los usuario
    //las variables dentro de los parentesis son parametros que se requieren dar al momento de llamar la función
    public function registroUsuario($nombre_usuario, $correo, $contrasena)
    {
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5 = md5($contrasena);
        $oConexion = new conectar();
        //se genera la conexión con la base de datos
        $Conexion = $oConexion->conexion();
        //se crea la sentencia sql para registrar el usuario
        $sql = "INSERT INTO usuario (nombre_usuario,correo,contrasena,resetContrasena,eliminado)
        VALUES ('$nombre_usuario','$correo','$contrasenaMd5',0,false)";
        //ejecuta la sentencia
        echo $sql;
        $result = mysqli_query($Conexion, $sql);
        //
        return $result;
    }
    //se verifica si ya hay un registro con el correo electronico 
    public function consultarCorreoElectronico($correo)
    {
        //generar la conexión
        $oConexion = new conectar();
        $conexion = $oConexion->conexion();
        $sql = "SELECT * FROM usuario WHERE correo='$correo'";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return count($result);
    }
    //función para consultar si el correo electronico y la contraseña son correctos
    //para buscar el registro
    public function iniciarSesion($correo, $contrasena)
    {
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5 = md5($contrasena);
        echo $contrasenaMd5;
        //generar la conexión
        $oConexion = new conectar();
        //establece conexión con la base datos
        $conexion = $oConexion->conexion();
        //sentencia para verificar correo y contraseña del usiario
        $sql = "SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasenaMd5'";
        //se ejecuta la sentencia
        $result = mysqli_query($conexion, $sql);
        //se almacena la consulta en un arreglo asociativo
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {
            $this->id_usuario = $registro['id_usuario'];
            $this->nombre_nombre = $registro['nombre_usuario'];
        }
        return count($result);
    }
    function listarusuario($filtrousuario)
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        if ($filtrousuario != "") {
            $sql = "SELECT * FROM usuario WHERE eliminado=false and (nombre_usuario like '%$filtrousuario%' or correo like '%$filtrousuario%')";
        } else {
            $sql = "SELECT * FROM usuario WHERE eliminado=false";
        }
        //serive para ejecutar la funcion
        $result = mysqli_query($conexion, $sql);
        //organiza el resultado de la consola y lo retorno
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }



    function eliminarusuario($id_usuario)
    {
        //se recibe entre los parentecis la variable iduser

        $oconexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oconexion->conexion();
        //consulta para eliminar el registro
        $sql = "UPDATE usuario SET eliminado=1 WHERE id_usuario=$id_usuario";

        $result = mysqli_query($conexion, $sql);
        return $result;
    }
    function actualizarUsuarioDeRol($id_rol, $id_usuario){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();

        $sql="UPDATE usuario SET id_rol=$id_rol WHERE id_usuario=$id_usuario";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
    }
    function consultarusuario($id_usuario)
    {
        $oconexion = new conectar();
        $conexion = $oconexion->conexion();
        $sql = "SELECT * FROM usuario WHERE id_usuario=$id_usuario";
        $result = mysqli_query($conexion, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $registro) {

            //se consultan en los parametros
            $this->id_usuario = $registro['id_usuario'];
            $this->nombre_usuario = $registro['nombre_usuario'];
            $this->correo = $registro['correo'];
            $this->contrasena=$registro['contrasena'];
            $this->direccion=$registro['direccion'];
            $this->usuario=$registro['usuario'];

        }
    }
    function actualizarusuario($id_usuario)
    {
        $oconexion = new conectar();
        //se establece conexión con la base de datos
        $conexion = $oconexion->conexion();
        //consulta para actualizar el registro
        $sql = "UPDATE usuario SET nombre_usuario='$this->nombre_usuario',
           correo='$this->correo', direccion='$this->direccion'
           WHERE id_usuario=$id_usuario";
        //se ejecuta la consulta
        echo $sql;
        $result = mysqli_query($conexion, $sql);
        return $result;
    }
    function listarusuarioporrol($id_rol){
        $oconexion=new conectar();
        $conexion=$oconexion->conexion();
        $sql = "SELECT * FROM usuario WHERE id_rol=$id_rol and  eliminado=false";
        //serive para ejecutar la funcion
        $result=mysqli_query($conexion,$sql);
        //organiza el resultado de la consola y lo retorno
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }
    function mostrarUsuariosPorIdDiferente($id_rol){
        //Instancia clase conectar
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
        
        //esta consulta nos permite conocer a los usuarios que no estan registrados en ese tol
        $sql="SELECT * FROM usuario WHERE id_rol IS NULL OR id_rol!=$id_rol AND eliminado=false";
            
        //se ejecuta la consulta en la base de datos
        $result=mysqli_query($conexion,$sql);
        //organiza resultado de la consulta y lo retorna
        return mysqli_fetch_all($result, MYSQLI_ASSOC); 
        }

   
}
