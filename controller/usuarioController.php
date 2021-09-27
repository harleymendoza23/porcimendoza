<?php
// echo json_encode("hola mundo");
//esta función almacena que operación quiere el usuario
$funcion = ""; //Me permite verificar su la variable esta vacia
//El if diferenciar metodo POST o GET o ninguno. AL CONTROLER SE LE HA ESTADO ENVIANDO GET O POST
if (isset($_POST['funcion'])) { //SI ESTA DEFINIDA Y SU VALOR ES DIFERENTE A NULO(ISSET), ALMACENA EN LA VARIABLE FUNCION
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}
//solo va a hacer este caso
$oUsuario = new usuarioController();

switch ($funcion) {
    case "registrar":
        $oUsuario->registrarUsuario();
        break;
    case "iniciarSesion":
        $oUsuario->iniciarSesion();

        break;
    case "editarproducto";
        $oUsuario->editarproducto();
        break;
        // case "registrarUsuarioEnRol":
        //     $oUsuario->registrarUsuarioPorRol();
        //     break;
    case "cerrarSesion":
        $oUsuario->cerrarSesion();
        break;
    case "editarmodulo":
        $oUsuario->editarmodulo();
        break;
    case "nuevapagina":
        $oUsuario->nuevapagina();
        break;
    case "editarpagina":
        $oUsuario->actualizarPagina();
        break;
    case "nuevorol":
        $oUsuario->nuevoRol();
        break;
    case "editarrol":
        $oUsuario->actualizarRol();
        break;
    case "filtrar_usuario":
        $oUsuario->filtrar_usuario();
        break;
    case "registrarUsuarioEnRol":
        $oUsuario->registrarUsuarioEnRol();
        break;
}


//clase usuarioController.php genera la comunicación entre la vista y el modelo
//contiene las funciones necesarias para alimentar la vista
class usuarioController
{

