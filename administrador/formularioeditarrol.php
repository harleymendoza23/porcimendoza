<?php

//se hace referencia a los archivos estudiante y conexion
require_once '../conexiones/rol.php';
require_once '../conexiones/conexion.php';
require_once '../head.php';
//se instancia el objeto estudiante
$orol = new rol();
//se recibe el parametro del enlace

$registro = $orol->consultarrol($_GET['id_rol']);

?>
<!DOCTYPE html>
<html lang="es">


<body>
    <form action="../controller/usuarioController.php" method="get">
        <div class="container">
            <div class="row">

                <input type="text" name="id_rol" value="<?php echo $orol->id_rol; ?>" style="display:none;">

                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre del rol</label>
                    <input class="form-control" type="text"  required minlength="5" maxlength="15" name="nombre_rol" value="<?php echo $orol->nombre_rol; ?>">
                </div>
            </div>
            <br>
            <div class="col col-xl-4 col-md-8 col-12"><br>
                <!-- <input type="submit" class="btn btn-info" value="Guardar" onclick="datos()"> -->
                <button type="submit" class="btn btn-success" name="funcion" value="editarrol"><i class="far fa-save"></i> Guardar</button>
            </div><br>
            <a href="/porcimendoza/administrador/listarrol.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Volver</a>
            <a href="../index.php" class="btn btn-outline-info">Página principal</a>
        </div>
    </form>
</body>

</html>