<?php
require '../head.php';
require_once '../conexiones/pagina.php';
require_once '../conexiones/conexion.php';
require_once '../conexiones/modulo.php';

$id_modulo = $_GET['id_modulo'];
$omodulo = new modulo();
$omodulo->id_modulo = $_GET['id_modulo'];
$omodulo->consultarmodulo();

?>

<html>

<head>
    <title>Lista Pagina</title>
</head>

<body>

    <div class="container">


        <?php
        require_once '../conexiones/pagina.php';

        $oPagina = new pagina();
        $oPagina->id_modulo = $_GET['id_modulo'];
        $consulta = $oPagina->ListarPagina();
        ?>



        <H1>Pagina</H1>
        <br>

        <div class="row">
            <div class="col">
                <h1>Modulo: </h1>
                <input class="form-control" type="text" value="<?php echo $omodulo->nombre_modulo; ?> " disabled>
            </div>
        </div>

        <br>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre pagina</th>
                    <th>Enlace</th>
                    <th>Requiere inicio de sessión</th>
                    <th>Requiere menu</th>

                    <th><a class="btn btn-info" href="nuevapagina.php?id_modulo=<?php echo $_GET['id_modulo']; ?>"><i class="fas fa-user-plus"></i> Nueva pagina</a></th>
                </tr>
            </thead>

            <tbody>
                <?php

                foreach ($consulta as $registro) {
                ?>
                    <tr>
                        <input type="text" name="id_modulo" value="<?php echo $oPagina->id_modulo; ?>" style="display:none;">

                        <td><?php echo $registro['nombre_pagina']; ?></td>
                        <td><?php echo $registro['enlace']; ?></td>
                        <td><?php if ($registro['inicio_session'] == 1) {
                                echo "Si";
                            } else {
                                echo "No";
                            }
                            ?></td>
                        <td><?php if ($registro['menu'] == 1) {
                                echo "Si";
                            } else {
                                echo "No";
                            } ?></td>
                        <td>
                            <a href="/porcimendoza/administrador/formularioeditarpagina.php?id_pagina=<?php echo $registro['id_pagina']; ?>" class="btn btn-warning"><i class="fas fa-user-edit"></i> Editar</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="eliminar(<?php echo $registro['id_pagina']; ?>, <?php echo $registro['id_modulo']; ?>)"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="/porcimendoza/administrador/modulo.php" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
    </div>
</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">!!ELIMINAR!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                esta seguro que quiere eliminar la pagina
            </div>
            <div class="modal-footer">
                <form action="eliminar_pagina.php" method="get">
                    <input type="" name="id_pagina" id="eliminar" style="display:none;">
                    <input type="" name="id_modulo" id="eliminar_pagina" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-danger">eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function eliminar(id_pagina, id_modulo) {
        document.getElementById('eliminar').value = id_pagina;
        document.getElementById('eliminar_pagina').value = id_modulo;

    }
</script>