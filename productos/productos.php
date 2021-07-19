<?php
require_once '../conexion.php';
require '../head.php';
?>



<!DOCTYPE html>
<html lang="en">


<body>
    <center>
        <div class="container" style="background-color:cyan;">

            <form action="../crear/crearproducto.php" method="GET">
                <!-- codigo para subir imagenes a una pagina -->
                <div class="col-sm-3">
                    <label>imagenes</label>
                    <input name="archivos[]" type="file" class="form-control" multiple accept="image/*">
                    <br>

                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <textarea class="form-control" name="nombreProducto" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">detalle del producto</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <textarea class="form-control"  name="peso" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">peso del producto</label>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" name="tipopeso" id="floatingSelectGrid" aria-label="Floating label select example">
                                <option selected>seleccione una opcion</option>
                                <option value="1">libras</option>
                                <option value="2">kilos</option>
                                <option value="3">arroba</option>
                            </select>
                            <label for="floatingSelectGrid">funcion seleccionada</label>
                        </div>
                    </div>
                </div>



                <div class="col-sm-3">

                <div class="form-floating">
                        <textarea class="form-control"  name="precio" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">precio del producto</label>
                    </div>
                </div>



                <input type="submit" value="ejecutar" class="btn btn-info" onclick="datos()">

        </div>

        </form>
        </div>
</body>

</center>

</html>