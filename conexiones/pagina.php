<?php

require_once '../conexiones/conexion.php';

class pagina{
    //atributos de la tabla pagina
    public $id_pagina=0;
    public $id_modulo="";
    public $nombre_pagina="";
    public $enlace="";
    public $nombre_modulo="";

    function nuevoPagina(){
    //instancia la clase conectar
    $oConexion=new conectar();
    //se establece la conexión con la base datos
    $conexion=$oConexion->conexion();
    //sentencia SQL para instertar estudiante

    //sentencia de insertar en la tabla pagina
    $sql="INSERT INTO pagina (id_modulo,nombre_pagina,enlace,eliminado)
    VALUES ($this->id_modulo,'$this->nombre_pagina','$this->enlace',false)";

    //ejecuta la sentencia
    $result=mysqli_query($conexion,$sql);
    return $result;
    }

    function ListarPagina(){
    //se instancia el objeto conectar
    $oConexion=new conectar();
    //se establece conexión con la base datos
    $conexion=$oConexion->conexion();

    //se registra la consulta sql
    $sql="SELECT * FROM pagina WHERE id_modulo=$this->id_modulo AND eliminado=false";
    
    //se ejecuta la consulta en la base de datos
    $result=mysqli_query($conexion,$sql);
    //organiza resultado de la consulta y lo retorna
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function consultarPagina(){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    //consulta para retornar un solo registro
    $sql="SELECT * FROM pagina WHERE id_pagina=$this->id_pagina";
    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
    foreach($result as $registro){ 
        //se registra la consulta en los parametros
        $this->id_pagina=$registro['id_pagina'];
        $this->id_modulo=$registro['id_modulo'];
        $this->nombre_pagina=$registro['nombre_pagina'];
        $this->enlace=$registro['enlace'];
        }
    }

    function actualizarPagina(){
        //se instancia el objeto conectar
        $oConexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oConexion->conexion();
        //consulta para actualizar el registro

        $sql="UPDATE pagina SET nombre_pagina='$this->nombre_pagina',
        enlace='$this->enlace'
        WHERE id_pagina=$this->id_pagina";
        
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        
        return $result;
    }

    function eliminarPagina(){
    //se instancia el objeto conectar
    $oConexion= new conectar();
    //se establece conexión con la base de datos
    $conexion=$oConexion->conexion();
    
    //consulta para eliminar el registro
    $sql="UPDATE pagina SET eliminado=1 WHERE id_pagina=$this->id_pagina";
    // $sql="DELETE FROM estudiante WHERE id=$this->id";
    //se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
    echo $sql;
    return $result;
    }

}

?>