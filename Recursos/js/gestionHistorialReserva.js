$(document).ready(function () {

    datosRequeridos(correoUsuarioIdentificado);
    listarDatos();



});


var correoUsuarioIdenti;
function datosRequeridos(correoUsuarioIdentificado){

    correoUsuarioIdenti=correoUsuarioIdentificado;
    //alert("Su correo es " +correoUsuarioIdenti);
}



function listarDatos(){
    //alert("Su correo es " +correoUsuarioIdenti);


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionHistorialReserva.php",
        beforeSend: function () {
        },
        data: {type: 'listarHistorialReserva',correo:correoUsuarioIdenti},
        success: function (respuesta) {

            var res = JSON.parse(respuesta);
            var info = JSON.parse(res.data);
/*
* precioVuelo,tipoVuelo,placa,ubicacionSalida,fecha_salida,ubicacionLlegada,fecha_llegada,codigoReserva,estadoReserva,numeroSilla,precioSilla,tipoSilla
*/
            var lista ="";

            if (info.length > 0) {
                for (f = 0; f < info.length; f++) {
                    lista = lista + "<tr>";
                    lista = lista + "<td>" + info[f].codigoReserva + "</td>";
                    lista = lista + "<td>" + info[f].placa+" "+info[f].tipoVuelo + "</td>";
                    lista = lista + "<td>" + info[f].ubicacionSalida + "</td>";
                    lista = lista + "<td>" + info[f].fecha_salida + "</td>";
                    lista = lista + "<td>" + info[f].ubicacionLlegada + "</td>";
                    lista = lista + "<td>" + info[f].fecha_llegada + "</td>";
                    lista = lista + "<td>" + info[f].precioVuelo + "</td>";
                    lista = lista + "<td>" + info[f].numeroSilla + "</td>";
                    lista = lista + "<td>" + info[f].precioSilla + "</td>";
                    lista = lista + "<td>" + info[f].tipoSilla + "</td>";
                    lista = lista + "<td>" + info[f].estadoReserva + "</td>";
                    lista = lista + "</tr>";
                }

                $("#tablaHistorialReserva").html(lista);

            } else {
                $("#tablaHistorialReserva").html("<b>No tiene reservas aún</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}