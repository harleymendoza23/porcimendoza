<?php
require_once '../head.php';
?>

<!DOCTYPE html>
<html lang="es">

<body>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>porcimendoza</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  </head>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">INICIO DE SESSION</h3>
          </div>
          <form id="formulario" action="../controller/usuarioController.php" method="POST">
            <input type="text"  name="funcion" value="iniciarSesion" style="display:none">
            <div class="col-md-4 position-relative">
              <label for="validationTooltipUsername" class="form-label">Correo electronico</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                <input type="email" name="correo" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                <div class="invalid-tooltip">
                  Elija un nombre de usuario único y válido.
                </div>
              </div>
            </div>
   
            <div class="col-md-4 position-relative">
              <label for="validationTooltip03" class="form-label">contraseña</label>
              <div class="input-group has-validation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              
                <input class="form-control" type="password" autocomplete="FALSE" id="contrasena" name="contrasena" onchange="validarCampo(this);" minlength="5" maxlength="15" required>
              <span id="contrasenaSpan"></span>
              </div>
            </div>
            <br>
            <button type="button" class="btn btn-success" onclick="validarPaginaFinal();"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
            
          </form>
          <p class="mb-1">
            <!-- <a href="recuperarContrasena.php">¿Olvidó su contraseña?</a> -->
          </p>
          <p class="mb-0">
            <a href="registro.php" class="text-center">¿No tiene usuario?</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  function validarPaginaFinal() {
    // evento.preventDefault();
    var valido = true;
    // agregar el id de cada campo de la página para poder validar
    var campos = [ "contrasena"];
    campos.forEach(element => {
      var campo = document.getElementById(element);
      if (!validarCampo(campo))
        valido = false;
    });
    if (valido)
      document.getElementById('formulario').submit();
  }
  function validarCampo(campo) {
  var span = document.getElementById(campo.id + "Span");
  //console.log(campo.id + "span");
  var valido = false;
  // agregar en el switch un caso por cada tipo de dato y llamar la función de validación
  switch (campo.type) {
   
   
  
    case "password":
      valido = validarPassword(campo, span);
      break;
 
  }
  return valido;
}
//crear una función por cada tipo de dato, ya que cada tipo tiene sus validaciones correspondientes



function validarPassword(campo, span) {
  if (campo.required && campo.value == "") {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, Complete el campo vacio";
    return false;
  }
  if (campo.value.length < campo.minLength) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Debe tener un minimo de " + campo.minLength + " caracteres";
    return false;
  }
  var campoV = campo.value;
  var espacios = false;
  var cont = 0;
  while (!espacios && (cont < campoV.length)) {
    if (campoV.charAt(cont) == " ")
      espacios = true;
    cont++;
  }
  if (espacios) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Por favor, La contraseña no debe tener espacios";
    return false;
  }
  var mediumRegex = /^(?=.\d)(?=.[!@#$%^&])(?=.[a-z])(?=.*[A-Z]).{8,}$/;
  if (mediumRegex.test(campo.value)) {
    $(campo).removeClass('is-valid');
    $(campo).addClass('is-invalid');
    span.style = "color:red; font-size: 10pt";
    span.innerHTML = "Debe tener 1 letra mayuscula, 1 letra minuscula, 1 numero y 1 caracter especial";
    return false;
  }


  $(campo).removeClass('is-invalid');
  $(campo).addClass('is-valid');
  span.style = "color:green; font-size: 10pt";
  span.innerHTML = "Valor correcto";
  return true;
}
</script>
