$(document).ready(function () {
    $("#btnRegistrar").click(RegistrarPasajero);
    datosRequeridos();
    $("#btnValidarDatos").click(validarDatosPersona);
    $("#btnSeleccionarSilla").click(seleccionarSilla);
    $("#btnReservar").click(reservar);
    $("#Uno").click(uno);
    $("#Dos").click(dos);
    $("#Tres").click(tres);
    $("#Cuatro").click(cuatro);
    $("#Cinco").click(cinco);
    $("#Seis").click(seis);
    $("#Siete").click(siete);
    $("#Ocho").click(ocho);
    $("#Nueve").click(nueve);
    $("#Diez").click(diez);
    $("#Once").click(once);
    $("#Doce").click(doce);
    $("#Trece").click(trece);
    $("#Catorce").click(catorce);
    $("#Quince").click(quince);
    $("#Dieciseis").click(dieciseis);
    $("#Diecisiete").click(diecisiete);
    $("#Dieciocho").click(dieciocho);
    $("#Diecinieve").click(diecinieve);
    $("#Veinte").click(veinte);
    $("#VeintiUno").click(veintiUno);
    $("#VeintiDos").click(veintiDos);
    $("#VeintiTres").click(veintiTres);
    $("#VeintiCuatro").click(veintiCuatro);
    $("#VeintiCinco").click(veintiCinco);
    $("#veintiSeis").click(veintiSeis);
    $("#VeintiSiete").click(veintiSiete);
    $("#VeintiOcho").click(veintiOcho);
    $("#VeintiNueve").click(veintiNueve);
    $("#Treinta").click(treinta);
    $("#TreintaUno").click(treintaUno);
    $("#TreintaDos").click(treintaDos);
    $("#TreintaTres").click(treintaTres);
    $("#TreintaCuatro").click(treintaCuatro);
    $("#TreintaCinco").click(treintaCinco);
    $("#TreintaSeis").click(treintaSeis);
    $("#TreintaSiete").click(treintaSiete);
    $("#TreintaOcho").click(treintaOcho);
    $("#TreintaNueve").click(treintaNueve);
    $("#Cuarenta").click(cuarenta);
    $("#CuarentaUno").click(cuarentaUno);
    $("#CuarentaDos").click(cuarentaDos);
    $("#CuarentaTres").click(cuarentaTres);
    $("#CuarentaCuatro").click(cuarentaCuatro);
    $("#CuarentaCinco").click(cuarentaCinco);
    $("#CuarentaSeis").click(cuarentaSeis);
    $("#CuarentaSiete").click(cuarentaSiete);
    $("#CuarentaOcho").click(cuarentaOcho);
    $("#CuarentaNueve").click(cuarentaNueve);
    $("#Cincuenta").click(cincuenta);

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

let codigoItinerario;
function datosRequeridos() {
    try {
        var idItinerarioEncriptado = $("#txtIdItinerarioEncri").val()
        codigoItinerario = Decrypt(idItinerarioEncriptado);
        $("#txtIdPersona").val(-1);
        $("#txtIdSillaSeleccionada").val(-1);

        document.getElementById("btnReservar").disabled = true;
        document.getElementById("btnSeleccionarSilla").disabled = true;

        document.getElementById("txtNumeroSilla").disabled = true;
        document.getElementById("txtPrecio").disabled = true;
        document.getElementById("txtEstadoSilla").disabled = true;
        document.getElementById("txtTipo").disabled = true;
        document.getElementById("txtDescripcionSilla").disabled = true;

        bloquearAsientos();
    } catch (error) {
        alert("No altere la dirección url");
        deshabilitarBotones();
    }

}

function reservar() {

    var objDatos = {
        type: "obtenerNuevoCodigoReserva"
    };

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: objDatos,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);
            var codigoReserva;
            if (info.msj === "Success") {

                //alert(data[0].ultimo);
                if (data[0].ultimo === null) {
                    //alert("Es nulo");
                    codigoReserva = 1;
                } else {
                    codigoReserva = data[0].ultimo;
                }

                reservarObtencionDatos(codigoReserva);

                //let btnSeleccionarSilla = document.getElementById("btnSeleccionarSilla");
                //btnSeleccionarSilla.disabled =false;

            } else {
                alert("No se pudo obtener el nuevo codigo de la reserva")
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });

}

