<?php
require_once '../conexiones/conexion.php';
require '../head.php';
?>



<!DOCTYPE html>
<html lang="es">

<head>





</head>


<body style="background-color:#2E2F2F;">



    <form action="../crear/crearproducto.php" method="post" enctype="multipart/form-data">
        <div class="container-fluid">

            <div class="row g-3">
                <!-- codigo para subir imagenes a una pagina -->



                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">imagenes</h5>
                    <input name="archivos[]" type="file" class="form-control" multiple accept="image/*">
                    <br>
                </div>



                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center" >nombre del producto</h5>

                    <input class="form-control" required minlength="10" maxlength="20" type="text" name="nombreProducto">
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">detalle del producto</h5>
                    <div class="form-floating">
                        <textarea class="form-control" name="detalleproducto" id="floatingTextarea2" ></textarea>
                    </div>
                </div>


                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">peso del producto</h5>

                    <input  class="form-control"  type="number" name="peso">
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <div>
                    <h5 style="text-align:center">seleccione el tipo de peso</h5>
                        <select class="form-select" name="tipopeso" id="floatingSelectGrid" aria-label="Floating label select example">
                            
                            <option value='libras'>libras</option>
                            <option value='kilo'>kilos</option>
                            <option value='arroba'>arrobas</option>
                        </select>
                       
                    </div>
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">precio del producto</h5>
                  
                    <input name="precio" type="text" id="separador"  class="form-control">
                </div>

               

                <center>
                    <div class="col-md-6">
                        <input type="submit" value="guardar" class="btn btn-info" onclick="datos()">
                    </div>
                </center>
            </div>
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