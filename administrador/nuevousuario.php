<?php 
require '../head.php';
require_once '../conexiones/usuario.php';


$id_rol=$_GET['id_rol'];

$ousuario=new usuario();
$listarDeUsuarioDiferente=$ousuario->mostrarUsuariosPorIdDiferente($id_rol);

?>

<html>
<head>
<title>Nuevo Rol</title>
</head>

<body>
<div class="container">

<H1>NUEVO USUARIO</H1>
<form action="../controller/usuarioController.php" method="GET">
            <h3>Usuarios: </h3>
            <input name="id_rol" value="<?php echo $id_rol; ?>" style="display:none">
            <select class="form-select" name="id_usuario" id="" required>
            <option value="" disabled selected>Selecciones una opción</option>
            <?php foreach($listarDeUsuarioDiferente as $registro){
            ?>
            <option value="<?php echo $registro['id_usuario']; ?>"><?php echo $registro['nombre_usuario']; ?></option>
            <?php
            }
            ?>
            </select>
            <br>
            <button type="submit" class="btn btn-success" name="funcion"  value="registrarUsuarioEnRol">Guardar</button>
            <a href="detallerol.php?id_rol=<?php echo $id_rol; ?>" class="btn btn-dark"> <i class="fas fa-arrow-circle-left"></i> Atras</a>
        </form>
</div>
</body>
</html>