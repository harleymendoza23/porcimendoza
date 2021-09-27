<?php
require_once 'head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- accept="image/*" me sirve para que el imput sepa que solo se van a caragar imagnes y de todo tipo de imagenes   -->
            <!--  multiple   me sirve para indicar que puedo agregar multiples imagenes -->
            <!-- onchange="agregar_archivos('evento')"  se agrega la funcion que se va a trabajar en el javascript -->
            <input type="file" accept="image/*" multiple onchange="agregar_archivos(event)">
            <div id="container-image" class="row">
                <!-- aqui van aparecer las imagenes  -->
             
            </div>


        </form>
    </div>
    <script>
        function agregar_archivos(evento) {
            var archivos = evento.currentTarget.files;
            console.log(archivos);
            // la variable archivo va a guardar todo lo que este en archivos para recorrer y crear una tarjeta por cada imagens 
            var contenedor = document.getElementById('container-image');
            //se crea el container
            contenedor.innerHTML="";
            for (var archivo of archivos) {
                //se crea un div para la tarjeta 
                var tarjeta = document.createElement('div');
                //se le da clase a la tarjeta 
                tarjeta.className = "col col-3 card";
                // tarjeta.setAttribute("style", "width:10rem");
                var imagen = document.createElement('img');
                imagen.className = "card-img-top";
                // imagen.src=URL.createObjectURL(archivo); permite que la URL guarda los archivos que esta en la variable de archivo 
                imagen.src = URL.createObjectURL(archivo);
                imagen.setAttribute("style", "width:100%; height:auto");
               // se crea el div con java 
                var cuerpo = document.createElement('div');
                //se le da la clase al div
                cuerpo.className = "card-body";
                //se crea la etiketa a
                var botoneliminar = document.createElement('a');
                //se le da el color a la etiqueta a 
                botoneliminar.className = "btn btn-outline-danger";
                //se crea la funcion eliminar pero aun no funciona 
                botoneliminar.addEventListener('click', function() {
                    eliminar(this.value);
                });
                //se llama hatml dentro de java
                botoneliminar.innerHTML = '<img src="icons8-eliminar.gif" width="40px" />'
                //se guarda la imagen dentro de la tarjeta 
                tarjeta.appendChild(imagen);
                //se guarda el boton eliminar dentro de el cuerpo
                cuerpo.appendChild(botoneliminar);
                //se guarda el boton eliminar dentro de el cuerpo
                tarjeta.appendChild(cuerpo);
                //por ultimo se guarda la tarjeta dentro del contenedor
                contenedor.appendChild(tarjeta);
            }

        }
    </script>
</body>

</html>