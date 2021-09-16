<?php


require_once '../conexiones/usuario.php';
require_once '../conexiones/conexion.php';
require_once '../head.php';
$oUser = new usuario();
$id_usuario=$_GET['id_usuario'];
$registro = $oUser->consultarusuario($id_usuario);
$nombre_usuario=$oUser->getNombreUser();
$correo=$oUser->getCorreoUser();

?>
<!DOCTYPE html>
<html lang="es">


<body>
    <form action="editar_usuario.php" method="get">
    <input type="text" name="id_usuario" value="<?php echo $_GET['id_usuario']; ?>" style="display: none;">
        <div class="container">
            <div class="row">

                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">nombre</label>
                    <input class="form-control" type="text" name="nombre_usuario" value="<?php echo $nombre_usuario; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">correo electronico</label>

                    <input  class="form-control" type="email" name="correo"  value="<?php echo $correo; ?>">
                </div>



            </div>
            <br>
            <input type="submit" class="btn btn-success" value="Guardar">
        </div>
    </form>
</body>

</html>