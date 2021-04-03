
$(document).ready(function () {
    cargarColor();
});

function prueba(){
    alert("Hola mundo");
}


function cargarColor() {
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {

        },
        data: {type: "color"},
        success: function (res) {
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("selColor");

            //Limpiar select
            while (select.length > 1) {
                select.remove(select.length - 1);
            }

            //Se llena el select
            if (data.length > 0) {
                let opt = null;
                for (var i = 0; i < data.length; i++) {
                    opt = new Option(data[i].nombre, data[i].id);
                    select.options[select.length] = opt;
                }
            }
        },
        
    });
}

function listarAvion() {

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {
        },
        data: {type: 'list'},
        success: function (respuesta) {

            var res = JSON.parse(respuesta);
            var info = JSON.parse(res.data);

            var lista ="";

            if (info.length > 0) {
                for (f = 0; f < info.length; f++) {
                    lista = lista + "<tr>";
                    lista = lista + "<td>" + info[f].placa + "</td>";
                    lista = lista + "<td>" + info[f].marca + "</td>";
                    lista = lista + "<td>" + info[f].fabricante + "</td>";
                    lista = lista + "<td>" + info[f].color + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "</tr>";
                }

                $("#ListaAviones").html(lista);

            } else {
                $("#ListaAviones").html("<b>No se encuentra informacion</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}