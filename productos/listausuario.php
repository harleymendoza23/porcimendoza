<?php
require_once '../head.php';
require_once '../conexiones/usuario.php';
require_once '../conexiones/conexion.php';
?>
<table class="table">
    <thead>
        <tr>
            <th>
                <center>
                    <h2>usuario</h2>
                </center>
            </th>
        </tr>
    </thead>
    <tr>
        <th>nombre</th>
        <th>correo electronico</th>
        <th><a class="btn btn-info" href="../usuario/agregar_usuario.php"><i class="fas fa-plus"></i> nuevo</a> </th>
    </tr>
    </thead>

    <body>
        <div class="container">
            <?php
            $oconexion = new conectar();
            $oconexion = $oconexion->conexion();
            $ousuario = new usuario();
            $consulta = $ousuario->listarusuario();
            foreach ($consulta as $registro) {
            ?>
                <tr class="table-primary">
                    <td><?php echo $registro['nombre_usuario']; ?> </td>
                    <td><?php echo $registro['correo']; ?> </td>
                    <th>
                        <a href="/porcimendoza/usuario/formularioeditarusuario.php?id_usuario=<?php echo $registro['id_usuario']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> editar</a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id_usuario']; ?>);"><i class="fas fa-trash"></i> eliminar</a>
                    </th>
                </tr>
            <?php

            }
            ?>
</table>
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">!!ELIMINAR!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                esta seguro que quiere eliminar el usuario
            </div>
            <div class="modal-footer">
                <form action="eliminarusuario.php" method="get">
                    <input type="text" name="id_usuario" id="eliminar" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-danger">eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function eliminar(id_usuario) {
        document.getElementById('eliminar').value = id_usuario;
    }
</script>