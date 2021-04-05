
$(document).ready(function () {

    cargarDatos();
    $("#btnBuscar").click(buscarAvion);
    $("#btnGuardar").click(guardarAvion);
    $("#btnCancelar").click(cancelar);
    $("#btnModificar").click(guardarAvion);
    $("#btnEliminar").click(eliminarAvion);

    cancelar();
});

var resulPlaca="";
var msjPlaca="";
var resuDescripcion="";
var msjDescripcion="";

var condiResultado="";
var msjResultado="";


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
    let validar=validarDatos();
    /**var resultado=document.getElementById("txtCondiResultado");
    var msj=document.getElementById("txtMsjResultado");
    */
    if (validar ==true) {
        let objAvion = {
            idAvion:$("#txtIdAvion").val(),
            descripcion: $("#txtDescripcion").val(),
            placa: $("#txtPlaca").val(),
            idColor: $("#selColor").val(),
            idMarca: $("#selMarca").val(),
            type: ""


        };


        if (objAvion.idAvion !== "") {
            objAvion.type = 'modificar';
        } else {
            objAvion.type = 'guardar';
        }

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
                } else {
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
                    alert("No se ha eliminado");
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


function validarDatoss() {
    var datos = {
        descripcion: $("#txtDescripcion").val(),
        placa : $("#txtPlaca").val(),
        idColor : $("#selColor").val(),
        idMarca : $("#selMarca").val(),
        idFabricanteSel: $("#selFabricante").val(),
        type: "validarDatos"
    };

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {
            },
            data:datos,
            success: function (res) {

                let resultado = JSON.parse(res);

                $("#txtCondiResultado").val(resultado.resultado);
                $("#txtMsjResultado").val(resultado.msj);
                /**
                alert(condiResultado)
                alert(msjResultado)
                */

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
}

function cancelar(){
    limpiar();
    deshabilitarBotones();

}

function deshabilitarBotones(){
    let btnGuardar = document.getElementById("btnGuardar");
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");

    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
}


function limpiar(){
    $("#txtId").val("");
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

function validarDatos() {

    let idFabricante = $("#selFabricante").val();
    let idMarca= $("#selMarca").val();
    let idColor= $("#selColor").val();


    let condi1=true;
    let condi2=true;
    let condi3=true;
    let condi4=true;
    let condi5=true;

    if (idFabricante==-1) {
        alert("Seleccione un fabricante.")
        condi1= false;
    }

    if(idMarca==-1){
        alert("Seleccione una marca")
        condi2= false;
    }
    if(idColor==-1){
        alert("Seleccione un color")
        condi3= false;
    }
    validarPlaca();
    if(resulPlaca==="False"||resulPlaca==="" ){
        if(resulPlaca===""){
            alert("Verifique la placa");
            condi4= false;
        }else{
            alert(msjPlaca)
            condi4= false;
        }

    }
    validarDescripcion();
    if (resuDescripcion==="False" || resuDescripcion==="") {
        if(resulPlaca===""){
            alert("Verifique la descripción");
            condi5= false;
        }else{
            alert(msjDescripcion)
            condi5= false;
        }

    }

    if (condi1==true && condi2==true && condi3==true && condi4==true && condi5==true) {
        return true;
    }else{
        return false;
    }



}
function validarPlaca() {
    let txtPlaca = $("#txtPlaca").val();

        $.ajax({
            type: 'get',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: {type: "validarPlaca", placa: txtPlaca},
            success: function (res) {

                let resultado = JSON.parse(res);

                resulPlaca=resultado.resultado;
                msjPlaca=resultado.msj;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
}

function validarDescripcion() {
    let txtDescripcion = $("#txtDescripcion").val();

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: {type: "validarDescripcion", descripcion: txtDescripcion},
            success: function (res) {

                let resultado = JSON.parse(res);

                resuDescripcion=resultado.resultado;
                msjDescripcion=resultado.msj;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
}