function reservarObtencionDatos(codigoReserva) {
    let idSilla = $("#txtIdSillaSeleccionada").val();
    let idPasajeroPrincipal = $("#txtIdPersona").val();

    if (idSilla === -1) {
        alert("Debe de seleccionar una silla antes de reservarla");
    } else if (idPasajeroPrincipal === -1) {
        alert("Debe de validar sus datos personales para realizar una reserva");
    } else {
        let hoy = new Date();

        let dia = hoy.getDate();
        let mes = hoy.getMonth() + 1;
        let agnio = hoy.getFullYear();

        let hora = hoy.getHours();
        let minutos = hoy.getMinutes();
        let segundos = hoy.getSeconds();

        dia = ('0' + dia).slice(-2);
        mes = ('0' + mes).slice(-2);

        hora = ('0' + hora).slice(-2);
        minutos = ('0' + minutos).slice(-2);
        segundos = ('0' + segundos).slice(-2);

        let formato = `${agnio}-${mes}-${dia} ${hora}:${minutos}:${segundos}`;// Utilizando una literal de plantilla. yyyy-MM-dd
        //alert("Fecha de reserva "+formato)

        var objDatos = {
            silla: idSilla,
            pasajeroPrincipal: idPasajeroPrincipal,
            fechaHoy: formato,
            codigo: codigoReserva,
            type: "guardarReserva"
        };

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionSilla.php",
            beforeSend: function () {

            },
            data: objDatos,
            success: function (res) {
                alert("Reserva realizada con éxito");
                //mandarCorreoPasajeroReserva(idPasajeroPrincipal);
                window.location.href = "../Vista/Pagos.php?res="+Encrypt(codigoReserva);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });


    }


}


function mandarCorreoPasajeroReserva(idPasajeroPrincipal){
    var objAvion = {
        pasajeroPrincipal: idPasajeroPrincipal,
        type: "obtenerCedulaPorId"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {

                $cedula=data[0].cedula;
                window.location.href = "../Vista/Pagos.php?res="+Encrypt($cedula);

            } else {
                alert("No es posible obtener la cédula del pasajero")
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });

}


function buscarSilla(numSilla) {

    var objAvion = {
        idItinerario: codigoItinerario,
        numeroSilla: numSilla,
        type: "buscarSilla"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {

                $("#txtNumeroSilla").val(data[0].numero_silla);
                $("#txtPrecio").val(data[0].precio);
                $("#txtEstadoSilla").val(data[0].estado);
                $("#txtTipo").val(data[0].tipo);
                $("#txtIdSilla").val(data[0].id);
                $("#txtDescripcionSilla").val(data[0].descripcion);

                //let btnSeleccionarSilla = document.getElementById("btnSeleccionarSilla");
                //btnSeleccionarSilla.disabled =false;

            } else {
                alert("La silla no se encuentra disponible");
                document.getElementById("btnSeleccionarSilla").disabled = true;
                document.getElementById("btnReservar").disabled = true;
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}



function validarDatosPersona() {

    var obj = {
        correo: $("#txtCorreoSilla").val(),
        contrasena: $("#txtContrasenaSilla").val(),
        type: "buscarPersona"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: obj,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);

            if (info.res === "False") {
                alert(info.msj);
                alert("Si seleccionó alguna silla antes se quitó esa selección.")
                $("#txtIdPersona").val(-1);
                $("#txtIdSillaSeleccionada").val(-1);
                document.getElementById("btnReservar").disabled = true;
                document.getElementById("btnSeleccionarSilla").disabled = true;
                quitarColorSeleccionSilla();
            } else {

                if (info.msj === "Success") {


                    var data = JSON.parse(info.data);
                    validarSiSeleccionoSillaAnterioridad(data);

                } else {
                    alert("No se encontró al asajero. Si seleccionó alguna silla antes se quitó esa selección.");
                    $("#txtIdPersona").val(-1);
                    $("#txtIdSillaSeleccionada").val(-1);
                    document.getElementById("btnReservar").disabled = true;
                    document.getElementById("btnSeleccionarSilla").disabled = true;
                    quitarColorSeleccionSilla();
                }
            }





        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}

function validarSiSeleccionoSillaAnterioridad(data) {



    var obj = {
        correo: $("#txtCorreoSilla").val(),
        contrasena: $("#txtContrasenaSilla").val(),
        idItinerario: codigoItinerario,
        type: "seleccionoSilla"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: obj,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);

            if (info.msj === "Success") {

                var arreglo = JSON.parse(info.data);

                if (arreglo.length > 0) {
                    alert("El pasajero ya seleccionó una silla en este vuelo anteriormente, no puede seleccionar más sillas");
                    $("#txtIdPersona").val(-1);
                    $("#txtIdSillaSeleccionada").val(-1);
                    document.getElementById("btnReservar").disabled = true;
                    document.getElementById("btnSeleccionarSilla").disabled = true;
                    quitarColorSeleccionSilla();
                } else {
                    $("#txtCorreoSilla").val(data[0].correo);
                    $("#txtContrasenaSilla").val(data[0].contrasena);
                    $("#txtIdPersona").val(data[0].id);
                    alert("Se encontró el pasajero")
                    document.getElementById("btnSeleccionarSilla").disabled = false;
                }

            } else {
                $("#txtCorreoSilla").val(data[0].correo);
                $("#txtContrasenaSilla").val(data[0].contrasena);
                $("#txtIdPersona").val(data[0].id);
                alert("Se encontró el pasajero")
                document.getElementById("btnSeleccionarSilla").disabled = false;
            }





        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });





}




