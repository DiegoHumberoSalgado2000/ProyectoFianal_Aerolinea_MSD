/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    CargarDatosDetalleReserva(dato);
    $("#btnIrConfirmarReserva").click(EnviarInformacion);
    BloquearTextDetalleReserva();
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

function CargarDatosDetalleReserva(dato) {


    try {
        alert("hola mundo");

        var cedulaDecrypt=Decrypt(dato);
        alert(cedulaDecrypt);
        var objDetalleReserva = {
            cedula: cedulaDecrypt,
            type: "BuscarDetalleReserva"
        };
        if (objDetalleReserva.cedula !== "") {
            $.ajax({
                type: 'post',
                url: "../Controlador/gestionDetalleReserva.php",
                beforeSend: function () {

                },
                data: objDetalleReserva,
                success: function (res) {
                    var info = JSON.parse(res);
                    var data = JSON.parse(info.data);

                    if (info.msj === "Success") {
                        $("#txtUbicacionSalida").val(data[0].nombreUbicacionSalida);
                        $("#txtUbicacionLlegada").val(data[0].nombreUbicacionLlegada);
                        $("#txtFechaSalida").val(data[0].fecha_salida);
                        $("#txtFechaLlegada").val(data[0].fecha_llegada);
                        $("#txtNumeroVuelo").val(data[0].placa);
                        $("#txtNombre").val(data[0].nombres);
                        $("#txtApellido").val(data[0].apellidos);
                        $("#txtTelefono").val(data[0].telefono_celular);
                        $("#txtCorreo").val(data[0].correo);
                        $("#txtPrecioSilla").val(data[0].precioSilla);
                        $("#txtPrecioTiquete").val(data[0].precioTiquete);
                        $("#txtTotalPago").val(data[0].TotalPagar);

                    } else {
                        alert("No se encuentra la Reserva");
                        LimpiarText();
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
    } catch (error) {
        alert("No altere la dirección url")
    }

}


function EnviarInformacion() {

    var objInformacionPasajero = {
        cedula: $("#txtCedula").val(),
        type: "BuscarEnviarInformacion"
    };
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionDetalleReserva.php",
        beforeSend: function () {
        },
        data: objInformacionPasajero,
        success: function (res) {
           
            var info = JSON.parse(res);

            if (info.res === "False") {
                alert(info.msj);
            } else {
                if (info.msj === "Success") {
                    //alert(res);
                    var encriptado = Encrypt(res);
                    //alert(encriptado);

                    window.location.href = '../Vista/Confirmar_Pagos.php?res=' + encriptado;
                } else {
                    alert("No se han encontrado la informacion")
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

function BloquearTextDetalleReserva() {
    let txtNombre = document.getElementById("txtNombre");
    let txtApellido = document.getElementById("txtApellido");
    let txtCorreo = document.getElementById("txtCorreo");
    let txtTelefono = document.getElementById("txtTelefono");
    let txtTotalPagar = document.getElementById("txtTotalPago");
    let txtUbicacionsalida = document.getElementById("txtUbicacionSalida");
    let txtUbicacionLlegada = document.getElementById("txtUbicacionLlegada");
    let txtFechaSalida = document.getElementById("txtFechaSalida");
    let txtFechaLlegada = document.getElementById("txtFechaLlegada");
    let txtNumeroVuelo = document.getElementById("txtNumeroVuelo");
    let txtPrecioSilla = document.getElementById("txtPrecioSilla");
    let txtPrecioTiquete = document.getElementById("txtPrecioTiquete");

    txtNombre.disabled = true;
    txtApellido.disabled = true;
    txtCorreo.disabled = true;
    txtTelefono.disabled = true;
    txtTotalPagar.disabled = true;
    txtUbicacionsalida.disabled = true;
    txtUbicacionLlegada.disabled = true;
    txtFechaSalida.disabled = true;
    txtFechaLlegada.disabled = true;
    txtNumeroVuelo.disabled = true;
    txtPrecioSilla.disabled = true;
    txtPrecioTiquete.disabled = true;

}

function LimpiarText() {

    $("#txtFechaSalida").val("dd/mm/aaaa");
    $("#txtFechaLlegada").val("dd/mm/aaaa");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCorreo").val("");
    $("#txtCedula").val("");
    $("#txtTelefono").val("");
    $("#txtTotalPago").val("");
    $("#txtUbicacionSalida").val("");
    $("#txtUbicacionLlegada").val("");
    $("#txtNumeroVuelo").val("");
    $("#txtPrecioSilla").val("");
    $("#txtPrecioTiquete").val("");
}


