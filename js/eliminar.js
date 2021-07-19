function eliminar(id){
    document.getElementById("eliminar").value=id;
} //esta function en Java nos permite tomar el identificador del estudiante para poder eliminarlo en las funcionesd de Php.

// function eliminar(idUser){
//     document.getElementById("eliminar").value=idUser;
// }

function eliminarMatricula(id, idCurso){
    document.getElementById("eliminarMatricula").value=idCurso;
    document.getElementById("eliminar").value=id;
} //esta funcion realiza las mismas funciones que la otra, con la diferencia que toma dos variables para poder eliminar

function eliminarPagina(id, idModulo){
    document.getElementById("eliminarPagina").value=idModulo;
    document.getElementById("eliminar").value=id;
} 