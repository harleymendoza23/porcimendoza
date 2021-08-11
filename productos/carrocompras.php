<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Implementar un carrito de compras</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Tipo de fuente -->
  <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:400,600,700&display=swap" rel="stylesheet">
  <!-- Bootstrap Grid -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap-grid.min.css">
  <!-- Estilos CSS de personalización -->
  <style>
    body{
      font-family: 'Archivo Narrow', sans-serif;
    }
    a{
      color: #262525;
      text-decoration: none;
    }
    img{
      max-width: 100%;
    }
    .carrito-total{
      background: #FC304D;
      cursor:  pointer;
      padding: 5px 10px;
      position: relative;
    }
    .bolsa{
      position: absolute;
      background: #f2f2f2;
      display: none;
      padding:  5px;
      z-index:  9999;
    }
    .simpleCart_items{
      width: 350px;
    }
    .simpleCart_shelfItem{
      padding-top:  15px;
      padding-bottom: 15px;
    }
    .item-image img{
      height: auto;
      width: 80px;
    }
    .item_image,
    .item_Quantity,
    .item_price{
      margin-bottom: 15px;
    }
    .item_price{
      font-size: 2em;
    }
    .item-remove a{
      color: #EC2626;
    }

    .item_add{
      border-radius: 21.5px;
      border:  thin solid;
      transition: .5s;
      padding:  5px 10px;
    }
    .item_add:hover{
      background: #41DA7B;
      border:  thin solid #2DC466;
      color: #fff;
    }

    footer{
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <!-- Titulo de tienda -->
        <h2>Tienda v1.0.0</h2>
      </div>
      <div class="col-sm-3">
        <!-- Carrito de compras y sus items -->
        <div class='carrito'>
          
          <p class="carrito-total">
            <span class="simpleCart_quantity">0</span> item(s) <span class="simpleCart_total">$0.00</span>
          </p>

          <div class="bolsa">
            <div class="simpleCart_items"></div>
            <div class="opciones">
              <a class="boton simpleCart_empty" href="javascript:void(0)">Vaciar carrito</a>
              <a class="boton simpleCart_checkout" href="#">Checkout</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!--  Contenedor con el nombre principal (simpleCart_shelfItem)
        todos los items de un loop lo deben de tener -->
      <div class="col-md-6 col-lg-4 simpleCart_shelfItem">
        <!-- Nombre del producto se obtiene al agregar la clase (item_name) -->
        <h2 class="item_name">Auto Azul</h2>
        <!-- Imagen del producto se obtiene al agregar la clase (item_image) -->
        <img class="item_image" src="imagenes/auto_azul.jpg" alt="Auto Azul"/>
        <!-- Cantidad a requerir del producto se obtiene al agregar la clase (item_Quantity) -->
        <input class="item_Quantity" type="number" min="1" max="10" value="1"/>
        <!-- Precio del producto se obtiene al agregar la clase (item_price) -->
        <div class="item_price">$35000.99</div>
        <!-- Añadir el producto al carrito, se logra agregando la clase (item_add) -->
        <a class="item_add" href="javascript:;"> Añadir al carrito </a>

      </div>

      <div class="col-md-6 col-lg-4 simpleCart_shelfItem">
        <h2 class="item_name">Auto Naranja</h2>

        <img class="item_image" src="imagenes/auto_naranja.jpg" alt="Auto Naranja"/>
        <input class="item_Quantity" type="number" min="1" max="10" value="1"/>
        <div class="item_price">$32000.99</div>
        <a class="item_add" href="javascript:;"> Añadir al carrito </a>

      </div>
      <div class="col-md-6 col-lg-4 simpleCart_shelfItem">

        <h2 class="item_name">Auto Rojo</h2>
        <img class="item_image" src="imagenes/auto_rojo.jpg" alt="Auto Rojo"/>
        <input class="item_Quantity" type="number" min="1" max="10" value="1"/>
        <div class="item_price">$38000.99</div>
        <a class="item_add" href="javascript:;"> Añadir al carrito </a>

      </div>
      <div class="col-md-6 col-lg-4 simpleCart_shelfItem">

        <h2 class="item_name">Auto Gris</h2>
        <img class="item_image" src="imagenes/auto_gris.jpg" alt="Auto Gris"/>
        <input class="item_Quantity" type="number" min="1" max="10" value="1"/>
        <div class="item_price">$38000.99</div>
        <a class="item_add" href="javascript:;"> Añadir al carrito </a>

      </div>
    </div>
  </div>
  <footer class="container">
    <div class="row">
      <div class="col-sm">
        &copy; <a href="https://luismasdev.com/author/luis/" target="_blank">Luis Mas Dev</a>
      </div>
    </div>
  </footer>
  <!-- Agregamos la librería jQuery (Importante)-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- Agregamos la librería Simple Cart (recuerda apuntar a la librería Simple Cart)-->
  <script src="js/simpleCart.min.js"></script>
  <!-- Código JS de inicialización  -->
  <script>

    $(document).ready(function($) {
      /* Función jQuery para el evento clic en la etiqueta "x" con la clase (.carrito-total)*/
      $('.carrito-total').click(function() {
        //Mostrar los items del carrito
        $('.bolsa').slideToggle();
      });

    });

  //SIMPLE CART
  //Configuraciones básicas, recuerda tu lo puedas adaptar a tu medida
  simpleCart({
    cartColumns: [
        { view:'image' , attr:'image', label: "Imagen"}, //obtiene la imagen
        { attr: "name", label: "Name"}, //obtiene el nombre
        { view: "currency", attr: "price", label: "Price"},//obtiene el precio
        { view: "decrement", label: "-"}, //Resta el producto
        { attr: "quantity", label: "Qty"}, //obtiene la cantidad del producto
        { view: "increment", label: "+"}, //Suma el producto
        { view: "currency", attr: "total", label: "SubTotal" },// Obtiene el precio total del producto
        { view: "remove", text: "Quitar", label: false} //Quita o remueve el producto
    ],

    cartStyle: "table", //puede ser div o table

    checkout: { 
        type: "PayPal" , //Pago a través de PayPal
        email: "tu-correo@dominio.com" //tu correo válido
    }

  });
  </script>
</body>
</html>