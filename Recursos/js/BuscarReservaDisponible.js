$(document).ready(function(){
    BloquearText();
    $("#btnBuscarReserva").click(buscarReservaDisponible);
});

function buscarReservaDisponible() {

    var objReserva={
        codigoReser:$("#txtCodigoReserva").val(),
        type: "BuscarReserva"
    };
if(objReserva.codigoReser!== ""){
      $.ajax({
       
        type:'post',
        url: "../Controlador/gestionBuscarReservaDisponible.php",
        beforeSend: function () {

        },
       data: objReserva,
       success: function (res){
           var info = JSON.parse(res);
           var data=JSON.parse(info.data);

           if(info.msj === "Success"){
            document.getElementById("lblNombre").innerHTML = data[0].nombres;
            document.getElementById("lblApellido").innerHTML=data[0].apellidos;
            document.getElementById("lblCedula").innerHTML=data[0].cedula;  
            document.getElementById("lblTelefono").innerHTML=data[0].telefono_celular;
            document.getElementById("lblCorreo").innerHTML=data[0].correo; 
               $("#txtTipoVuelo").val(data[0].tipo_vuelo);
               $("#txtEstadoReserva").val(data[0].estado);
               $("#txtSillaSeleccionada").val(data[0].numero_silla);
               $("#txtDescripcion").val(data[0].descripcion);
               $("#txtOrigen").val(data[0].nombreUbicacionSalida);
               $("#txtDestino").val(data[0].nombreUbicacionLlegada);
               $("#txtFechaLlegada").val(data[0].fecha_llegada);
               $("#txtFechaSalida").val(data[0].fecha_salida);
           }else{
            alert("Esta reserva no está disponible");
           LimpiarText();
           }
       },
       error: function (jqXHR, textStatus, errorThrown) {
        alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
        alert("Verifique la ruta del archivo");
    }
       
    });
}else{
    alert("Ingrese el código de la reserva");
}
   
}

function LimpiarText(){
    $("#txtCodigoReserva").val("");
    document.getElementById("lblNombre").innerHTML ="";
    document.getElementById("lblApellido").innerHTML ="";
    document.getElementById("lblCedula").innerHTML ="";
    document.getElementById("lblTelefono").innerHTML ="";
    document.getElementById("lblCorreo").innerHTML ="";
    $("#txtTipoVuelo").val("");
    $("#txtEstadoReserva").val("");
    $("#txtSillaSeleccionada").val("");
    $("#txtDescripcion").val("");
    $("#txtOrigen").val("");
    $("#txtDestino").val("");
    $("#txtFechaLlegada").val("dd/mm/aaaa");
    $("#txtFechaSalida").val("dd/mm/aaaa");
}

function BloquearText(){
    
    let txtTipoVuelo=document.getElementById("txtTipoVuelo");
    let txtEstadoReserva=document.getElementById("txtEstadoReserva");
    let txtSillaSeleccionada=document.getElementById("txtSillaSeleccionada");
    let txtDescripcion=document.getElementById("txtDescripcion");
    let txtOrigen=document.getElementById("txtOrigen");
    let txtDestino=document.getElementById("txtDestino");
    let txtFechaLlegada=document.getElementById("txtFechaLlegada");
    let txtFechaSalida = document.getElementById("txtFechaSalida");

    txtTipoVuelo.disabled=true;
    txtEstadoReserva.disabled =true;
    txtSillaSeleccionada.disabled =true;
    txtDescripcion.disabled =true;
    txtOrigen.disabled =true;
    txtDestino.disabled =true;
    txtFechaLlegada.disabled = true;
    txtFechaSalida.disabled = true;
}


