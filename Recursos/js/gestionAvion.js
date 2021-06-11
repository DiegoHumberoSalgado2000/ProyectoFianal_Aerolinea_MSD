
$(document).ready(function () {

    cargarDatos();
    $("#btnBuscar").click(buscarAvion);
    $("#btnGuardar").click(validarDatos);
    $("#btnCancelar").click(cancelar);
    $("#btnModificar").click(modificarAvion);
    $("#btnEliminar").click(eliminarAvion);

    cancelar();
});
/**
 *Función utilizada para listar los aviones con el estado en disponible
 */

var color;

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
                    lista = lista + "<td>" + info[f].nombreMarca + "</td>";
                    lista = lista + "<td>" + info[f].nombreColor + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "</tr>";
                }

                $("#tablaListaAviones").html(lista);

            } else {
                $("#tablaListaAviones").html("<b>No se encuentra informacion</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}


/**
 *Función utilizada para guardar un avion
 */
function guardarAvion(cantidad) {

        let objAvion = {
            idFabricanteSel:$("#selFabricante").val(),
            idAvion:$("#txtIdAvion").val(),
            descripcion: $("#txtDescripcion").val(),
            placa: $("#txtPlaca").val(),
            idColor: $("#selColor").val(),
            idMarca: $("#selMarca").val(),
            type: ""


        };
        if(cantidad>19){
            alert("Hay 20 aviones registrados, no puede registrar más")
        }else{

        if (objAvion.idAvion !== "") {
            alert("No se puede guardar, ya que buscó antes un avión. oprima el botón cancelar y luego intente nuevamente.")
        } else {
            objAvion.type = 'guardar';
            $.ajax({
                type: 'post',
                url: "../Controlador/gestionAvion.php",
                beforeSend: function () {

                },
                data: objAvion,
                success: function (data) {

                //alert(data);
                //alert(typeof data);
                //alert(data.length);

                var info = JSON.parse(data);
                    if (info.res === "Success") {
                        alert("Transacción exitosa");
                        listarAvion();
                        cancelar();
                    } else if(info.res === "False"){
                        alert(info.msj)
                    }else{
                        alert("Transacción fallida, verifique que la placa no se encuentre registrada");
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                    alert("Verifique la ruta del archivo");
                }
            });
        }
    }


}

function validarDatos(){
    validarCantidad();
}

function validarCantidad() {

    return $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {
        },
        data: {type: "validarCantidad"},
        success: function (res) {
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);
            var cantidad=0;
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    cantidad = data[i].cantidad;
                }
            }
            guardarAvion(cantidad);
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}





/**
 *Función utilizada para modificar un avión
 */
function modificarAvion() {

    let objAvion = {
        idFabricanteSel:$("#selFabricante").val(),
        idAvion:$("#txtIdAvion").val(),
        descripcion: $("#txtDescripcion").val(),
        placa: $("#txtPlaca").val(),
        idColor: $("#selColor").val(),
        idMarca: $("#selMarca").val(),
        type: ""


    };


    if (objAvion.idAvion !== "") {
        objAvion.type = 'modificar';
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: objAvion,
            success: function (data) {

                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Modificado con exito");
                    listarAvion();
                    cancelar();
                } else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Error al modificar, no ha modificado datos. Si desea modificar, modifique algún dato");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    } else {
        alert("Para modificar un avión antes hay que buscarlo");
    }



}
/**
 *función utilizada para buscar un avion
 */

function buscarAvion(){

    var objAvion = {
        placa: $("#txtPlaca").val(),
        type: "buscar"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {

            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                /**alert(data[0].id+ data[0].descripcion+ data[0].placa+ data[0].id_color+data[0].id_marca)*/
                $("#txtIdAvion").val(data[0].id);
                $("#txtPlaca").val(data[0].placa);
                $("#selColor").val(data[0].id_color);
                $("#txtDescripcion").val(data[0].descripcion);
                buscarFabriantePorIdMarca(data[0].id_marca);

                /** $("#selMarca").val(data[0].id_marca);*/
                let btnGuardar = document.getElementById("btnGuardar");
                let btnModificar = document.getElementById("btnModificar");
                let btnEliminar = document.getElementById("btnEliminar");
                let txtPlaca = document.getElementById("txtPlaca");
                txtPlaca.disabled=true;
                btnGuardar.disabled =true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;


            } else {
                alert("No se encuentra el avión");
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
 *funcion utilizada para eliminar un avión, en este caso actualizar el estado a no disponible.
 */
function eliminarAvion() {

    var objAvion = {
        idAvion: $("#txtIdAvion").val(),
        type: "eliminar"
    };

    if (confirm("Esta seguro")) {


        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: objAvion,
            success: function (res) {
                var info = JSON.parse(res);

                if (info.res === "Success") {
                    alert("Eliminado con exito");
                    listarAvion();
                    cancelar();
                } else {
                    alert("No se ha eliminado, Antes de eliminar el avión hay que buscarlo.");
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
 *función utilizada para limpiar los inputs y habilitar los botones y inputs.
 */
function cancelar(){
    limpiar();
    habilitar();

}
/**
 *función utilizada para habilitar los botones y inputs
 */
function habilitar(){
    let btnGuardar = document.getElementById("btnGuardar");
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");
    let txtPlaca = document.getElementById("txtPlaca");
    txtPlaca.disabled=false;
    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
}

/**
 *funcion utilizada para limpiar los inputs
 */
function limpiar(){
    $("#txtIdAvion").val("");
    $("#txtDescripcion").val("");
    $("#txtPlaca").val("");
    let select = document.getElementById("selMarca");
    //Limpiar select
    while (select.length > 1) {
        select.remove(select.length - 1);
    }
    $("#selFabricante").val("-1");
    $("#selColor").val("-1");


}
/**
 *función utilizada para cargar los select
 */
function cargarDatos(){
    listarAvion();
    cargarColor();
    cargarFabricante();
    $("#selFabricante").change(cargarMarca);
    $("#selMarca").change(vldMarca);

}
/**
 *función utilizada para cargar el select de color
 */
function cargarColor() {

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {
        },
        data: {type: "listColor"},
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
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}
/**
 *función utilizada para cargar el select de los fabricantes
 */
function cargarFabricante() {

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {
        },
        data: {type: "listFabricante"},
        success: function (res) {
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("selFabricante");

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
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

/**
 *función utilizada para validar cuando el ususario selecciona 'seleccione' en un select
 */
function vldMarca() {
    let idMarca = $("#selMarca").val();

    if (idMarca === "-1") {
        alert("Por favor, seleccione una marca valida 😉");
    }

}


/**
 *función utilizada para cargar todas las marcas que le pertenecen a un fabricante y posteriormente seleccionar la marca.
 * @param {*} idFabricante , para cargar todas las marcas que le pertenecen a ese id Fabricante.
 * @param {*} idMarca , para seleccionar la marca.
 */
function crMarca(idFabricante,idMarca) {


        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: {type: "listMarca", idFabricanteSel: idFabricante},
            success: function (res) {

                let info = JSON.parse(res);
                let data = JSON.parse(info.data);


                let select = document.getElementById("selMarca");

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

                $("#selMarca").val(idMarca);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });

}

/**
 *función utilizada para cargar las marcas en un select.
 */
function cargarMarca() {

    let idFabricante = $("#selFabricante").val();

    if (idFabricante !== "-1") {

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: {type: "listMarca", idFabricanteSel: idFabricante},
            success: function (res) {

                let info = JSON.parse(res);
                let data = JSON.parse(info.data);


                let select = document.getElementById("selMarca");

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
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }else{
        alert("Por favor, seleccione un fabricante válido");
    }
}



/**
 *función utilizada para buscar un fabricante por el id de la marca.
 * @param {*} id id de la marca.
 */
function buscarFabriantePorIdMarca(id){
    var objAvion = {
        idMarca:id,
        type: "buscarFabricantePorMarca"
            };
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionAvion.php",
        beforeSend: function () {

        },
        data: objAvion,
        success: function (res) {

            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            if (data.length > 0) {
                $("#selFabricante").val(data[0].id);
                crMarca(data[0].id,id);

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });

}
