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
                    <h5 style="text-align:center">nombre del producto</h5>

                    <input class="form-control" type="text" name="nombreProducto">
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">detalle del producto</h5>
                    <div class="form-floating">
                        <textarea class="form-control" name="detalleproducto" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        
                    </div>
                </div>


                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">peso del producto</h5>

                    <input  class="form-control"  type="number" name="peso">
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <div class="form-floating">
                    <h5 style="text-align:center">seleccione el tipo de peso</h5>
                        <select class="form-select" name="tipopeso" id="floatingSelectGrid" aria-label="Floating label select example">
                            
                            <option value='libras'>libras</option>
                            <option value='kilos'>kilos</option>
                            <option value='arroba'>arroba</option>
                        </select>
                       
                    </div>
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">precio del producto</h5>

                    <input name="precio" type="text" id="DEMO" data-a-sign="" data-a-dec="," data-a-sep="." class="form-control">
                </div>

                <!-- <label for="floatingTextarea">precio del producto</label> -->

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