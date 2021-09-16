<?php
require_once '../head.php';
require_once '../conexiones/modulo.php';
require_once '../conexiones/conexion.php';

$omodulo = new modulo();
//se recibe el parametro del enlace
$omodulo->id_modulo = $_GET['id_modulo'];
$registro = $omodulo->consultarmodulo();
?>
<html lang="es">

<body style="background-color: #ffffff;">
    <form action="../controller/usuarioController.php" enctype="multipart/form-data" method="get">
        <input type="text" name="id_modulo" value="<?php echo $_GET['id_modulo']; ?>" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre del modulo</label>
                    <input class="form-control" required minlength="5" maxlength="20" type="text" name="nombre_modulo" value="<?php echo $omodulo->nombre_modulo; ?>">
                </div>
            </div>
        </div>
        <br>
        <div class="col col-xl-3 col-md-6 col-12">
            <button type="submit" class="btn btn-success" name="funcion" value="editarmodulo">Guardar</button>
            <a href="modulo.php" class="btn btn-outline-info">volver</a>
            <a href="../index.php" class="btn btn-outline-info">pagina principal</a>
        </div>
    </form>
</body>

</html>