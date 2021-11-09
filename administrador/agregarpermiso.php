<?php
require '../head.php';
require_once '../conexiones/conexion.php';

require_once '../conexiones/permiso.php';




?>


<div class="container">
    <h1>Nuevo permiso</h1>



    <div class="row">

        <?php
        $opermiso = new permiso();
        $result = $opermiso->listaPaginas($_GET['id_rol']);

        ?>

        <form action="../controller/permisocontroller.php" method="GET">

            <div class="col-sm-3">
                <input type="text" name="id_rol" value="<?php echo $_GET['id_rol']; ?>" style="display:none;">

                <select class="form-select" name="id_pagina" id="">
                    <option value="" disabled selected>Selecciones una opción</option>
                    <?php foreach ($result as $registro) {
                    ?>
                        <option value="<?php echo $registro['id_pagina']; ?>"><?php echo $registro['nombre_pagina']; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>


            <br>
            <button type="submit" name="funcion" value="nuevopermiso" class="btn btn-primary">
                Actualizar informacion
            </button>
        
            <a href="../administrador/permiso.php?id_rol=<?php echo $_GET['id_rol'] ?>" class="btn btn-outline-info"><i class="fas fa-undo-alt"></i>volver</a>
            </form>






    </div>
    </body>

    </html>