function seleccionarSilla() {
    let idSilla = $("#txtIdSilla").val();
    $("#txtIdSillaSeleccionada").val(idSilla);
    alert("Silla número " + $("#txtNumeroSilla").val() + " Seleccionada");
    document.getElementById("btnReservar").disabled = false;
    quitarColorSeleccionSilla();
    agregarColorSillaSeleccionada($("#txtNumeroSilla").val());

}

function deshabilitarBotones() {
    document.getElementById("btnReservar").disabled = true;
    document.getElementById("btnSeleccionarSilla").disabled = true;
    document.getElementById("Uno").disabled = true;
    document.getElementById("Dos").disabled = true;
    document.getElementById("Tres").disabled = true;
    document.getElementById("Cuatro").disabled = true;
    document.getElementById("Cinco").disabled = true;
    document.getElementById("Seis").disabled = true;
    document.getElementById("Siete").disabled = true;
    document.getElementById("Ocho").disabled = true;
    document.getElementById("Nueve").disabled = true;
    document.getElementById("Diez").disabled = true;
    document.getElementById("Once").disabled = true;
    document.getElementById("Doce").disabled = true;
    document.getElementById("Trece").disabled = true;
    document.getElementById("Catorce").disabled = true;
    document.getElementById("Quince").disabled = true;
    document.getElementById("Dieciseis").disabled = true;
    document.getElementById("Diecisiete").disabled = true;
    document.getElementById("Dieciocho").disabled = true;
    document.getElementById("Diecinieve").disabled = true;
    document.getElementById("Veinte").disabled = true;
    document.getElementById("VeintiUno").disabled = true;
    document.getElementById("VeintiDos").disabled = true;
    document.getElementById("VeintiTres").disabled = true;
    document.getElementById("VeintiCuatro").disabled = true;
    document.getElementById("VeintiCinco").disabled = true;
    document.getElementById("veintiSeis").disabled = true;
    document.getElementById("VeintiSiete").disabled = true;
    document.getElementById("VeintiOcho").disabled = true;
    document.getElementById("VeintiNueve").disabled = true;
    document.getElementById("Treinta").disabled = true;
    document.getElementById("TreintaUno").disabled = true;
    document.getElementById("TreintaDos").disabled = true;
    document.getElementById("TreintaTres").disabled = true;
    document.getElementById("TreintaCuatro").disabled = true;
    document.getElementById("TreintaCinco").disabled = true;
    document.getElementById("TreintaSeis").disabled = true;
    document.getElementById("TreintaSiete").disabled = true;
    document.getElementById("TreintaOcho").disabled = true;
    document.getElementById("TreintaNueve").disabled = true;
    document.getElementById("Cuarenta").disabled = true;
    document.getElementById("CuarentaUno").disabled = true;
    document.getElementById("CuarentaDos").disabled = true;
    document.getElementById("CuarentaTres").disabled = true;
    document.getElementById("CuarentaCuatro").disabled = true;
    document.getElementById("CuarentaCinco").disabled = true;
    document.getElementById("CuarentaSeis").disabled = true;
    document.getElementById("CuarentaSiete").disabled = true;
    document.getElementById("CuarentaOcho").disabled = true;
    document.getElementById("CuarentaNueve").disabled = true;
    document.getElementById("Cincuenta").disabled = true;


}

