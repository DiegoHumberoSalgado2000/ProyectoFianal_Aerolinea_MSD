$(document).ready(function () {
    $("#btnRegistrar").click(RegistrarPasajero);
    datosRequeridos();
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
