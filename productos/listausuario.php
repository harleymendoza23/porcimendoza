<?php
require_once '../head.php';
require_once '../conexiones/usuario.php';
require_once '../conexiones/conexion.php';
?>
<div class="table responsive "></div>
<table class="table align-middle">
    <thead class="table-dark">
        <tr>
            <th>
                    <h2>usuario</h2>
            </th>
            <th>
                <label for="">Busqueda:</label>
                <!-- se crea el imput para la busqueda de usuarios  -->
                <input type="text" name="busqueda_usuario" id="busqueda_usuario" onkeyup="buscaruaurio()">
                <!-- onkeyup="buscaruaurio() se utiliza para que se ejecute cuando ele usuario oprime una tecla -->
            </th>
        </tr>
    </thead>
    <tr>
        <th>nombre</th>
        <th>correo electronico</th>
        <th><a class="btn btn-info" href="../usuario/agregar_usuario.php"><i class="fas fa-plus"></i> nuevo</a> </th>
    </tr>
    </thead>
    <!-- se crea la tabla la cual se va a crear en javascrip  -->
    <tbody id="busqueda">
       
    </tbody>
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
<!-- se importa el javascrip -->
<script src="../assets/busqueda.js">
    
</script>