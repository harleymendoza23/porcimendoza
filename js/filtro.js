function filtro(){
    var preciomenor=document.getElementById("separador").value;
    var preciomayor=document.getElementById("separadormayor").value;
    var pesomenor=document.getElementById("pesomenor").value;
    var pesomayor=document.getElementById("pesomayor").value;
    $.ajax({
        url:'../controller/controllerproducto.php',
        type:'GET',
        data:{
            preciomenor: preciomenor,
            preciomayor: preciomayor,
            pesomenor: pesomenor,
            pesomayor:pesomenor,
            function:"filtros"
        }
    }).done(function(data){
        var datos=JSON.parse(data);
        var contenedor=document.getElementById("")
    })
}