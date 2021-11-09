<?php
 require_once '../conexiones/producto.php';
 require_once '../conexiones/conexion.php';
 $oProducto=new producto();
 $oProducto->nombreProducto=$_POST['nombreProducto'];
 $oProducto->detalleproducto=$_POST['detalleproducto'];
 $oProducto->descripcion=$_POST['descripcion'];
 $oProducto->peso=$_POST['peso'];
//  $oProducto->precio=$_POST['precio'];
echo $_POST['precio'];
 $oProducto->precio=str_replace(".","",$_POST['precio']);
 $archivos=$_FILES["archivos"]['tmp_name'];
 $oProducto->tipopeso=$_POST['tipopeso'];
 $result=$oProducto->nuevoproducto();
 subirArchivos($result,$archivos);
 if($result){
    header("Location:../productos/productos.php?titulo_mensaje=Excelente&cuerpo_mensaje=Se+agrego+el+producto+correctamente&tipo_mensaje=success");
}else{
    echo "error al registrar los productos";
}
function subirArchivos($id,$archivos)
    {
        $nombre=0;
        foreach ($archivos as $key => $tmp_name) {
            if ($_FILES["archivos"]["name"][$key]) {
                $filename = $_FILES["archivos"]["name"][$key];
                $source = $_FILES["archivos"]["tmp_name"][$key];
                $directorio = $_SERVER['DOCUMENT_ROOT'] . "/archivos/imagenes/$id";
                echo $directorio;

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0, true) or die("no se puede crear el directorio");
                }
                $dir = opendir($directorio);
                $target_path = $directorio . '/' . $nombre.".jpg";
              
                // echo $filename;
                if (move_uploaded_file($source, $target_path)) {
                    require_once '../conexiones/imagenes.php';
                    $imagenes=new imagenes();
                    $imagenes->idproducto=$id;
                    $imagenes->archivos="/archivos/imagenes/$id/$nombre.jpg";
                   $imagenes->guardarimagen();
                } else {
                    echo "Ha ocurrido un error, por favor intentalo nuevamente.<br>";
                }  $nombre+=1;
                closedir($dir);
            }
        }
    }
 
?>
