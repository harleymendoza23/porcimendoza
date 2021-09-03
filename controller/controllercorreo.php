<?php
$ocorreo= new correo();
$ocorreo->recuperarContrasena("pepito perez","mendozaharley86@gmail.com","123456");
class correo{
    function enviarCrorreo($asunto,$mensaje,$correoDestino){
      
      //archivo base para enviar correo electronico
        //utilizando la función mail
        // $correoDestino="cjsarasty@gmail.com";
        // $asunto="Asunto Correo de prueba";
        // $mensaje="Cuerpo del mensaje del correo prueba";
        $cabecera='MIME-Version: 1.0' . "\r\n";
        $cabecera.='Content-type: text/html; charset=utf-8' . "\r\n";
        $cabecera.="From: info@calichesoftware.com"."\r\n ";
        $cabecera.="Reply-To: info@calichesoftware.com"."\r\n";
        $cabecera.="X-Mailer: PHP/".phpversion();
        $cuerpoMensaje="<!DOCTYPE html>".
        "<html lang='es'>".
        "<head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We' crossorigin='anonymous'>
            <title>porcimendoza</title>
        </head>".
        "<body>
            $mensaje
            <br>
            <br>
            <h4>Atentamente:</h4>
            <p>PORCIMENDOZA S.A</p>
            Logo
            <img src='https://empresas.blogthinkbig.com/wp-content/uploads/2019/11/Imagen3-245003649.jpg?fit=960%2C720' alt='' width='50px' height='50px'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js' integrity='sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj' crossorigin='anonymous'></script>
        </body>".
        "</html>";
        
        $mail=mail($correoDestino,$asunto,$cuerpoMensaje,$cabecera);
        if($mail) echo "Se envió correctamente";
        else echo "error al enviar";
    }
    // cuerpo del correo seria para cuando se envie un crreo distinto
    function recuperarContrasena($nombre,$usuario,$contrasena){
        $asunto= "recuperación de contraseña";
        $mensaje=    "<h3>Apreciado señ@r:   $nombre</h3>".
       "<p>Su nueva clave es:</p>".
      "<br>". "<br>".
            $usuario.
            "<br>".
           $contrasena.
        "<p>Nota: No es necesario el cambio de la contraseña al momento ingresar.</p>";
        $this->enviarCrorreo($asunto,$mensaje,$usuario);
    }
}
?>