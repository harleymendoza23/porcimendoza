<?php
require_once 'estdopedido.php';
require_once 'metodoPago.php';
$funcion = "";
if (isset($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
} else {
    if (isset($_GET['funcion'])) {
        $funcion = $_GET['funcion'];
    }
}
$oagregar = new controllerproducto();

switch ($funcion) {
    case "añadirAlCarrito":
        $oagregar->agregar_producto();
        break;
}

class controllerproducto
{

    function agregar_producto()
    {
        session_start();
        if (!isset($_SESSION['id_usuario'])) {
            header("location:../login/login.php");
        } else {
            require_once '../conexiones/pedido.php';
            $opedido = new pedido();
            

            $opedido->cunsultarpedido($_SESSION['id_usuario']);
            if ($opedido->id_pedido == 0) {
                $opedido->total = 0;
                $opedido->id_usuario = $_SESSION['id_usuario'];
                $opedido->tipo_pago = 0;
                $id_factura="";
                do {
                    $id_factura = $opedido->generarCodigoPedido();
                    $existeCodigo = $opedido->consultarExistePedido($id_factura);
                } while (count($existeCodigo) > 0);
                $opedido->id_factura = $id_factura;
                $opedido->crear_pedido();
            }
            require_once '../conexiones/producto.php';
            $oinclusion = new producto();
            $oinclusion->id = $_GET['id'];
            $oinclusion->consultarproducto();
            // $oinclusion->nombreProducto = ['nombreProducto'];
            // $oinclusion->precio=['precio'];
            require_once '../conexiones/producto_carro.php';
            $oProducto = new productoc();


            $oProducto->id_inclusion_productos = $_GET['id'];
            $oProducto->id_pedido = $opedido->id_pedido;
            $oProducto = $oProducto->agregar_producto();
            require_once '../conexiones/pedido.php';
            $ototal = new pedido();
            $ototal->actualizarvalortotal($opedido->id_pedido, $oinclusion->precio);



            header("location:../index.php?titulo_mensaje=Excelente&cuerpo_mensaje=Se+agrego+el+producto+correctamente&tipo_mensaje=success");
        }
    }



    // public function agregar_producto()
    // {
    //     session_start();
    //     require_once '../conexiones/pedido.php';

    //     $opedido = new pedido();
    //     if(isset($_SESSION['id_usuario'])){
    //         $opedido->id_usuario=$_SESSION['id_usuario'];
    //     }else{
    //         $opedido->id_usuario=0;
    //     }

    //     $opedido->id_session=session_id();
    //    $idpedido= $opedido->cunsultarpedido();
    //     if ($idpedido=="") {

    //         $opedido->id_usuario = 'NULL';
    //         $opedido->id_session = session_id();
    //         if (isset($_SESSION['id_usuario'])) {
    //             $opedido->id_usuario = $_SESSION['id_usuario'];
    //             $opedido->id_session = 'NULL';
    //         }
    //         $oestado = new estadoPedido();


    //         $opedido->estado_pedido = $oestado->reserva;
    //         $opedido->total = 0;
    //         $opedido->tipo_pago = 0;
    //         $opedido->id_factura = 'NULL';
    //         require_once '../conexiones/pedido.php';
    //         //$opedido->crear_pedido();
    //          $idpedido = $opedido->crear_pedido();

    //     }


    //         if ($idpedido!="") {
    //             require_once '../conexiones/producto_carro.php';
    //             $oProducto = new productoc();
    //             require_once '../conexiones/producto.php';
    //             $oinclusion = new producto();
    //             $oinclusion->id = $_GET['id'];
    //             $oinclusion->consultarproducto();
    //             $oinclusion->nombreProducto = ['nombreProducto'];

    //             $oProducto->id_inclusion_productos = $_GET['id'];
    //             $oProducto->id_pedido = $idpedido;
    //             if ($oProducto = $oProducto->agregar_producto()) {

    //                  header("location:../index.php?titulo_mensaje=Excelente&cuerpo_mensaje=Se+agrego+el+producto+correctamente&tipo_mensaje=success");
    //             } else {
    //                 echo "Error al registrar el producto";
    //             }
    //         }else{
    //             echo"el pedido no se a podido crear";
    //         }





    // }
    public function consultar_producto($id_usuario)
    {
        require_once '../conexiones/pedido.php';
        require_once '../conexiones/producto_carro.php';
        $oproducto = new productoc();
        $opedido = new pedido();
        $opedido->cunsultarpedido($id_usuario);
        $opedido->id_pedido;
        $result = $oproducto->consultar_producto($opedido->id_pedido);
        return $result;
    }
}
