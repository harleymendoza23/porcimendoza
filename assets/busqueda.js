buscaruaurio();
function buscaruaurio(){
    //se llama al imput como se teiene en la pagina listausuario
    var filtrousuario=document.getElementById("busqueda_usuario").value;
    //el ajax hace la petecion
    $.ajax({
        url:'../controller/usuarioController.php',
        // es el tipo que se esta enviando
        type:'get',
        //el data es el que almacena la informacion
        data:{filtrousuario:filtrousuario,funcion:"filtrar_usuario"}
        //el done se ejecuta despues de que se ejecute el html
    }).done(function(data){
        
        // console.log(data);
        //json.parse lo que hace es convertir el json en un arreglo que quedaria guardado en la variable datos
        var datos=JSON.parse(data);
        //esta trallendo la tabla y la esta almacenando en el contenedor 
        var contenedor=document.getElementById("busqueda");
        //modifica las etiquetas que estan dentro de la tabla en este
        // caso se les esta diciendo que guarden un vacio con el fin de limpiar la tabla
        contenedor.innerHTML="";
        //el ciclo for lo que hace es recorrer el arreglo 
        for(i=0; i<datos.length; i++){
            agregarbusqueda(datos[i]);
        }
    })

}

function agregarbusqueda(datos){
    //se crea una tabla en java 
    var tr=document.createElement("tr");
     //se crea el tr de la tabla
    tr.id=datos['id_usuario'];
    var tdnombre=document.createElement("td");
    tdnombre.innerHTML=datos['nombre_usuario'];
    //se empieza a crear los td de la tabla
    var tdcorreo=document.createElement('td');
    tdcorreo.innerHTML=datos['correo'];
   // var tdbotones=document.createElement('td');
   // var botoneditar=document.createElement("a");
    //se crea un boton en java en este caso el boton es para editar
   // botoneditar.href="/porcimendoza/usuario/formularioeditarusuario.php?id_usuario="+datos['id_usuario'];
    //botoneditar.className="btn btn-warning";
    //botoneditar.innerHTML='<i class="fas fa-edit"></i> editar';
    //se crea el boton de eliminar
   // var botoneliminar=document.createElement("a");
   // botoneliminar.className="btn btn-danger";
    //botoneliminar.setAttribute("data-bs-toggle","modal");
    //botoneliminar.setAttribute("data-bs-target","#exampleModal");
    //botoneliminar.value=datos['id_usuario'];
    //botoneliminar.addEventListener('click', function(){
      //eliminar(this.value);
    //});
   // botoneliminar.innerHTML='<i class="fas fa-trash"></i> eliminar';
    //se guardan los botones dentro de el tdbotones 
   // tdbotones.appendChild(botoneditar);
    //tdbotones.appendChild(botoneliminar);
    //se guardan los td en el tr 
    tr.appendChild(tdnombre);
    tr.appendChild(tdcorreo);
    //tr.appendChild(tdbotones);
    //estamos almacenando la tabla dentro de la bariable contenedor
    var contenedor=document.getElementById("busqueda");
    //se guarda el tr dentro de la variable contenedor 
    contenedor.appendChild(tr);
}