function agregarColorSillaSeleccionada(numeroSilla) {
    switch (parseInt(numeroSilla)) {
        case 1:
            document.getElementById("Uno").style.backgroundColor = "green";
            break;
        case 2:
            document.getElementById("Dos").style.backgroundColor = "green";
            break;
        case 3:
            document.getElementById("Tres").style.backgroundColor = "green";
            break;
        case 4:
            document.getElementById("Cuatro").style.backgroundColor = "green";
            break;
        case 5:
            document.getElementById("Cinco").style.backgroundColor = "green";
            break;
        case 6:
            document.getElementById("Seis").style.backgroundColor = "green";
            break;
        case 7:
            document.getElementById("Siete").style.backgroundColor = "green";
            break;
        case 8:
            document.getElementById("Ocho").style.backgroundColor = "green";
            break;
        case 9:
            document.getElementById("Nueve").style.backgroundColor = "green";
            break;
        case 10:
            document.getElementById("Diez").style.backgroundColor = "green";
            break;
        case 11:
            document.getElementById("Once").style.backgroundColor = "green";
            break;
        case 12:
            document.getElementById("Doce").style.backgroundColor = "green";
            break;
        case 13:
            document.getElementById("Trece").style.backgroundColor = "green";
            break;
        case 14:
            document.getElementById("Catorce").style.backgroundColor = "green";
            break;
        case 15:
            document.getElementById("Quince").style.backgroundColor = "green";
            break;
        case 16:
            document.getElementById("Dieciseis").style.backgroundColor = "green";
            break;
        case 17:
            document.getElementById("Diecisiete").style.backgroundColor = "green";
            break;
        case 18:
            document.getElementById("Dieciocho").style.backgroundColor = "green";
            break;
        case 19:
            document.getElementById("Diecinieve").style.backgroundColor = "green";
            break;
        case 20:
            document.getElementById("Veinte").style.backgroundColor = "green";
            break;
        case 21:
            document.getElementById("VeintiUno").style.backgroundColor = "green";
            break;
        case 22:
            document.getElementById("VeintiDos").style.backgroundColor = "green";
            break;
        case 23:
            document.getElementById("VeintiTres").style.backgroundColor = "green";
            break;
        case 24:
            document.getElementById("VeintiCuatro").style.backgroundColor = "green";
            break;
        case 25:
            document.getElementById("VeintiCinco").style.backgroundColor = "green";
            break;
        case 26:
            document.getElementById("veintiSeis").style.backgroundColor = "green";
            break;
        case 27:
            document.getElementById("VeintiSiete").style.backgroundColor = "green";
            break;
        case 28:
            document.getElementById("VeintiOcho").style.backgroundColor = "green";
            break;
        case 29:
            document.getElementById("VeintiNueve").style.backgroundColor = "green";
            break;
        case 30:
            document.getElementById("Treinta").style.backgroundColor = "green";
            break;
        case 31:
            document.getElementById("TreintaUno").style.backgroundColor = "green";
            break;
        case 32:
            document.getElementById("TreintaDos").style.backgroundColor = "green";
            break;
        case 33:
            document.getElementById("TreintaTres").style.backgroundColor = "green";
            break;
        case 34:
            document.getElementById("TreintaCuatro").style.backgroundColor = "green";
            break;
        case 35:
            document.getElementById("TreintaCinco").style.backgroundColor = "green";
            break;
        case 36:
            document.getElementById("TreintaSeis").style.backgroundColor = "green";
            break;
        case 37:
            document.getElementById("TreintaSiete").style.backgroundColor = "green";
            break;
        case 38:
            document.getElementById("TreintaOcho").style.backgroundColor = "green";
            break;
        case 39:
            document.getElementById("TreintaNueve").style.backgroundColor = "green";
            break;
        case 40:
            document.getElementById("Cuarenta").style.backgroundColor = "green";
            break;
        case 41:
            document.getElementById("CuarentaUno").style.backgroundColor = "green";
            break;
        case 42:
            document.getElementById("CuarentaDos").style.backgroundColor = "green";
            break;
        case 43:
            document.getElementById("CuarentaTres").style.backgroundColor = "green";
            break;
        case 44:
            document.getElementById("CuarentaCuatro").style.backgroundColor = "green";
            break;
        case 45:
            document.getElementById("CuarentaCinco").style.backgroundColor = "green";
            break;
        case 46:
            document.getElementById("CuarentaSeis").style.backgroundColor = "green";
            break;
        case 47:
            document.getElementById("CuarentaSiete").style.backgroundColor = "green";
            break;
        case 48:
            document.getElementById("CuarentaOcho").style.backgroundColor = "green";
            break;
        case 49:
            document.getElementById("CuarentaNueve").style.backgroundColor = "green";
            break;
        case 50:
            document.getElementById("Cincuenta").style.backgroundColor = "green";
            break;
        default:
            alert("Error al cambiar el color de la selección de la silla");
    }
}

