<?php
require_once '../conexiones/conexion.php';
require_once '../head.php';
require_once '../conexiones/rol.php';
require_once '../conexiones/usuario.php';
?>
<?php
$orol = new rol();
//se recibe el parametro del enlace
$registro = $orol->consultarrol($_GET['id_rol']);
?>
<html lang="en">
<div class="card-body table-responsive p-2">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <h2>DETALLE DE ROL</h2>
                </th>
            </tr>
        </thead>
        <tr>
            <th>Nombre del usuario</th>
            <th>Correo electronico</th>
            <!-- estos son los iconos<i class="fas fa-plus"></i> -->
            <th><a href="/porcimendoza/administrador/nuevousuario.php?id_rol=<?php echo $_GET['id_rol']; ?>" class="btn btn-info"><i class="fas fa-search-plus"></i> Agregar usuario</a></th>
            <th><a href="/porcimendoza/administrador/permiso.php?id_rol=<?php echo $_GET['id_rol']; ?>" class="btn btn-info"><i class="fas fa-search-plus"></i> permisos</a></th>
        </tr>
        </thead>

        <body>
            <div class="container">
                <input type="text" name="id_rol" value="<?php echo $orol->id_rol; ?>" style="display:none;">
                <input class="form-control" type="text" name="nombre_rol" value="<?php echo $orol->nombre_rol; ?>" disabled>
                <div class="card-body table-responsive">
                    <table class="table table-sm">
                        <?php
                        $oconexion = new conectar();
                        $oconexion = $oconexion->conexion();
                        $ousuario = new usuario();
                        $consulta = $ousuario->listarusuarioporrol($orol->id_rol);
                        foreach ($consulta as $registro) {
                        ?>
                            <!-- en este codigo se trabaja html con php -->
                            <tr class="table-primary">
                                <td><?php echo $registro['nombre_usuario']; ?> </td>
                                <td><?php echo $registro['correo']; ?> </td>
                                <th>
                                <td><a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id_rol']; ?>);"><i class="fas fa-trash"></i> eliminar</a></td>
                                </th>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div style="text-align: center">
                    <a href="listarrol.php" class="btn btn-outline-info"><i class="fas fa-undo-alt"></i>volver</a>
                </div>
            </div>
        </body>
    </table>
</div>

</html>