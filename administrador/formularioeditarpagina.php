<?php
require_once '../head.php';
require_once '../conexiones/pagina.php';
require_once '../conexiones/conexion.php';

$opagina = new pagina();
//se recibe el parametro del enlace
$opagina->id_pagina = $_GET['id_pagina'];
$registro = $opagina->consultarPagina();
?>
<html lang="es">

<body style="background-color: #ffffff;">
    <form action="../controller/usuarioController.php" enctype="multipart/form-data" method="get">
        <input type="text" name="id_pagina" value="<?php echo $_GET['id_pagina']; ?>" style="display: none;">
        <input type="text" name="id_modulo" value="<?php echo $opagina->id_modulo; ?>" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre del modulo</label>
                    <input class="form-control" required minlength="5" maxlength="20" type="text" name="nombre_pagina" value="<?php echo $opagina->nombre_pagina; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Enlace de la página</label>
                    <input class="form-control" required minlength="5"  type="text" name="enlace" value="<?php echo $opagina->enlace; ?>">
                </div>
            </div>
        </div>
        <br>
        <div class="col col-xl-3 col-md-6 col-12">
            <button type="submit" class="btn btn-success" name="funcion" value="editarpagina">Guardar</button>
            <a href="detallemodulo.php?id_modulo=<?php echo $opagina->id_modulo;?>" class="btn btn-outline-info">volver</a>
            <a href="../index.php" class="btn btn-outline-info">pagina principal</a>
        </div>
    </form>
</body>

</html>