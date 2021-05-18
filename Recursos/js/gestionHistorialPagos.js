/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#btnCargarInformacion").click(cargarDatos);
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


function LimpiarTextInformacionPasajero() {
    $("#txtIdReserva").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtDocumentoIdentidad").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
}
