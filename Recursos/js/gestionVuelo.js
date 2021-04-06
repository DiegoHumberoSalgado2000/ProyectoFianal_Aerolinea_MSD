$(document).ready(function () {

    cargarDatos();
    $("#btnGuardar").click(guardarVuelo);
    
});
var resuDescripcion="";
var msjDescripcion="";

var condiResultado="";
var msjResultado="";



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
                    lista = lista + "<td>" + info[f].id_avion + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "</tr>";
                }

                $("#ListaVuelo").html(lista);

            } else {
                $("#ListaVuelo").html("<b>No se encuentra informacion</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

function guardarVuelo() {
    let validar=validarDatos();
    
    if (validar ==true) {
        let objVuelo = {
            idVuelo:$("#txtIdVuelo").val(),
            descripcion: $("#txtDescripcion").val(),
            tipovuelo: $("#selTipoVuelo").val(),
            idAvion: $("#selAvion").val(),
            type: ""


        };


        if (objVuelo.idVuelo !== "") {
            objVuelo.type = 'modificar';
        } else {
            objVuelo.type = 'guardar';
        }

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
function cargarDatos(){
    cargarAvion();
    listarVuelo();
}

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
    $("#txtIdVuelo").val("");
    $("#txtDescripcion").val("");
    $("#selAvion").val("-1");
    $("#selTipoVuelo").val("-1");


}
function validarDatos() {

    let idAvion= $("#selAvion").val();
    let idTipoVuelo= $("#selTipoVuelo").val();


    let condi1=true;
    let condi2=true;
    
    if(idTipoVuelo==-1){
        alert("Seleccione un tipo de vuelo")
        condi1= false;
    }
    if(idAvion==-1){
        alert("Seleccione un Avion")
        condi2= false;
    }
    
    if (condi1==true && condi2==true) {
        return true;
    }else{
        return false;
    }
}

function validarDescripcion() {
    let txtDescripcion = $("#txtDescripcion").val();

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionVuelo.php",
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
