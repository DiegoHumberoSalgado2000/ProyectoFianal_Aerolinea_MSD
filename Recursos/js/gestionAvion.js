
$(document).ready(function () {

    cargarDatos();
    $("#btnBuscar").click(buscarAvion);
    $("#btnGuardar").click(guardarAvion);
    $("#btnCancelar").click(cancelar);
    $("#btnModificar").click(modificarAvion);
    $("#btnEliminar").click(eliminarAvion);

    cancelar();
});

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
                    lista = lista + "<td>" + info[f].id_marca + "</td>";
                    lista = lista + "<td>" + info[f].id_color + "</td>";
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



function guardarAvion() {

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
            alert("No se puede guardar, ya que buscó antes un avion. oprima el boton cancelar y luego intente nuevamente.")
        } else {
            objAvion.type = 'guardar';
            $.ajax({
                type: 'post',
                url: "../Controlador/gestionAvion.php",
                beforeSend: function () {

                },
                data: objAvion,
                success: function (data) {

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
                    alert("Error al modificar, no ah modificado datos. Si desea modificar, modifique algun dato");
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
                alert("No se encuentra el avion");
                limpiar();
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });


}

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



function cancelar(){
    limpiar();
    habilitar();

}

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

function cargarDatos(){
    listarAvion();
    cargarColor();
    cargarFabricante();
    $("#selFabricante").change(cargarMarca);
    $("#selMarca").change(vldMarca);

}
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


function vldMarca() {
    let idMarca = $("#selMarca").val();

    if (idMarca === "-1") {
        alert("Por favor, seleccione una marca valida 😉");
    }

}


/**
 *
 * @param {*} idFabricante , para cargar todas las marcas.
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
        alert("Por favor, seleccione un fabricante valido :)");
    }
}




function buscarFabriantePorIdMarca( id){
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