function quitarColorSeleccionSilla() {

    if (document.getElementById("Uno").style.backgroundColor === "green") {
        document.getElementById("Uno").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Dos").style.backgroundColor === "green") {
        document.getElementById("Dos").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Tres").style.backgroundColor === "green") {
        document.getElementById("Tres").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Cuatro").style.backgroundColor === "green") {
        document.getElementById("Cuatro").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Cinco").style.backgroundColor === "green") {
        document.getElementById("Cinco").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Seis").style.backgroundColor === "green") {
        document.getElementById("Seis").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Siete").style.backgroundColor === "green") {
        document.getElementById("Siete").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Ocho").style.backgroundColor === "green") {
        document.getElementById("Ocho").style.backgroundColor = "yellow";
    }

    if (document.getElementById("Nueve").style.backgroundColor === "green") {
        document.getElementById("Nueve").style.backgroundColor = "blue";
    }

    if (document.getElementById("Diez").style.backgroundColor === "green") {
        document.getElementById("Diez").style.backgroundColor = "blue";
    }

    if (document.getElementById("Once").style.backgroundColor === "green") {
        document.getElementById("Once").style.backgroundColor = "blue";
    }

    if (document.getElementById("Doce").style.backgroundColor === "green") {
        document.getElementById("Doce").style.backgroundColor = "blue";
    }

    if (document.getElementById("Trece").style.backgroundColor === "green") {
        document.getElementById("Trece").style.backgroundColor = "blue";
    }

    if (document.getElementById("Catorce").style.backgroundColor === "green") {
        document.getElementById("Catorce").style.backgroundColor = "blue";
    }

    if (document.getElementById("Quince").style.backgroundColor === "green") {
        document.getElementById("Quince").style.backgroundColor = "blue";
    }

    if (document.getElementById("Dieciseis").style.backgroundColor === "green") {
        document.getElementById("Dieciseis").style.backgroundColor = "blue";
    }

    if (document.getElementById("Diecisiete").style.backgroundColor === "green") {
        document.getElementById("Diecisiete").style.backgroundColor = "blue";
    }

    if (document.getElementById("Dieciocho").style.backgroundColor === "green") {
        document.getElementById("Dieciocho").style.backgroundColor = "blue";
    }

    if (document.getElementById("Diecinieve").style.backgroundColor === "green") {
        document.getElementById("Diecinieve").style.backgroundColor = "blue";
    }

    if (document.getElementById("Veinte").style.backgroundColor === "green") {
        document.getElementById("Veinte").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiUno").style.backgroundColor === "green") {
        document.getElementById("VeintiUno").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiDos").style.backgroundColor === "green") {
        document.getElementById("VeintiDos").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiTres").style.backgroundColor === "green") {
        document.getElementById("VeintiTres").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiCuatro").style.backgroundColor === "green") {
        document.getElementById("VeintiCuatro").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiCinco").style.backgroundColor === "green") {
        document.getElementById("VeintiCinco").style.backgroundColor = "blue";
    }

    if (document.getElementById("veintiSeis").style.backgroundColor === "green") {
        document.getElementById("veintiSeis").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiSiete").style.backgroundColor === "green") {
        document.getElementById("VeintiSiete").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiOcho").style.backgroundColor === "green") {
        document.getElementById("VeintiOcho").style.backgroundColor = "blue";
    }

    if (document.getElementById("VeintiNueve").style.backgroundColor === "green") {
        document.getElementById("VeintiNueve").style.backgroundColor = "blue";
    }

    if (document.getElementById("Treinta").style.backgroundColor === "green") {
        document.getElementById("Treinta").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaUno").style.backgroundColor === "green") {
        document.getElementById("TreintaUno").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaDos").style.backgroundColor === "green") {
        document.getElementById("TreintaDos").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaTres").style.backgroundColor === "green") {
        document.getElementById("TreintaTres").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaCuatro").style.backgroundColor === "green") {
        document.getElementById("TreintaCuatro").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaCinco").style.backgroundColor === "green") {
        document.getElementById("TreintaCinco").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaSeis").style.backgroundColor === "green") {
        document.getElementById("TreintaSeis").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaSiete").style.backgroundColor === "green") {
        document.getElementById("TreintaSiete").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaOcho").style.backgroundColor === "green") {
        document.getElementById("TreintaOcho").style.backgroundColor = "blue";
    }

    if (document.getElementById("TreintaNueve").style.backgroundColor === "green") {
        document.getElementById("TreintaNueve").style.backgroundColor = "blue";
    }

    if (document.getElementById("Cuarenta").style.backgroundColor === "green") {
        document.getElementById("Cuarenta").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaUno").style.backgroundColor === "green") {
        document.getElementById("CuarentaUno").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaDos").style.backgroundColor === "green") {
        document.getElementById("CuarentaDos").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaTres").style.backgroundColor === "green") {
        document.getElementById("CuarentaTres").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaCuatro").style.backgroundColor === "green") {
        document.getElementById("CuarentaCuatro").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaCinco").style.backgroundColor === "green") {
        document.getElementById("CuarentaCinco").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaSeis").style.backgroundColor === "green") {
        document.getElementById("CuarentaSeis").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaSiete").style.backgroundColor === "green") {
        document.getElementById("CuarentaSiete").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaOcho").style.backgroundColor === "green") {
        document.getElementById("CuarentaOcho").style.backgroundColor = "blue";
    }

    if (document.getElementById("CuarentaNueve").style.backgroundColor === "green") {
        document.getElementById("CuarentaNueve").style.backgroundColor = "blue";
    }

    if (document.getElementById("Cincuenta").style.backgroundColor === "green") {
        document.getElementById("Cincuenta").style.backgroundColor = "blue";
    }

}

