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
             
                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">nombre del producto</h5>
                    <input class="form-control" placeholder="por ejemplo:cerdos" required minlength="5" maxlength="20" type="text" name="nombreProducto">
                </div>

                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">detalle del producto</h5>
                    <div class="form-floating">
                        <textarea class="form-control" name="detalleproducto" id="floatingTextarea2"></textarea>
                    </div>
                </div>
                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">descripcion del producto</h5>

                    <input class="form-control" placeholder="por ejemplo:raza doble jamon" required minlength="5" maxlength="20" type="text" name="descripcion">
                </div>


                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">peso del producto</h5>

                    <input class="form-control" placeholder="por ejemplo:12" min="1" max="500" required type="number" name="peso">
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

                    <input name="precio" placeholder="por ejemplo:$50.000" minlength="5" maxlength="40" required type="text" id="separador" class="form-control">
                </div>
                   <!-- codigo para subir imagenes a una pagina -->
                <div class="col-md-6" style="color: #FBFCFC;">
                    <h5 style="text-align:center">imagenes</h5>
                    <input name="archivos[]" type="file" class="form-control" multiple accept="image/*" onchange="agregar_archivos(event)">
                    <br>
                </div>
                <div id="container-image" class="row">
                <!-- aqui van aparecer las imagenes  -->
             
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
<script>
    var separador = document.getElementById('separador');

    separador.addEventListener('keyup', (e) => {
        var entrada = e.target.value.split('.').join('');
        entrada = entrada.split('').reverse();

        var salida = [];
        var aux = '';

        var paginador = Math.ceil(entrada.length / 3);

        for (let i = 0; i < paginador; i++) {
            for (let j = 0; j < 3; j++) {

                if (entrada[j + (i * 3)] != undefined) {
                    aux += entrada[j + (i * 3)];
                }
            }
            salida.push(aux);
            aux = '';

            e.target.value = salida.join('.').split("").reverse().join('');
        }
    }, false);
</script>
<script>
        function agregar_archivos(evento) {
            var archivos = evento.currentTarget.files;
            console.log(archivos);
            // la variable archivo va a guardar todo lo que este en archivos para recorrer y crear una tarjeta por cada imagens 
            var contenedor = document.getElementById('container-image');
            contenedor.innerHTML="";
            for (var archivo of archivos) {
                var tarjeta = document.createElement('div');
                tarjeta.className = "col col-3 card";
                // tarjeta.setAttribute("style", "width:10rem");
                var imagen = document.createElement('img');
                imagen.className = "card-img-top";
                // imagen.src=URL.createObjectURL(archivo); permite que la URL guarda los archivos que esta en la variable de archivo 
                imagen.src = URL.createObjectURL(archivo);
                imagen.setAttribute("style", "width:100%; height:auto");
                // var input =document.createElement('input');
                // input.type="file";
                // input.files=URL.createObjectURL(archivo);
                var cuerpo = document.createElement('div');
                cuerpo.className = "card-body";
                var botoneliminar = document.createElement('a');
                botoneliminar.className = "btn btn-outline-danger";
                botoneliminar.addEventListener('click', function() {
                    eliminar(this.value);
                });
                botoneliminar.innerHTML = '<img src="icons8-eliminar.gif" width="40px" />'
                tarjeta.appendChild(imagen);
                // cuerpo.appendChild(input);
                // cuerpo.appendChild(botoneliminar);
                tarjeta.appendChild(cuerpo);
                contenedor.appendChild(tarjeta);
            }

        }
    </script>