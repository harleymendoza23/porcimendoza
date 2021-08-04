<?php
 require_once '../conexion/producto.php';
 require_once '../conexion/conexion.php';
 $oProducto=new producto();
 $oProducto->nombreProducto=$_POST['nombreProducto'];
 $oProducto->detalleproducto=$_POST['detalleproducto'];
 $oProducto->peso=$_POST['peso'];
 $oProducto->precio=$_POST['precio'];
 $archivos=$_FILES["archivos"]['tmp_name'];
 $oProducto->tipopeso=$_POST['tipopeso'];
 $result=$oProducto->nuevoproducto();
 subirArchivos($result,$archivos);
 if($result){
    // header("Location: ../productos/index.php");
}else{
    echo "error al registrar los productos";
}
function subirArchivos($id,$archivos)
    {
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
                $target_path = $directorio . '/' . $filename;

                if (move_uploaded_file($source, $target_path)) {
                    require_once '../conexion/imagenes.php';
                    $imagenes=new imagenes();
                    $imagenes->idproducto=$id;
                    $imagenes->archivos=$target_path;
                   $imagenes->guardarimagen();
                } else {
                    echo "Ha ocurrido un error, por favor intentalo nuevamente.<br>";
                }
                closedir($dir);
            }
        }
    }
 
?>
