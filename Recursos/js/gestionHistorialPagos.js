/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#btnCargarInformacion").click(cargarDatos);
    $("#btnPagarReserva").click(GuardarHistorialPasajero);
    Bloquear();
});

function cargarDatos() {

    var objPasajero = {
        cedula: $("#txtDocumentoIdentidad").val(),
        type: "cargarDatos"
    };
    if (objPasajero.cedula !== "") {
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionPasajeroReserva.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (res) {
                var info = JSON.parse(res);
                var data = JSON.parse(info.data);

                if (info.msj === "Success") {
                    $("#txtIdReservaPasajero").val(data[0].id);
                    $("#txtNombre").val(data[0].nombres);
                    $("#txtApellido").val(data[0].apellidos);
                    $("#txtDocumentoIdentidad").val(data[0].cedula);
                    $("#txtCorreo").val(data[0].correo);
                    $("#txtTelefono").val(data[0].telefono_celular);

                } else {
                    alert("No se encuentra el pasajero");
                    LimpiarTextInformacionPasajero();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    } else {
        alert("No has ingresado el numero de cedula para buscar al pasajero");
    }

}

function GuardarHistorialPasajero() {
    let objHistorialPagos = {

        idReserva: $("#txtIdReservaPasajero").val(),
        totalPrecio: $("#txtTotalPagar").val(),
        tarjeraCredito: $("#CmbTargetaCredito").val(),
        mesVencimiento: $("#CmbMesVencimiento").val(),
        opcionPago: $("#CmbCantidadCuotas").val(),
        Avencimiento: $("#CmbAvencimiento").val(),
        numeroTarjetaCredtiro: $("#txtNumeroTargetaCredito").val(),
        numeroVerificado: $("#txtNumeroVerificacion").val(),
        type: ""
    };

    if (objHistorialPagos.idReserva !== "") {

        if (objHistorialPagos.numeroTarjetaCredtiro !== objHistorialPagos.numeroVerificado || objHistorialPagos.numeroTarjetaCredtiro === "" && objHistorialPagos.numeroVerificado === "") {
            alert("Los numeros de la tarjeta de credito no coinciden");
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
        alert("Se ha cometido un error al guardar la informacion");
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
    let txtTotalPagar = document.getElementById("txtTotalPagar");

    txtNombre.disabled = true;
    txtApellido.disabled = true;
    txtCorreo.disabled = true;
    txtTelefono.disabled = true;
    txtTotalPagar.disabled = true;
}
