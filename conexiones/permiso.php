<?php

require_once 'conexion.php';

class permiso
{
   
    public $id_rol="";
    public $id_modulo="";
    public $id_pagina="";
    public $url="";


    public function verificarpermisourl(){
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
        $sql="SELECT * FROM permiso per INNER JOIN pagina pag on per.id_pagina=pag.id_permiso
        WHERE per.id_rol=$this->id_rol AND pag.url='$this->url'";
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $result;
        
    }

    public function listaPaginasConPermiso($id_rol){
        $oConexion=new conectar();
        //Establece conexion con la base de datos.
        $conexion=$oConexion->conexion();
        
        $sql="SELECT pag.nombre_pagina,per.id_permiso,(SELECT m.nombre_modulo FROM modulo m where m.id_modulo=pag.id_modulo) as nombre_modulo FROM permiso per inner JOIN  pagina pag ON per.id_pagina=pag.id_pagina WHERE per.id_rol=$id_rol and per.eliminado=false";
        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function eliminarpermiso(){
        //se instancia el objeto conectar
        $oconexion= new conectar();
        //se establece conexión con la base de datos
        $conexion=$oconexion->conexion();
        //consulta para eliminar el registro
        $sql="UPDATE permiso SET eliminado=1 WHERE id=$this->id";
        // $sql="DELETE FROM estudiante WHERE id=$this->id";
        //se ejecuta la consulta
        $result=mysqli_query($conexion,$sql);
        return $result;
      }

      function listaPaginas($id_rol){
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();
        $sql="SELECT * FROM pagina ";
        
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $result;

      }

      function consultarpermiso(){
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();
        $sql="SELECT * FROM permiso WHERE id_pagina=$this->id_pagina AND id_rol=$this->id_rol";
        $result=mysqli_query($conexion,$sql);
        $result=mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

      function nuevopermiso(){
        $oConexion=new conectar();
        $conexion=$oConexion->conexion();

        $existe=$this->consultarpermiso();
        if(sizeof($existe)!=0){
            $sql="UPDATE permiso SET  eliminado=false WHERE id_pagina=$this->id_pagina  AND id_rol=$this->id_rol";
        }else{
            
            $sql="INSERT INTO permiso (id_pagina,id_rol,id_modulo,eliminado)
            VALUES ($this->id_pagina,$this->id_rol,$this->id_modulo,false)";
        }
        echo $sql;
        $result=mysqli_query($conexion,$sql);
        return $result;
      }


}


    ?>