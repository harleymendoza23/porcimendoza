<?php
require '../head.php';
?>
<html>
<table class="table">
    <thead>
        <tr>
            <th>
                <center>
                    <h2>MODULO</h2>
                </center>
            </th>
        </tr>
    </thead>
    <tr>
        <th>nombre modulo</th>
        <th><a href="nuevo_modulo.php"><i class="fas fa-plus"></i> nuevo</a></th>
    </tr>
    </thead>
    <body>
        <?php
        require_once '../conexiones/modulo.php';
        require_once '../conexiones/conexion.php';
        $oconexion = new conectar();
        $oconexion = $oconexion->conexion();
        $omodulo = new modulo();
        $consulta = $omodulo->listarmodulo();
        foreach ($consulta as $registro) {

        ?>
            <!-- en este codigo se trabaja html con php -->
            <tr class="table-primary">
                <td><?php echo $registro['nombre_modulo']; ?> </td>
                <th>
                    <a href="/porcimendoza/administrador/formularioeditarmodulo.php?id_modulo=<?php echo $registro['id_modulo']; ?>" class="btn btn-warning" ><i class="fas fa-edit"></i> Editar</a>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id_modulo']; ?>);"><i class="fas fa-trash"></i> Eliminar</a>
                    <a href="/porcimendoza/administrador/detallemodulo.php?id_modulo=<?php echo $registro['id_modulo']; ?>" class="btn btn-light"><i class="fas fa-address-card"></i> Detalle</a>
                </th>
            </tr>
        <?php
        }
        ?>
    </body>
</table>

</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">!!ELIMINAR!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                esta seguro que quiere eliminar el modulo
            </div>
            <div class="modal-footer">
                <form action="eliminar_modulo.php" method="get">
                    <input type="" name="id_modulo" id="eliminar" style="display:none;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-danger">eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function eliminar(id_modulo) {
        document.getElementById('eliminar').value = id_modulo;
    }
</script>