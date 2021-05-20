$(document).ready(function () {
    $("#btnRegistrar").click(RegistrarPasajero);
    datosRequeridos();
    $("#btnValidarDatos").click(validarDatosPersona);
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

let codigoItinerario;
function datosRequeridos(){
    codigoItinerario=$("#txtIdItinerarioVuelo").val();
    let btnReserva = document.getElementById("btnReservar");
    let btnSeleccionarSilla = document.getElementById("btnSeleccionarSilla");
    btnReserva.disabled =true;
    btnSeleccionarSilla.disabled =true;
    bloquearAsientos();
}

function buscarSilla(numSilla){

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
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}



function validarDatosPersona(){

    var objAvion = {
        correo: $("#txtCorreoSilla").val(),
        contrasena: $("#txtContrasenaSilla").val(),
        type: "buscarPersona"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionSilla.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {
            alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {

                $("#txtCorreoSilla").val(data[0].correo);
                $("#txtContrasenaSilla").val(data[0].contrasena);
                $("#txtIdPersona").val(data[0].id);
                alert("Se encontró el pasajero")

            } else {
                alert("No se encontró a el pasajero");
                $("#txtIdPersona").val(-1);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}


function bloquearAsientos(){

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
            alert(res);
            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                if (data.length > 0) {
                    for (f = 0; f < data.length; f++) {
                        switch (parseInt(data[f].numero_silla)) {
                            case 1:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Uno").style.backgroundColor= "red";
                                    document.getElementById("Uno").disabled=true;
                                }
                                break;
                            case 2:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Dos").style.backgroundColor= "red";
                                    document.getElementById("Dos").disabled=true;
                                }
                                break;
                            case 3:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Tres").style.backgroundColor= "red";
                                    document.getElementById("Tres").disabled=true;
                                }
                                break;
                            case 4:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Cuatro").style.backgroundColor= "red";
                                    document.getElementById("Cuatro").disabled=true;
                                }
                                break;
                            case 5:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Cinco").style.backgroundColor= "red";
                                    document.getElementById("Cinco").disabled=true;
                                }
                                break;
                            case 6:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Seis").style.backgroundColor= "red";
                                    document.getElementById("Seis").disabled=true;
                                }
                                break;
                            case 7:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Siete").style.backgroundColor= "red";
                                    document.getElementById("Siete").disabled=true;
                                }
                                break;
                            case 8:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Ocho").style.backgroundColor= "red";
                                    document.getElementById("Ocho").disabled=true;
                                }
                                break;
                            case 9:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Nueve").style.backgroundColor= "red";
                                    document.getElementById("Nueve").disabled=true;
                                }
                                break;
                            case 10:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Diez").style.backgroundColor= "red";
                                    document.getElementById("Diez").disabled=true;
                                }
                                break;
                            case 11:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Once").style.backgroundColor= "red";
                                    document.getElementById("Once").disabled=true;
                                }
                                break;
                            case 12:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Doce").style.backgroundColor= "red";
                                    document.getElementById("Doce").disabled=true;
                                }
                                break;
                            case 13:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Trece").style.backgroundColor= "red";
                                    document.getElementById("Trece").disabled=true;
                                }
                                break;
                            case 14:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Catorce").style.backgroundColor= "red";
                                    document.getElementById("Catorce").disabled=true;
                                }
                                break;
                            case 15:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Quince").style.backgroundColor= "red";
                                    document.getElementById("Quince").disabled=true;
                                }
                                break;
                            case 16:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Dieciseis").style.backgroundColor= "red";
                                    document.getElementById("Dieciseis").disabled=true;
                                }
                                break;
                            case 17:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Diecisiete").style.backgroundColor= "red";
                                    document.getElementById("Diecisiete").disabled=true;
                                }
                                break;
                            case 18:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Dieciocho").style.backgroundColor= "red";
                                    document.getElementById("Dieciocho").disabled=true;
                                }
                                break;
                            case 19:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Diecinieve").style.backgroundColor= "red";
                                    document.getElementById("Diecinieve").disabled=true;
                                }
                                break;
                            case 20:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Veinte").style.backgroundColor= "red";
                                    document.getElementById("Veinte").disabled=true;
                                }
                                break;
                            case 21:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiUno").style.backgroundColor= "red";
                                    document.getElementById("VeintiUno").disabled=true;
                                }
                                break;
                            case 22:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiDos").style.backgroundColor= "red";
                                    document.getElementById("VeintiDos").disabled=true;
                                }
                                break;
                            case 23:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiTres").style.backgroundColor= "red";
                                    document.getElementById("VeintiTres").disabled=true;
                                }
                                break;
                            case 24:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiCuatro").style.backgroundColor= "red";
                                    document.getElementById("VeintiCuatro").disabled=true;
                                }
                                break;
                            case 25:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiCinco").style.backgroundColor= "red";
                                    document.getElementById("VeintiCinco").disabled=true;
                                }
                                break;
                            case 26:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("veintiSeis").style.backgroundColor= "red";
                                    document.getElementById("veintiSeis").disabled=true;
                                }
                                break;
                            case 27:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiSiete").style.backgroundColor= "red";
                                    document.getElementById("VeintiSiete").disabled=true;
                                }
                                break;
                            case 28:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiOcho").style.backgroundColor= "red";
                                    document.getElementById("VeintiOcho").disabled=true;
                                }
                                break;
                            case 29:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("VeintiNueve").style.backgroundColor= "red";
                                    document.getElementById("VeintiNueve").disabled=true;
                                }
                                break;
                            case 30:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Treinta").style.backgroundColor= "red";
                                    document.getElementById("Treinta").disabled=true;
                                }
                                break;
                            case 31:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaUno").style.backgroundColor= "red";
                                    document.getElementById("TreintaUno").disabled=true;
                                }
                                break;
                            case 32:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaDos").style.backgroundColor= "red";
                                    document.getElementById("TreintaDos").disabled=true;
                                }
                                break;
                            case 33:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaTres").style.backgroundColor= "red";
                                    document.getElementById("TreintaTres").disabled=true;
                                }
                                break;
                            case 34:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaCuatro").style.backgroundColor= "red";
                                    document.getElementById("TreintaCuatro").disabled=true;
                                }
                                break;
                            case 35:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaCinco").style.backgroundColor= "red";
                                    document.getElementById("TreintaCinco").disabled=true;
                                }
                                break;
                            case 36:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaSeis").style.backgroundColor= "red";
                                    document.getElementById("TreintaSeis").disabled=true;
                                }
                                break;
                            case 37:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaSiete").style.backgroundColor= "red";
                                    document.getElementById("TreintaSiete").disabled=true;
                                }
                                break;
                            case 38:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaOcho").style.backgroundColor= "red";
                                    document.getElementById("TreintaOcho").disabled=true;
                                }
                                break;
                            case 39:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("TreintaNueve").style.backgroundColor= "red";
                                    document.getElementById("TreintaNueve").disabled=true;
                                }
                                break;
                            case 40:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Cuarenta").style.backgroundColor= "red";
                                    document.getElementById("Cuarenta").disabled=true;
                                }
                                break;
                            case 41:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaUno").style.backgroundColor= "red";
                                    document.getElementById("CuarentaUno").disabled=true;
                                }
                                break;
                            case 42:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaDos").style.backgroundColor= "red";
                                    document.getElementById("CuarentaDos").disabled=true;
                                }
                                break;
                            case 43:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaTres").style.backgroundColor= "red";
                                    document.getElementById("CuarentaTres").disabled=true;
                                }
                                break;
                            case 44:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaCuatro").style.backgroundColor= "red";
                                    document.getElementById("CuarentaCuatro").disabled=true;
                                }
                                break;
                            case 45:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaCinco").style.backgroundColor= "red";
                                    document.getElementById("CuarentaCinco").disabled=true;
                                }
                                break;
                            case 46:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaSeis").style.backgroundColor= "red";
                                    document.getElementById("CuarentaSeis").disabled=true;
                                }
                                break;
                            case 47:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaSiete").style.backgroundColor= "red";
                                    document.getElementById("CuarentaSiete").disabled=true;
                                }
                                break;
                            case 48:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaOcho").style.backgroundColor= "red";
                                    document.getElementById("CuarentaOcho").disabled=true;
                                }
                                break;
                            case 49:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("CuarentaNueve").style.backgroundColor= "red";
                                    document.getElementById("CuarentaNueve").disabled=true;
                                }
                                break;
                            case 50:
                                if(data[f].estado!=="disponible"){
                                    document.getElementById("Cincuenta").style.backgroundColor= "red";
                                    document.getElementById("Cincuenta").disabled=true;
                                }
                                break;
                            default:
                                alert("Hola mundo")
                        }
                    }
                }else {

                        alert("Error al realizar la consulta");

                }



            } else {
                alert("No se han encotrado las sillas");
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
        alert("No se puede guardar, ya que buscó antes un avion. oprima el boton cancelar y luego intente nuevamente.")
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
                    alert("Se ha registrado con exito");
                    LimpiarText();
                } else if (info.res === "False") {
                    alert(info.msj)
                } else {
                    alert("Transacción fallida, Este usuario ya esta registrado");
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
