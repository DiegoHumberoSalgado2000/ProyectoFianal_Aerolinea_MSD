$(document).ready(function () {
    cargarDatos();
    $("#btnGuardar").click(guardarVuelo);
    $("#btnBuscar").click(buscarVuelo);
    $("#btnModificar").click(modificarVuelo);
    $("#btnEliminar").click(eliminarVuelo);
    $("#btnCancelar").click(cancelar);
    cancelar();
});



/**
 *Función utilizada para listar los vuelos con el estado en disponible
 */
function listarVuelo(){
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionVuelo.php",
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
                    lista = lista + "<td>" + info[f].tipo_vuelo + "</td>";
                    lista = lista + "<td>" + info[f].nombreavion + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "</tr>";
                }

                $("#ListaVuelo").html(lista);

            } else {
                $("#ListaVuelo").html("<b>No se encuentra información</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

/**
 *Función utilizada para guardar un vuelo
 */
function guardarVuelo() {
 
        let objVuelo = {
            idVuelo:$("#txtIdVuelo").val(),
            descripcion: $("#txtDescripcion").val(),
            tipovuelo: $("#selTipoVuelo").val(),
            idAvion: $("#selAvion").val(),
            type: ""


        };


        if (objVuelo.idVuelo !== "") {
            alert("No se puede guardar, ya que buscó antes un Vuelo. oprima el botón cancelar y luego intente nuevamente.")
        } else {
            objVuelo.type = 'guardar';
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionVuelo.php",
            beforeSend: function () {

            },
            data: objVuelo,
            success: function (data) {

                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Transacción exitosa");
                    listarVuelo();
                    cancelar();
                } else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Transacción fallida, verifique que el avión no se encuentre registrada");
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
 *Función utilizada para modificar un vuelo
 */
function modificarVuelo() {
 
    let objVuelo = {
        idVuelo:$("#txtIdVuelo").val(),
        descripcion: $("#txtDescripcion").val(),
        tipovuelo: $("#selTipoVuelo").val(),
        idAvion: $("#selAvion").val(),
        type: ""


    };


    if (objVuelo.idVuelo !== "") {
        objVuelo.type = 'modificar';
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionVuelo.php",
        beforeSend: function () {

        },
        data: objVuelo,
        success: function (data) {

            var info = JSON.parse(data);

            if (info.res === "Success") {
                alert("Transacción exitosa");
                listarVuelo();
                cancelar();
            } else if(info.res === "False"){
                alert(info.msj)
            }else{
                alert("Transacción fallida, verifique que el avión se encuentre registrado");
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
 *función utilizada para buscar un vuelo
 */
function buscarVuelo(){

    var objVuelo = {
        
        idAvion:$("#selAvion").val(),
        type: "buscar" 
    };

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionVuelo.php",
        beforeSend: function () {

        },
        data: objVuelo,
        success: function (res) {

            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                /**alert(data[0].id+ data[0].descripcion+ data[0].placa+ data[0].id_color+data[0].id_marca)*/
                $("#txtIdVuelo").val(data[0].id);
                $("#selTipoVuelo").val(data[0].tipo_vuelo);
                $("#selAvion").val(data[0].id_avion);
                $("#txtDescripcion").val(data[0].descripcion);
                

                
                let btnGuardar = document.getElementById("btnGuardar");
                let btnModificar = document.getElementById("btnModificar");
                let btnEliminar = document.getElementById("btnEliminar");
                let selAvion = document.getElementById("selAvion");
                selAvion.disabled=true;
                btnGuardar.disabled =true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;


            } else {
                alert("No se encuentra el vuelo");
                limpiar();
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

/**
 *funcion utilizada para eliminar un vuelo, en este caso actualizar el estado a no disponible.
 */
function eliminarVuelo() {

    var objVuelo = {
        idVuelo:$("#txtIdVuelo").val(),
        type: "eliminar"
    };

    if (confirm("Esta seguro")) {


        $.ajax({
            type: 'post',
            url: "../Controlador/gestionVuelo.php",
            beforeSend: function () {

            },
            data: objVuelo,
            success: function (res) {
                var info = JSON.parse(res);

                if (info.res === "Success") {
                    alert("Eliminado con éxito");
                    listarVuelo();
                    cancelar();
                } else {
                    alert("No se ha eliminado, Antes de eliminar el vuelo hay que buscarlo.");
                }


            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }else{
        alert("Vale")
    }
}
/**
 *función utilizada para cargar los select
 */
function cargarDatos(){
    cargarAvion();
    listarVuelo();
}
/**
 *función utilizada para cargar el select de Avion
 */
function cargarAvion() {

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionVuelo.php",
        beforeSend: function () {
        },
        data: {type: "listAvion"},
        success: function (res) {
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("selAvion");

            //Limpiar select
            while (select.length > 1) {
                select.remove(select.length - 1);
            }

            //Se llena el select
            if (data.length > 0) {
                let opt = null;
                for (var i = 0; i < data.length; i++) {
                    opt = new Option(data[i].placa, data[i].id);
                    select.options[select.length] = opt;
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}
/**
 *función utilizada para limpiar los inputs y habilitar los botones y inputs.
 */
function cancelar(){
    limpiar();
    deshabilitarBotones();

}
/**
 *función utilizada para habilitar los botones y inputs
 */
function deshabilitarBotones(){
    let btnGuardar = document.getElementById("btnGuardar");
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");
    let selAvion = document.getElementById("selAvion");
    selAvion.disabled=false;
    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
}
/**
 *funcion utilizada para limpiar los inputs
 */
function limpiar(){
    $("#txtIdVuelo").val("");
    $("#txtDescripcion").val("");
    $("#selAvion").val("-1");
    $("#selTipoVuelo").val("-1");


}



