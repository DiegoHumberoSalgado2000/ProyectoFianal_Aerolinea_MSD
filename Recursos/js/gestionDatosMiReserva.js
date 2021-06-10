$(document).ready(function () {
    BloquearTextDetalleMiReserva();
    LlenarDatos();
    $("#btnCancelarReserva").click(cancelarReserva);
   });
   function Decrypt(word, key = '1239873697412580') {
    let decData = CryptoJS.enc.Base64.parse(word).toString(CryptoJS.enc.Utf8)
    let bytes = CryptoJS.AES.decrypt(decData, key).toString(CryptoJS.enc.Utf8)
    return JSON.parse(bytes)
}

function LlenarDatos() {

    var datos=$("#txtDatos").val();
    try {
        var json=Decrypt(datos);
        var info = JSON.parse(json);
        var arreglo = JSON.parse(info.data);

        if (info.msj === "Success") {
        $("#txtIdReserva").val(arreglo[0].id_reserva);
        $("#txtNombre").val(arreglo[0].nombres);
        $("#txtApellido").val(arreglo[0].apellidos);
        $("#txtCedula").val(arreglo[0].cedula);
        $("#txtTelefono").val(arreglo[0].telefono_celular);
        $("#txtCorreo").val(arreglo[0].correo);
        $("#txtNumeroSilla").val(arreglo[0].silla);
        $("#txtOrigen").val(arreglo[0].origen);
        $("#txtDestino").val(arreglo[0].destino);
        $("#txtFechaSalida").val(arreglo[0].fecha_salida);
        $("#txtFechaLlegada").val(arreglo[0].fecha_llegada);
        $("#txtEstadoReserva").val(arreglo[0].estado);
        $("#txtTipoVuelo").val(arreglo[0].tipo_vuelo);
        $("#txtEstadoVuelo").val(arreglo[0].estado_vuelo);
        $("#txtPlaca").val(arreglo[0].placa);

        

       
        } else {
            alert("No se encuentra datos registrados");
        }

    } catch (error) {
        alert("No altere la dirección url");
    }


}
function cancelarReserva(){
    let objCheckIn={
        idReserva:$("#txtIdReserva").val(),
        type: ""
    };

    if(objCheckIn.idReserva !==""){
        objCheckIn.type='CancelarReserva';
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionMiReserva.php",
            beforeSend :function(){

            },
            data: objCheckIn,
            success:function(data){

                var info = JSON.parse(data);

                if(info.res === "Success"){
                    alert("Se Cancela la reserva Correctamente");
                    window.location.href = "../index.php";
                }
                    
                

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }else {
        alert("Para realizar el Check-In antes hay que buscarlo");
    }
}
function BloquearTextDetalleMiReserva(){
    let txtIdReserva=document.getElementById("txtIdReserva");
    let txtNombre = document.getElementById("txtNombre");
    let txtApellido = document.getElementById("txtApellido");
    let txtCedula = document.getElementById("txtCedula");
    let txtTelefono = document.getElementById("txtTelefono");
    let txtCorreo = document.getElementById("txtCorreo");
    let txtNumeroSilla = document.getElementById("txtNumeroSilla");
    let txtOrigen = document.getElementById("txtOrigen");
    let txtDestino = document.getElementById("txtDestino");
    let txtFechaSalida = document.getElementById("txtFechaSalida");
    let txtFechaLlegada = document.getElementById("txtFechaLlegada");
    let txtEstadoReserva = document.getElementById("txtEstadoReserva");
   

    txtIdReserva.disabled=true;
    txtNombre.disabled = true;
    txtApellido.disabled = true;
    txtCedula.disabled = true;
    txtCorreo.disabled = true;
    txtTelefono.disabled = true;
    txtNumeroSilla.disabled = true;
    txtOrigen.disabled = true;
    txtDestino.disabled = true;
    txtFechaSalida.disabled = true;
    txtFechaLlegada.disabled = true;
    txtEstadoReserva.disabled = true;
    
}

function limpiar(){
    $("#txtIdReserva").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCorreo").val("");
    $("#txtCedula").val("");
    $("#txtTelefono").val("");
    $("#txtNumeroSilla").val("");
    $("#txtOrigen").val("");
    $("#txtDestino").val("");
    $("#txtFechaSalida").val("");
    $("#txtFechaLlegada").val("");
    $("#txtEstadoReserva").val("");
    $("#txtTipoVuelo").val("");
    $("#txtEstadoVuelo").val("");
    $("#txtPlaca").val("");
    
    
}