    //función para registrar el usuario
    public function registrarUsuario()
    {
        require_once '../conexiones/usuario.php';
        $oUser = new usuario();
        $nombre_usuario = $_POST['nombre_usuario'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $confirmContrasena = $_POST['confirmContrasena'];
        if ($contrasena == $confirmContrasena) {
            //si son iguales las contraseña y confirma contraseña se va a generar el registro
            if ($oUser->consultarCorreoElectronico($correo) == 0) {
                //se registra al usuario
                $result = $oUser->registroUsuario($nombre_usuario, $correo, $contrasena);
                if ($result) {
                    header("location:../index.php");
                } else {
                    echo "error al momento de registrar el usuario";
                }
            } else {
                // existe un registro con este correo electronico
                echo "ya existe un registro con este correo electronico";
            }
        } else {
            //si són diferentes le vamos a indicar al usuario que no son iguales
            //no se genera el registro
            echo "la contraseña y confirmación de la contraseña no coinciden";
        }
    }


    public function iniciarSesion()
    {
        require_once '../conexiones/usuario.php';

        session_start();
        $oUser = new usuario();
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $oUser->iniciarSesion($correo, $contrasena);
        if ($oUser->getIdUser() != "") {
            $_SESSION['id_usuario'] = $oUser->getIdUser();
            $_SESSION['nombre_usuario'] = $oUser->getNombreUser();
            header("location:../index.php");
        } else {
            echo "usuario o contraseña incorrecta";
        }
    }
    // public function registrarUsuarioPorRol()
    // {

    //     $idRol = $_GET['idRol'];
    //     $idUser = $_GET['idUser'];

    //     require_once '../usuario.php';

    //     $oUsuario = new usuario();
    //     $result = $oUsuario->actualizarUsuarioDeRol($idRol, $idUser);
    //     if ($result) {
    //         header("location: ../detallerol.php?idRol=$idRol");
    //     } else {
    //         echo "Error al registrar el usuario";
    //     }
    // }

    public function cerrarSesion()
    {
        session_start();
        session_unset(); //borra las variables de sesion
        session_destroy(); //destruye o elimina la sesion
        header("location:../login/login.php");
        die();
    }

    public function editarproducto()
    {
        require_once '../conexiones/producto.php';
        require_once '../conexiones/conexion.php';
        //se instancia el objeto producto
        $oproducto = new producto();
        $oproducto->id = $_POST['id'];
        $oproducto->nombreProducto = $_POST['nombreProducto'];
        $oproducto->detalleproducto = $_POST['detalleproducto'];
        $oproducto->descripcion = $_POST['descripcion'];
        $oproducto->peso = $_POST['peso'];
        $oproducto->tipopeso = $_POST['tipopeso'];
        $oproducto->precio = $_POST['precio'];

        $result = $oproducto->actualizarproducto();

        // subirArchivos($result, $archivos);

        // function subirArchivos($id, $archivos)
        // {
        //     $nombre = 0;
        //     foreach ($archivos as $key => $tmp_name) {
        //         if ($_FILES["archivos"]["name"][$key]) {
        //             $filename = $_FILES["archivos"]["name"][$key];
        //             $source = $_FILES["archivos"]["tmp_name"][$key];
        //             $directorio = $_SERVER['DOCUMENT_ROOT'] . "/archivos/imagenes/$id";
        //             echo $directorio;

        //             if (!file_exists($directorio)) {
        //                 mkdir($directorio, 0, true) or die("no se puede crear el directorio");
        //             }
        //             $dir = opendir($directorio);
        //             $target_path = $directorio . '/' . $nombre . ".jpg";

        //             // echo $filename;
        //             if (move_uploaded_file($source, $target_path)) {
        //                 require_once '../conexiones/imagenes.php';
        //                 $imagenes = new imagenes();
        //                 $imagenes->idproducto = $id;
        //                 $imagenes->archivos = "/archivos/imagenes/$id/$nombre.jpg";
        //                 $imagenes->guardarimagen();
        //             } else {
        //                 echo "Ha ocurrido un error, por favor intentalo nuevamente.<br>";
        //             }
        //             $nombre += 1;
        //             closedir($dir);
        //         }
        //     }
        // }

        if ($result) {
            header("Location: ../productos/formularioeditar.php?id=$oproducto->id");
        } else {
            echo "error al actualizar el producto";
        }
    }
    public function editarmodulo()
    {
        require_once '../conexiones/modulo.php';
        require_once '../conexiones/conexion.php';
        //se instancia el objeto modulo
        $omodulo = new modulo();
        $omodulo->id_modulo = $_GET['id_modulo'];
        $omodulo->nombre_modulo = $_GET['nombre_modulo'];

        $result = $omodulo->actualizarmodulo();
        if ($result) {
            header("Location: ../administrador/modulo.php");
        } else {
            echo "error al actualizar el modulo";
        }
    }
    public function nuevapagina()
    {

        require_once '../conexiones/pagina.php';
        require_once '../conexiones/conexion.php';
        $opagina = new pagina();
        $opagina->id_modulo = $_GET['id_modulo'];
        $opagina->nombre_pagina = $_GET['nombre_pagina'];
        $opagina->enlace = $_GET['enlace'];

        $result = $opagina->nuevoPagina();
        if ($result) {
            header("Location: ../administrador/detallemodulo.php?id_modulo=$opagina->id_modulo");
        } else {
            echo "error al registrar la pagina";
        }
    }
    public function actualizarPagina()
    {
        require_once '../conexiones/conexion.php';
        require_once '../conexiones/pagina.php';
        $opagina = new pagina();
        $opagina->id_pagina = $_GET['id_pagina'];
        $opagina->nombre_pagina = $_GET['nombre_pagina'];
        $opagina->enlace = $_GET['enlace'];

        $result = $opagina->actualizarPagina();
        if ($result) {
            header("Location: ../administrador/detallemodulo.php?id_modulo=" . $_GET['id_modulo']);
        } else {
            echo "error al actualizar la pagina";
        }
    }
    public function nuevoRol()
    {
        require_once '../conexiones/conexion.php';
        require_once '../conexiones/rol.php';
        $orol = new rol();
        $orol->nombre_rol = $_GET['nombre_rol'];
        $result = $orol->nuevoRol();
        if ($result) {
            header("location:../administrador/listarrol.php");
        } else {
            echo "error al crear el rol";
        }
    }
    public function actualizarRol()
    {
        require_once '../conexiones/conexion.php';
        require_once '../conexiones/rol.php';
        $orol = new rol();
        $orol->id_rol = $_GET['id_rol'];
        $orol->nombre_rol = $_GET['nombre_rol'];

        $result = $orol->actualizarRol();
        if ($result) {
             header("Location: ../administrador/listarrol.php?");

        } else {
            echo "error al actualizar la pagina";
        }
    }
    public function filtrar_usuario()
    {
        require_once '../conexiones/usuario.php';
        $ousuario = new usuario();
        // $result=$ousuario->listarusuario($_GET['filtrousuario']); se llama la funcion del java
        $result = $ousuario->listarusuario($_GET['filtrousuario']);
        echo json_encode($result);
    }

    public function registrarUsuarioEnRol()
    {

        $id_rol = $_GET['id_rol'];
        $id_usuario = $_GET['id_usuario'];

        require_once '../conexiones/usuario.php';

        $oUsuario = new usuario();
        $result = $oUsuario->actualizarUsuarioDeRol($id_rol, $id_usuario);
        if ($result) {
            header("location: ../administrador/detallerol.php?id_rol=$id_rol");
        } else {
            echo "Error al registrar el usuario";
        }
    }
}
