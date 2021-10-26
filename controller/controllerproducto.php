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
$oagregar = new usuarioController();

switch ($funcion) {
    case "añadirAlCarrito":
        $oagregar->agregar_producto();
        break;
}

class usuarioController
{


    public function agregar_producto()
    {
        session_start();
        require_once '../conexiones/pedido.php';

        $opedido = new pedido();
        if (!isset($_SESSION['id_pedido'])) {

            $opedido->id_usuario = 'NULL';
            $opedido->id_session = session_id();
            if (isset($_session['id_usuario'])) {
                $opedido->id_usuario = $_session['id_usuario'];
                $opedido->id_session = 'NULL';
            }
            $oestado = new estadoPedido();


            $opedido->estado_pedido = $oestado->reserva;
            $opedido->total = 0;
            $opedido->tipo_pago = 0;
            $opedido->id_factura = 'NULL';
            require_once '../conexiones/pedido.php';

            $_SESSION['id_pedido'] = $opedido->crear_pedido();
        }
        if (isset($_SESSION['id_pedido'])) {
            require_once '../conexiones/producto_carro.php';
            $oProducto = new productoc();
            require_once '../conexiones/producto.php';
            $oinclusion = new producto();
            $oinclusion->id = $_GET['id'];
            $oinclusion->consultarproducto();
            $oinclusion->nombreProducto = ['nombreProducto'];

            $oProducto->id_inclusion_productos = $_GET['id'];
            $oProducto->id_pedido = $_SESSION['id_pedido'];
            if ($oProducto = $oProducto->agregar_producto()) {
                header("location:../carro de compras/cart.php");
            } else {
                echo "Error al registrar el producto";
            }
        }
    }
    public function consultar_producto()
    {
        require_once '../conexiones/pedido.php';
        require_once '../conexiones/producto_carro.php';
        $oproducto = new productoc();
        $osession = new pedido();
        $oproducto->id_session = session_id();
        $opedido=$osession->consultar_session(session_id());
        //  echo $opedido;
        $oproducto->id_pedido=$opedido;

        $result = $oproducto->consultar_producto();
        return $result;
    }
}
