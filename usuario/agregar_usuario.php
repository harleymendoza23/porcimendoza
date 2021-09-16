<?php
require '../head.php';
?>
<!DOCTYPE html>
<html lang="es">

<body class="hold-transition login-page">
    <div class="container justify-content-center ">
        <div class="login-box ">
            <!-- display: flex;
            justify-content: center; -->

            <div class="row ">
                <form action="../controller/usuarioController.php" method="post">


                    <div class="col-md-12">
                        <label for="">Nombre usuario</label>
                        <input type="text" class="form-control" name="nombre_usuario" placeholder="nombre" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Correo electronico</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo electronico" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Confirmar contraseña</label>
                        <input type="password" name="confirmContrasena" class="form-control" placeholder="Confirmación Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-block" name="funcion" value="registrar">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>