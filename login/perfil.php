<?php
require_once '../conexiones/usuario.php';
require_once '../conexiones/conexion.php';
require_once '../head.php';
$oUser = new usuario();
$id_usuario = $_SESSION['id_usuario'];
$registro = $oUser->consultarusuario($id_usuario);
$nombre_usuario = $oUser->getNombreUser();
$correo = $oUser->getCorreoUser();
$contrasena = $oUser->getcontrasena();
$direccion = $oUser->getdireccion();
$usuario = $oUser->getusuario();
?>


<div class="container">

    <!-- Breadcrumb -->


    <div class="row gutters-sm">
        <div class="col-md-4 d-none d-md-block">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                        <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>Información personal
                        </a>
                        <!-- <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>Configuraciones de la cuenta
                        </a> -->
                        <!-- <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>Seguridad
                        </a> -->


                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg></a>
                        </li>
                        <li class="nav-item">
                            <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <input type="text" name="id_usuario" value="<?php echo $_GET['id_usuario']; ?>" style="display: none;">
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="profile">
                        <h6>SU INFORMACIÓN DE PERFIL</h6>
                        <hr>
                        <form action="../controller/usuarioController.php" method="get">
                            <input type="text" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>" style="display: none;">

                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" name="nombre_usuario" required minlength="3" aria-describedby="fullNameHelp" placeholder="Cambia tu nombre" value="<?php echo $nombre_usuario; ?>">
                                <small id="fullNameHelp" class="form-text text-muted">Su nombre puede aparecer por aquí donde se le menciona. Puede cambiarlo o eliminarlo en cualquier momento.</small>
                            </div>

                            <div class="form-group">
                                <label for="bio">Correo electronico</label>
                                <input type="text" class="form-control" name="correo" aria-describedby="fullNameHelp" value="<?php echo $correo; ?>">

                            </div>

                            <div class="form-group">
                                <label for="location">Direccion </label>
                                <input type="text" class="form-control" name="direccion" placeholder="Ingresa tu direccion" value="<?php echo $direccion; ?>">
                            </div>
                            <div class="form-group small text-muted">
                                Todos los campos de esta página son opcionales y se pueden eliminar en cualquier momento, y al completarlos, nos da su consentimiento para compartir estos datos dondequiera que aparezca su perfil de usuario.
                            </div>

                            <button type="submit" name="funcion" value="actualizar_usuario" class="btn btn-primary">
                               Actualizar informacion
                            </button>
                            <button type="reset" class="btn btn-light">Restablecer cambios</button>
                        </form>
                    </div>
                    <!-- <div class="tab-pane" id="account">
                        <h6>CONFIGURACIONES DE LA CUENTA</h6>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Ingrese tu usuario" value="<?php echo $nombre_usuario; ?>">
                                <small id="usernameHelp" class="form-text text-muted">Después de cambiar su nombre de usuario, su antiguo nombre de usuario estará disponible para que cualquier otra persona lo reclame.</small>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="d-block text-danger">Borrar cuenta</label>
                                <p class="text-muted font-size-sm">Una vez que elimine su cuenta, no hay vuelta atrás. Por favor, tenga la certeza.</p>
                            </div>
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $id_usuario = $_SESSION['id_usuario']; ?>);"><i class="fas fa-trash"></i> eliminar</a>
                            <button class="btn btn-danger" type="button">Borrar cuenta</button>
                        </form>
                    </div> -->
                    <!-- <div class="tab-pane" id="security">
                        <h6>CONFIGURACIONES DE SEGURIDAD</h6>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label class="d-block">Cambiar la contraseña</label>
                                <input type="text" class="form-control" placeholder="Ingrese su contraseña anterior">
                                <input type="text" class="form-control mt-1" placeholder="Nueva contraseña">
                                <input type="text" class="form-control mt-1" placeholder="Confirmar nueva contraseña">
                            </div>
                        </form>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label class="d-block">Autenticación de dos factores</label>
                                <button class="btn btn-info" type="button">Validar contaseña</button>

                            </div>
                        </form>

                    </div> -->


                </div>
            </div>
        </div>
    </div>
</div>

</div>
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
                <form action="../productos/eliminarusuario.php" method="get">
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