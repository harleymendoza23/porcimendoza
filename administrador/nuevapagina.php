<?php
require '../head.php';
?>
<?php
require_once '../conexiones/pagina.php';
$oPagina = new pagina();
$oPagina->id_modulo = $_GET['id_modulo'];
$consulta = $oPagina->ListarPagina();
?>
<html>

<body style="background-color:lemonchiffon;">
    <div class="container">
        <div class="row">
            <form action="../controller/usuarioController.php" method="GET" id="color">
                <input type="text" name="id_modulo" value="<?php echo $oPagina->id_modulo; ?>" style="display:none;">
                <div class="col col-xl-4 col-md-8 col-12">
                    <h4>Nombre página</h4>
                    <input type="text" name="nombre_pagina">
                </div>
                <div class="col col-xl-4 col-md-8 col-12">
                    <h4>Enlace de la página</h4>
                    <input type="text" name="enlace">
                </div>
                <div class="col col-xl-4 col-md-8 col-12">
                    <h5 style="text-align:center">¿Requiere inicio de sessión?</h5>
                    <select class="form-select" name="inicio_session" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option value='1'>Verdadero</option>
                        <option value='0'>Falso</option>
                    </select>
                </div>
                <div class="col col-xl-4 col-md-8 col-12">
                    <h5 style="text-align:center">¿Requiere permiso para esta pagina?</h5>
                    <select class="form-select" name="menu" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option value='1'>Si</option>
                        <option value='0'>No</option>
                    </select>
                </div>
                <div class="col col-xl-4 col-md-8 col-12"><br>
                    <!-- <input type="submit" class="btn btn-info" value="Guardar" onclick="datos()"> -->
                    <button type="submit" class="btn btn-success" name="funcion" value="nuevapagina"><i class="far fa-save"></i> Guardar</button>
                </div><br>
                <a href="/porcimendoza/administrador/detallemodulo.php?id_modulo=<?php echo $_GET['id_modulo']; ?>" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                <a href="../index.php" class="btn btn-outline-info">Página principal</a>
            </form>
        </div>
    </div>
</body>

</html>