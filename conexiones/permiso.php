<?php

require_once 'conexion.php';

class permiso
{
  public $id_permiso="";
  public $id_rol = "";
  public $id_modulo = "";
  public $id_pagina = "";
  public $url = "";


  public function verificarpermisourl()
  {
    $oConexion = new conectar();
    //Establece conexion con la base de datos.
    $conexion = $oConexion->conexion();
    $sql = "SELECT * FROM permiso per INNER JOIN pagina pag on per.id_pagina=pag.id
        WHERE per.id_rol=$this->id_rol AND pag.url='$this->url'";
    $result = mysqli_query($conexion, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
  }

  public function listaPaginasConPermiso($id_rol)
  {
    $oConexion = new conectar();
    //Establece conexion con la base de datos.
    $conexion = $oConexion->conexion();

    $sql = "SELECT pag.nombre_pagina,per.id_permiso,(SELECT m.nombre_modulo FROM modulo m where m.id_modulo=pag.id_modulo) as nombre_modulo FROM permiso per inner JOIN  pagina pag ON per.id_pagina=pag.id_pagina WHERE per.id_rol=$id_rol and per.eliminado=false";
    $result = mysqli_query($conexion, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  function eliminarpermiso()
  {
    //se instancia el objeto conectar
    $oconexion = new conectar();
    //se establece conexión con la base de datos
    $conexion = $oconexion->conexion();
    //consulta para eliminar el registro
    $sql = "UPDATE permiso SET eliminado=1 WHERE id_permiso=$this->id_permiso";
    // $sql="DELETE FROM estudiante WHERE id=$this->id";
    //se ejecuta la consulta
    $result = mysqli_query($conexion, $sql);
    return $result;
  }

  function listaPaginas($id_rol)
  {
    $oConexion = new conectar();
    $conexion = $oConexion->conexion();
    $sql = "SELECT * FROM pagina ";

    $result = mysqli_query($conexion, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $result;
  }

  function consultarpermiso()
  {
    $oConexion = new conectar();
    $conexion = $oConexion->conexion();
    $sql = "SELECT * FROM permiso WHERE id_pagina=$this->id_pagina AND id_rol=$this->id_rol";
    $result = mysqli_query($conexion, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
  }

  function nuevopermiso()
  {
    $oConexion = new conectar();
    $conexion = $oConexion->conexion();

    $existe = $this->consultarpermiso();
    if (sizeof($existe) != 0) {
      $sql = "UPDATE permiso SET  id_rol=$this->id_rol  WHERE id_pagina=$this->id_pagina  AND  eliminado=false";
    } else {

      $sql = "INSERT INTO permiso (id_pagina,id_rol,id_modulo,eliminado)
            VALUES ($this->id_pagina,$this->id_rol,$this->id_modulo,false)";
    }
    echo $sql;
    $result = mysqli_query($conexion, $sql);
    return $result;
  }

  function permiso_pagina(){
    $oConexion = new conectar();
    $conexion = $oConexion->conexion();
    
    $sql ="SELECT* FROM usuario us INNER JOIN permiso per on us.id_rol=per.id_rol WHERE us.id_usuario=$this->id_usuario AND per.id_pagina=$this->id_pagina";
    $result = mysqli_query($conexion, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach($result as $registro){
      $this->id_pagina=$registro['id_pagina'];
      $this->id_usuario=$registro['id_usuario'];
      $this->id_permiso=$registro['id_permiso'];
    }
  }
  function verificar_menu(){
    $oConexion = new conectar();
    $conexion = $oConexion->conexion();
    $sql ="SELECT * FROM pagina pa INNER JOIN permiso per on pa.id_pagina=per.id_pagina INNER JOIN usuario us on per.id_rol=us.id_rol WHERE pa.menu=true and us.id_usuario=$this->id_usuario and pa.eliminado=false";
    //echo $sql;
    $result = mysqli_query($conexion, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;

  }

}
