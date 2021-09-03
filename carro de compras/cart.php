<?php
require_once '../head.php';
require_once '../controller/controllerproducto.php';
$oproducto = new usuarioController();
$consulta = $oproducto->consultar_producto();
?>
<html>

<head>
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
  <div class="row">
    <div class="col-11,5">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">CARRO DE COMPRAS</h3>
        </div>
        <div class="card-body table-responsive p-1">
          <table class="table " id="productos">
            <thead>
              <tr class="encabezado">
                <th>NOMBRE DEL PRODUCTO</th>
                <th>PESO DEL PRODUCTO</th>
                <th>PRECIO</th>
              </tr>
            </thead>

            <tbody >
              <?php
              foreach ($consulta as $registro) {
              ?>
                <tr>
                  <td><?php echo $registro['nombre_producto']  ?></td>
                  <td><?php echo $registro['peso_producto']  ?></td>
                  <td>$<?php echo $registro['precio_producto'] ?></td>
                  <th>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" onclick="eliminar(<?php echo $registro['id']; ?>);"><i class="fas fa-trash"></i> eliminar</a>
                  </th>
                </tr>

              <?php
              }
              ?>
            </tbody>
            <tbody>
              <tr class="total">
                <td>total:$</td>
                <td>0</td>

                <td>0</td>
                <td>
                  <a href="../carro de compras/compra.php" class="btn btn-info"><i class="far fa-money-bill-alt"></i>continuar con la compra</a>
                  <a href="" class="btn btn-danger"><i class="far fa-trash-alt"></i>vaciar carrito</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
  let total = 0;

  let celdasPrecio = document.querySelectorAll('td + td');
  for (let i = 0; i < celdasPrecio.length; ++i) {
    total+= parseFloat(celdasPrecio[i].firstChild.data);
  }
  let nuevaFila=document.createElement('tr');
  let celdaTotal=document.createElement('td');
  let textoCeldaTotal=document.createTextNode('total:');
  celdaTotal.appendChild(textoCeldaTotal);
  nuevaFila.appendChild(celdaTotal);
  

  let celdaValorTotal=document.createElement('td');
  let textoCeldaValorTotal=document.createTextNode(total);
  celdaValorTotal.appendChild(textoCeldaTotal);
  nuevaFila.appendChild(celdaValorTotal);

  ducumen.getElementById('productos').appendChild(nuevaFila);
</script>
</body>

</html>