function bloquearAsientos() {

    var objAvion = {
        idItinerario: codigoItinerario,
        type: "listSillasDisponibles"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {
            //alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                if (data.length > 0) {
                    for (f = 0; f < data.length; f++) {
                        switch (parseInt(data[f].numero_silla)) {
                            case 1:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Uno").style.backgroundColor = "red";
                                    document.getElementById("Uno").disabled = true;
                                }
                                break;
                            case 2:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Dos").style.backgroundColor = "red";
                                    document.getElementById("Dos").disabled = true;
                                }
                                break;
                            case 3:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Tres").style.backgroundColor = "red";
                                    document.getElementById("Tres").disabled = true;
                                }
                                break;
                            case 4:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Cuatro").style.backgroundColor = "red";
                                    document.getElementById("Cuatro").disabled = true;
                                }
                                break;
                            case 5:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Cinco").style.backgroundColor = "red";
                                    document.getElementById("Cinco").disabled = true;
                                }
                                break;
                            case 6:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Seis").style.backgroundColor = "red";
                                    document.getElementById("Seis").disabled = true;
                                }
                                break;
                            case 7:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Siete").style.backgroundColor = "red";
                                    document.getElementById("Siete").disabled = true;
                                }
                                break;
                            case 8:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Ocho").style.backgroundColor = "red";
                                    document.getElementById("Ocho").disabled = true;
                                }
                                break;
                            case 9:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Nueve").style.backgroundColor = "red";
                                    document.getElementById("Nueve").disabled = true;
                                }
                                break;
                            case 10:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Diez").style.backgroundColor = "red";
                                    document.getElementById("Diez").disabled = true;
                                }
                                break;
                            case 11:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Once").style.backgroundColor = "red";
                                    document.getElementById("Once").disabled = true;
                                }
                                break;
                            case 12:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Doce").style.backgroundColor = "red";
                                    document.getElementById("Doce").disabled = true;
                                }
                                break;
                            case 13:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Trece").style.backgroundColor = "red";
                                    document.getElementById("Trece").disabled = true;
                                }
                                break;
                            case 14:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Catorce").style.backgroundColor = "red";
                                    document.getElementById("Catorce").disabled = true;
                                }
                                break;
                            case 15:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Quince").style.backgroundColor = "red";
                                    document.getElementById("Quince").disabled = true;
                                }
                                break;
                            case 16:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Dieciseis").style.backgroundColor = "red";
                                    document.getElementById("Dieciseis").disabled = true;
                                }
                                break;
                            case 17:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Diecisiete").style.backgroundColor = "red";
                                    document.getElementById("Diecisiete").disabled = true;
                                }
                                break;
                            case 18:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Dieciocho").style.backgroundColor = "red";
                                    document.getElementById("Dieciocho").disabled = true;
                                }
                                break;
                            case 19:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Diecinieve").style.backgroundColor = "red";
                                    document.getElementById("Diecinieve").disabled = true;
                                }
                                break;
                            case 20:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Veinte").style.backgroundColor = "red";
                                    document.getElementById("Veinte").disabled = true;
                                }
                                break;
                            case 21:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiUno").style.backgroundColor = "red";
                                    document.getElementById("VeintiUno").disabled = true;
                                }
                                break;
                            case 22:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiDos").style.backgroundColor = "red";
                                    document.getElementById("VeintiDos").disabled = true;
                                }
                                break;
                            case 23:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiTres").style.backgroundColor = "red";
                                    document.getElementById("VeintiTres").disabled = true;
                                }
                                break;
                            case 24:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiCuatro").style.backgroundColor = "red";
                                    document.getElementById("VeintiCuatro").disabled = true;
                                }
                                break;
                            case 25:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiCinco").style.backgroundColor = "red";
                                    document.getElementById("VeintiCinco").disabled = true;
                                }
                                break;
                            case 26:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("veintiSeis").style.backgroundColor = "red";
                                    document.getElementById("veintiSeis").disabled = true;
                                }
                                break;
                            case 27:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiSiete").style.backgroundColor = "red";
                                    document.getElementById("VeintiSiete").disabled = true;
                                }
                                break;
                            case 28:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiOcho").style.backgroundColor = "red";
                                    document.getElementById("VeintiOcho").disabled = true;
                                }
                                break;
                            case 29:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("VeintiNueve").style.backgroundColor = "red";
                                    document.getElementById("VeintiNueve").disabled = true;
                                }
                                break;
                            case 30:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Treinta").style.backgroundColor = "red";
                                    document.getElementById("Treinta").disabled = true;
                                }
                                break;
                            case 31:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaUno").style.backgroundColor = "red";
                                    document.getElementById("TreintaUno").disabled = true;
                                }
                                break;
                            case 32:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaDos").style.backgroundColor = "red";
                                    document.getElementById("TreintaDos").disabled = true;
                                }
                                break;
                            case 33:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaTres").style.backgroundColor = "red";
                                    document.getElementById("TreintaTres").disabled = true;
                                }
                                break;
                            case 34:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaCuatro").style.backgroundColor = "red";
                                    document.getElementById("TreintaCuatro").disabled = true;
                                }
                                break;
                            case 35:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaCinco").style.backgroundColor = "red";
                                    document.getElementById("TreintaCinco").disabled = true;
                                }
                                break;
                            case 36:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaSeis").style.backgroundColor = "red";
                                    document.getElementById("TreintaSeis").disabled = true;
                                }
                                break;
                            case 37:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaSiete").style.backgroundColor = "red";
                                    document.getElementById("TreintaSiete").disabled = true;
                                }
                                break;
                            case 38:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaOcho").style.backgroundColor = "red";
                                    document.getElementById("TreintaOcho").disabled = true;
                                }
                                break;
                            case 39:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("TreintaNueve").style.backgroundColor = "red";
                                    document.getElementById("TreintaNueve").disabled = true;
                                }
                                break;
                            case 40:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Cuarenta").style.backgroundColor = "red";
                                    document.getElementById("Cuarenta").disabled = true;
                                }
                                break;
                            case 41:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaUno").style.backgroundColor = "red";
                                    document.getElementById("CuarentaUno").disabled = true;
                                }
                                break;
                            case 42:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaDos").style.backgroundColor = "red";
                                    document.getElementById("CuarentaDos").disabled = true;
                                }
                                break;
                            case 43:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaTres").style.backgroundColor = "red";
                                    document.getElementById("CuarentaTres").disabled = true;
                                }
                                break;
                            case 44:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaCuatro").style.backgroundColor = "red";
                                    document.getElementById("CuarentaCuatro").disabled = true;
                                }
                                break;
                            case 45:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaCinco").style.backgroundColor = "red";
                                    document.getElementById("CuarentaCinco").disabled = true;
                                }
                                break;
                            case 46:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaSeis").style.backgroundColor = "red";
                                    document.getElementById("CuarentaSeis").disabled = true;
                                }
                                break;
                            case 47:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaSiete").style.backgroundColor = "red";
                                    document.getElementById("CuarentaSiete").disabled = true;
                                }
                                break;
                            case 48:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaOcho").style.backgroundColor = "red";
                                    document.getElementById("CuarentaOcho").disabled = true;
                                }
                                break;
                            case 49:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("CuarentaNueve").style.backgroundColor = "red";
                                    document.getElementById("CuarentaNueve").disabled = true;
                                }
                                break;
                            case 50:
                                if (data[f].estado !== "disponible") {
                                    document.getElementById("Cincuenta").style.backgroundColor = "red";
                                    document.getElementById("Cincuenta").disabled = true;
                                }
                                break;
                            default:
                                
                        }
                    }
                } else {

                    alert("Error al realizar la consulta");

                }



            } else {
                alert("No se han encontrado las sillas");
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}


