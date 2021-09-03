<?php

require_once 'conexion.php';

class usuario
{
    //el modificador private no permite acceder a los atributos fuera de la clase
    //atributos del modelo usuario
    //$idUser almacerá el id del usuario de la base datos
    private $id="";
    private $usuario="";
    private $correo="";
    private $nombre="";
    private $contrasena="";

    //para obtener la información de IdUser
    public function getIdUser(){
        return $this->id;
    }
    public function getNombreUser(){
        return $this->nombre;
    }
    public function setIdUser($id){
        $this->idr=$id;
    }
    public function setNombreUser($nombre){
        $this->nombre=$nombre;
    }
   
    //función que gestiona el registro de los usuario
    //las variables dentro de los parentesis son parametros que se requieren dar al momento de llamar la función
    public function registroUsuario($nombre,$correo,$contrasena){
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5=md5($contrasena);
        $oConexion=new conectar();
        //se genera la conexión con la base de datos
        $Conexion=$oConexion->conexion();
        //se crea la sentencia sql para registrar el usuario
        $sql="INSERT INTO usuario (nombre,correo,contrasena,resetContrasena,eliminado)
        VALUES ('$nombre','$correo','$contrasenaMd5',0,false)";
        //ejecuta la sentencia
        $result=mysqli_query($Conexion,$sql);
        //
        return $result;
    }
    //se verifica si ya hay un registro con el correo electronico 
    public function consultarCorreoElectronico($correo){
        //generar la conexión
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();
        $sql="SELECT * FROM usuario WHERE correo='$correo'";
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return count($result);

    }
       //función para consultar si el correo electronico y la contraseña son correctos
       //para buscar el registro
       public function iniciarSesion($correo,$contrasena){
        //función para encriptar la contraseña utilizando el metodo md5
        $contrasenaMd5=md5($contrasena);
        echo $contrasenaMd5;
        //generar la conexión
        $oConexion=new conectar();
        //establece conexión con la base datos
        $conexion=$oConexion->conexion();
        //sentencia para verificar correo y contraseña del usiario
        $sql="SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasenaMd5'";
        //se ejecuta la sentencia
        $result=mysqli_query($conexion,$sql);
        //se almacena la consulta en un arreglo asociativo
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($result as $registro){
            $this->id=$registro['id'];
            $this->nombre=$registro['nombre'];
        }
        return count($result);

    }
    function listarusuario(){
        $oconexion=new conectar();
        $conexion=$oconexion->conexion();
        $sql = "SELECT * FROM usuario WHERE eliminado=false";
        //serive para ejecutar la funcion
        $result=mysqli_query($conexion,$sql);
        //organiza el resultado de la consola y lo retorno
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

   
   
    function eliminarusuario(){
        //se instancia el objeto conectar
        $oconexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oconexion->conexion();
        //consulta para eliminar el registro
        $sql="UPDATE usuario SET eliminado=1 WHERE id=$this->id";
        // $sql="DELETE FROM estudiante WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
      }
   

}
