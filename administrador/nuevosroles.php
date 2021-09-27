<?php
require '../head.php';
?>




<!DOCTYPE html>
<html lang="en">

<body style="background-color:lemonchiffon;">
    <div class="container" id="img1">

        <div class="row">
            <form action="../controller/usuarioController.php" method="GET">
                <div class="col-sm-3">

                    <h4>Nuevo rol</h4>
                    <input type="text" name="nombre_rol">

                </div>

                <div class="col-sm-3"><br>
                    <!-- <input type="submit" value="ejecutar" onclick="datos()"> -->


                </div><br>
                <div class="col col-xl-4 col-md-8 col-12"><br>
                    <!-- <input type="submit" class="btn btn-info" value="Guardar" onclick="datos()"> -->
                    <button type="submit" class="btn btn-success" name="funcion" value="nuevorol"><i class="far fa-save"></i> Guardar</button>
                </div><br>
                <a href="/PORCIMENDOZA/administrador/listarrol.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                <a href="../index.php" class="btn btn-outline-info">Página principal</a>
            
            </form>
        </div>
    </div>

</body>

</html>