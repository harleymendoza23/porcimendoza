btnDetalleRolEditar=document.getElementById('btnDetallesEditar');
btnDetalleRolCancelar=document.getElementById('btnDetallesCancelar');
btnDetalleRolGuardar=document.getElementById('btnDetallesGuardar');
txtDetalleNombreRol=document.getElementById('nombreRol');
cancelarEditar();
function cancelarEditar(){
    btnDetalleRolEditar.style.display="";
    btnDetalleRolCancelar.style.display="none";
    btnDetalleRolGuardar.style.display="none";
    txtDetalleNombreRol.readOnly=true;
}
function habilitarEditar(){
    btnDetalleRolEditar.style.display="none";
    btnDetalleRolCancelar.style.display="";
    btnDetalleRolGuardar.style.display="";
    txtDetalleNombreRol.readOnly=false;
}







