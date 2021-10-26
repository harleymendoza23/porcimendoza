
//esta funcion se utiliza para poner separador de miles solo para la pagina y no para base de datos 
  function separador(campo,texto){
    
    var entrada = texto.split('.').join('');
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

    var precio=document.getElementById(campo);
    precio.innerHTML = "$"+salida.join('.').split("").reverse().join('');
    }

  
}
