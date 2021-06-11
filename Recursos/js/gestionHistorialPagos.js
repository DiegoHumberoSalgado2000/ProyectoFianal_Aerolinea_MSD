/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    DatosRequeridos();
    cargarDatos();
    $("#btnPagarReserva").click(GuardarHistorialPasajero);
    Bloquear();
});


function Encrypt(word, key = '1239873697412580') {
    let encJson = CryptoJS.AES.encrypt(JSON.stringify(word), key).toString()
    let encData = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(encJson))
    return encData
}

function Decrypt(word, key = '1239873697412580') {
    let decData = CryptoJS.enc.Base64.parse(word).toString(CryptoJS.enc.Utf8)
    let bytes = CryptoJS.AES.decrypt(decData, key).toString(CryptoJS.enc.Utf8)
    return JSON.parse(bytes)
}

var codigoReserva;
function DatosRequeridos() {
    try {

        var codigoReservaEncriptado = $("#txtCodigoReserva").val();
        codigoReserva=Decrypt(codigoReservaEncriptado);
        //alert(codigoReserva)
    } catch (error) {
        alert("No altere la dirección url");
    }

}

function cargarDatos() {
    //alert(codigoIdPasajero);
    var objPasajero = {
        codigoRese: codigoReserva,
        type: "cargarDatos"

    };
    //alert(codigoIdPasajero);
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionPasajeroReserva.php",
        beforeSend: function () {

        },
        data: objPasajero,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);
            //alert(info);
            if (info.msj === "Success") {
                $("#txtIdReservaPasajero").val(data[0].id);
                $("#txtNombre").val(data[0].nombres);
                $("#txtApellido").val(data[0].apellidos);
                $("#txtDocumentoIdentidad").val(data[0].cedula);
                $("#txtCorreo").val(data[0].correo);
                $("#txtTelefono").val(data[0].telefono_celular);
                $("#txtValorTiquete").val(data[0].precio);
                $("#txtServicioAdicionales").val(data[0].precioSilla);
                $("#txtTotalAPagar").val(data[0].TotalPagar);
            } else {
                alert("No se encuentra el pasajero");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}

function GuardarHistorialPasajero() {
    let objHistorialPagos = {

        idReserva: $("#txtIdReservaPasajero").val(),
        TotalAPagar: $("#txtTotalAPagar").val(),
        tarjeraCredito: $("#CmbTargetaCredito").val(),
        mesVencimiento: $("#CmbMesVencimiento").val(),
        opcionPago: $("#CmbCantidadCuotas").val(),
        Avencimiento: $("#CmbAvencimiento").val(),
        numeroTarjetaCredtiro: $("#txtNumeroTargetaCredito").val(),
        numeroVerificado: $("#txtNumeroVerificacion").val(),
        type: ""
    };
    if (objHistorialPagos.idReserva !== "") {

        if (objHistorialPagos.numeroTarjetaCredtiro !== objHistorialPagos.numeroVerificado||objHistorialPagos.numeroTarjetaCredtiro===""&&objHistorialPagos.numeroVerificado==="") {
            alert("Los números de la tarjeta de crédito no coinciden o son números de tarjeta no válidos");
            
        } else {

            objHistorialPagos.type = 'guardar';
            $.ajax({
                type: "post",
                url: "../Controlador/gestionHistorialPagos.php",
                beforeSend: function () {

                },
                data: objHistorialPagos,
                success: function (data) {
                    var info = JSON.parse(data);
                    if (info.res === "Success") {
                        alert("Se pago la reserva correctamente");
                        window.location.href = '../index.php';
                        LimpiarTextInformacionBancaria();
                        LimpiarTextInformacionPasajero();
                    } else if (info.res === "False") {
                        alert(info.msj)
                    } else {
                        alert("Error al guardar, no se ha guardado los datos");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                    alert("Verifique la ruta del archivo");
                }
            });
        }
    } else {
        alert("Se ha cometido un error al guardar la información");
    }
}


function LimpiarTextInformacionPasajero() {
    $("#txtIdReserva").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtDocumentoIdentidad").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
}

function LimpiarTextInformacionBancaria() {
    $("#txtIdReservaPasajero").val("");
    $("#txtTotalPagar").val("");
    $("#CmbTargetaCredito").val("-1");
    $("#CmbMesVencimiento").val("-1");
    $("#CmbCantidadCuotas").val("-1");
    $("#CmbAvencimiento").val("-1");
    $("#txtNumeroTargetaCredito").val("");
    $("#txtNumeroVerificacion").val("");
}

function Bloquear() {
    DesabilitarText();
}

function DesabilitarText() {

    let txtNombre = document.getElementById("txtNombre");
    let txtApellido = document.getElementById("txtApellido");
    let txtCorreo = document.getElementById("txtCorreo");
    let txtTelefono = document.getElementById("txtTelefono");
    let txtValorTiquete = document.getElementById("txtValorTiquete");
    let txtServicioAdicionales = document.getElementById("txtServicioAdicionales");
    let txtCedula = document.getElementById("txtDocumentoIdentidad");
    let txtTotalAPagar = document.getElementById("txtTotalAPagar");

    txtNombre.disabled = true;
    txtApellido.disabled = true;
    txtCorreo.disabled = true;
    txtTelefono.disabled = true;
    txtValorTiquete.disabled = true;
    txtServicioAdicionales.disabled = true;
    txtCedula.disabled = true;
    txtTotalAPagar.disabled = true;
}
