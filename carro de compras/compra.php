
<?php
require_once '../head.php'
?>


<!DOCTYPE html>
<html lang="es">

<head>
   
</head>

<body>
    <div class="row">
        <div class="col-11,5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CARRO DE COMPRAS</h3>
                </div>
                <div class="card-body table-responsive p-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NOMBRE DEL PRODUCTO</th>
                                <th>PESO DEL PRODUCTO</th>
                                <th>PRECIO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>
                                    <a class="btn btn-danger"><i class="fas fa-trash"></i> eliminar compra</a>
                                </th>
                            </tr>
                            <tr>
                                <th>total:$</th>
                                <th>
                                <form>
  <script
    src="https://checkout.wompi.co/widget.js"
    data-render="button"
    data-public-key="pub_test_X0zDA9xoKdePzhd8a0x9HAez7HgGO2fH"
    data-currency="COP"
    data-amount-in-cents="4950000"
    data-reference="4XMPGKWWPKWQ"
    >
  </script>
</form>
  </th>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                       
                        <tbody>
                            <tr>
                                <td>
                                    <a href="../index.php" class="btn btn-outline-info">Desea seguir comprando</a>
                                </td>
                            </tr>
                           
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>