function uno() {
    buscarSilla(1);
    //document.getElementById("Uno").style.backgroundColor= "red";
}


function dos() {
    buscarSilla(2);
}

function tres() {
    buscarSilla(3);
}
function cuatro() {
    buscarSilla(4);
}
function cinco() {
    buscarSilla(5);
}
function seis() {
    buscarSilla(6);
}
function siete() {
    buscarSilla(7);
}
function ocho() {
    buscarSilla(8);
}
function nueve() {
    buscarSilla(9);
}
function diez() {
    buscarSilla(10);
}
function once() {
    buscarSilla(11);
}
function doce() {
    buscarSilla(12);
}
function trece() {
    buscarSilla(13);
}
function catorce() {
    buscarSilla(14);
}
function quince() {
    buscarSilla(15);
}
function dieciseis() {
    buscarSilla(16);
}
function diecisiete() {
    buscarSilla(17);
}
function dieciocho() {
    buscarSilla(18);
}
function diecinieve() {
    buscarSilla(19);
}
function veinte() {
    buscarSilla(20);
}
function veintiUno() {
    buscarSilla(21);
}
function veintiDos() {
    buscarSilla(22);
}
function veintiTres() {
    buscarSilla(23);
}
function veintiCuatro() {
    buscarSilla(24);
}
function veintiCinco() {
    buscarSilla(25);
}
function veintiSeis() {
    buscarSilla(26);
}
function veintiSiete() {
    buscarSilla(27);
}
function veintiOcho() {
    buscarSilla(28);
}
function veintiNueve() {
    buscarSilla(29);
}
function treinta() {
    buscarSilla(30);
}
function treintaUno() {
    buscarSilla(31);
}
function treintaDos() {
    buscarSilla(32);
}
function treintaTres() {
    buscarSilla(33);
}
function treintaCuatro() {
    buscarSilla(34);
}
function treintaCinco() {
    buscarSilla(35);
}
function treintaSeis() {
    buscarSilla(36);
}
function treintaSiete() {
    buscarSilla(37);
}
function treintaOcho() {
    buscarSilla(38);
}
function treintaNueve() {
    buscarSilla(39);
}
function cuarenta() {
    buscarSilla(40);
}
function cuarentaUno() {
    buscarSilla(41);
}
function cuarentaDos() {
    buscarSilla(42);
}
function cuarentaTres() {
    buscarSilla(43);
}
function cuarentaCuatro() {
    buscarSilla(44);
}
function cuarentaCinco() {
    buscarSilla(45);
}
function cuarentaSeis() {
    buscarSilla(46);
}
function cuarentaSiete() {
    buscarSilla(47);
}
function cuarentaOcho() {
    buscarSilla(48);
}
function cuarentaNueve() {
    buscarSilla(49);
}
function cincuenta() {
    buscarSilla(50);
}

/**
 *Función utilizada para guardar un Pasagero
 */
function RegistrarPasajero() {

    let objPasajero = {

        idPasajero: $("#txtIdPasajero").val(),
        nombre: $("#txtNombre").val(),
        apellido: $("#txtApellido").val(),
        cedula: $("#txtCedula").val(),
        correo: $("#txtCorreo").val(),
        telefono: $("#txtTelefono").val(),
        contrasena: $("#txtContrasena").val(),
        type: ""
    };
    if (objPasajero.idPasajero !== "") {
        alert("No se puede guardar, ya que buscó antes un avión. oprima el botón cancelar y luego intente nuevamente.")
    } else {
        objPasajero.type = 'guardar';
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (data) {
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se ha registrado con éxito");
                    LimpiarText();
                } else if (info.res === "False") {
                    alert(info.msj)
                } else {
                    alert("Transacción fallida, Este usuario ya está registrado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }

}

/**
 *funcion utilizada para limpiar los inputs
 */
function LimpiarText() {
    $("#txtIdPasajero").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCedula").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
    $("#txtContrasena").val("");
    $("#txtDescripcion").val("");

}
