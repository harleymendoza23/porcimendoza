<?php
require_once '../head.php';

require_once '../conexiones/producto.php';
require_once '../conexiones/conexion.php';
//se instancia el objeto producto
$oproducto = new producto();
//se recibe el parametro del enlace
$oproducto->id = $_GET['id'];
$registro = $oproducto->consultarproducto();

?>
<!DOCTYPE html>
<html lang="es">

<head>

<body style="background-color: #ffffff;">
    <form action="editarproducto.php" method="get">
        <input type="text" name="id"value ="<?php echo $_GET['id'];?>" style="display: none;">
        <div class="container">
            <div class="row align-items-center">


                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Nombre del producto</label>
                    <input class="form-control" type="text" name="nombreProducto" value="<?php echo $oproducto->nombreProducto; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Detalle del producto</label>
                    <input class="form-control" type="text" name="detalleproducto" value="<?php echo $oproducto->detalleproducto; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">peso del producto</label>
                    <input class="form-control" type="number" name="peso" value="<?php echo $oproducto->peso; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">Tipo de peso</label>
                    <!-- <input type="text" name="id" value="<?php echo $oproducto->id; ?>" style="display:none;"> -->
                    <select class="form-select" name="tipopeso" id="">

                        <option value="" disabled selected>tipo peso</option>
                        
                        <option value='libras' <?php if ($oproducto->tipopeso == "libras") echo "selected"; ?>>libras</option>
                        <option value='kilo' <?php if ($oproducto->tipopeso == "kilo") echo "selected"; ?>>kilos</option>
                        <option value='arroba' <?php if ($oproducto->tipopeso == "arroba") echo "selected"; ?>>arrobas</option>


                    </select>
                   
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <label for="">precio del producto</label>
                    <input class="form-control" type="text" name="precio" id="separador" value="<?php echo $oproducto->precio; ?>">
                </div>

            </div>
            <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="productoslista.php" class="btn btn-outline-info">volver</a>
            <a href="index.php" class="btn btn-outline-info">pagina principal</a>
        </div>
    </form>
</body>

</html>
<script>var separador = document.getElementById('separador');

separador.addEventListener('keyup', (e) => {
    var entrada = e.target.value.split('.').join('');
    entrada = entrada.split('').reverse();
    
    var salida = [];
    var aux = '';
    
    var paginador = Math.ceil(entrada.length / 3);
    
    for(let i = 0; i < paginador; i++) {
        for(let j = 0; j < 3; j++) {
          
            if(entrada[j + (i*3)] != undefined) {
                aux += entrada[j + (i*3)];
            }
        }
        salida.push(aux);
        aux = '';
       
        e.target.value = salida.join('.').split("").reverse().join('');
    }
}, false);</script>