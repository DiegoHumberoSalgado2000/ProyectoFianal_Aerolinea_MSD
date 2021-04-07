$(document).ready(function (){
    cargarDatos();
    $("#btnGuardarItinerario").click(guardarItinerarioVuelo);
    cancelar();
});

function listarItinearioVuelo() {

    $.ajax({
        type: 'post',
        url: "../Controlador/gestionItinerarioVuelo.php",
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
                    lista = lista + "<td>" + info[f].id_vuelo + "</td>";
                    lista = lista + "<td>" + info[f].id_ubicacion_llegada + "</td>";
                    lista = lista + "<td>" + info[f].id_ubicacion_salida + "</td>";
                    lista = lista + "<td>" + info[f].fecha_llegada + "</td>";
                    lista = lista + "<td>" + info[f].fecha_salida + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "</tr>";
                }

                $("#ListaItinerarioVuelo").html(lista);

            } else {
                $("#ListaItinerarioVuelo").html("<b>No se encuentra informacion</b>");

            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}

function guardarItinerarioVuelo(){
    let objItinerarioVuelo = {
        idItinerarioVuelo:$("#txtIdItinerarioVuelo").val(),
        idVuelo : $("#selUbicacion").val(),
        idUbicacionllegada : $("#CmbUbicacionLlegada").val(),
        idUbicacionsalida : $("#CmbUbicacionSalida").val(),
        fechallegada : $("#DateFechaLlegada").val(),
        fechasalida : $("#DateFechaSalida").val(),
        descripcion : $("#txtDescripcionItinerario").val(),
        type:""
        
    };

    if(objItinerarioVuelo.idItinerarioVuelo!==""){
        alert("No se puede guardar, ya que buscó antes un registro de itinerario. oprima el boton cancelar y luego intente nuevamente.")
    }else{
        objItinerarioVuelo.type='guardar';

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionItinerarioVuelo.php",
            beforeSend: function () {

            },
            data: objItinerarioVuelo,
            success: function (data) {

                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Transacción exitosa");
                    listarItinearioVuelo();
                    cancelar();
                } else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Transacción fallida, verifique que el Vuelo no se encuentre registrada en la misma fecha");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }

}
function cancelar(){
    limpiarformulario();
    habilitarBotones();

}

function habilitarBotones(){
    let btnGuardaritinerario = document.getElementById("btnGuardarItinerario");
    let btnModificaritinerario = document.getElementById("btnModificarItinerario");
    let btnEliminaritinerario = document.getElementById("btnEliminarItinerario");
    let selVuelo=document.getElementById("selUbicacion");
    

    btnModificaritinerario.disabled =true;
    btnEliminaritinerario.disabled =true;
    btnGuardaritinerario.disabled=false;
    selVuelo.disabled=false;
    
}
function limpiarformulario(){
    $("#selUbicacion").val("-1");
    $("#CmbUbicacionLlegada").val("-1");
    $("#CmbUbicacionSalida").val("-1");
    $("#DateFechaLlegada").val("dd/mm/aaaa");
    $("#DateFechaSalida").val("dd/mm/aaaa");
    $("#txtDescripcionItinerario").val("");
}


function cargarDatos(){
    cargarVuelo();
    cargarubicacionLlegada();
    cargarubicacionSalida();
    listarItinearioVuelo();
    
}

function cargarVuelo(){
    $.ajax({
        type:'post',
        url: "../Controlador/gestionItinerarioVuelo.php",
        beforeSend: function(){

        },
        data:{type:"listVuelo"},
        success:function(res){
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("selUbicacion");

            while(select.length >1){
                select.remove(select.length-1);
            }

            if(data.length >0){
                let opt=null;
                for (var i =0 ;i<data.length;i++){
                    opt=new Option(data[i].tipo_vuelo,data[i].id);
                    select.options[select.length]=opt;
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
        

    });
}

function cargarubicacionLlegada(){
    $.ajax({
        type:'post',
        url: "../Controlador/gestionItinerarioVuelo.php",
        beforeSend: function(){

        },
        data:{type:"listUbicacion"},
        success:function(res){
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("CmbUbicacionLlegada");

            while(select.length >1){
                select.remove(select.length-1);
            }

            if(data.length >0){
                let opt=null;
                for (var i =0 ;i<data.length;i++){
                    opt=new Option(data[i].nombre,data[i].id);
                    select.options[select.length]=opt;
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
        

    });
}
function cargarubicacionSalida(){
    $.ajax({
        type:'post',
        url: "../Controlador/gestionItinerarioVuelo.php",
        beforeSend: function(){

        },
        data:{type:"listUbicacion"},
        success:function(res){
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("CmbUbicacionSalida");

            while(select.length >1){
                select.remove(select.length-1);
            }

            if(data.length >0){
                let opt=null;
                for (var i =0 ;i<data.length;i++){
                    opt=new Option(data[i].nombre,data[i].id);
                    select.options[select.length]=opt;
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
        

    });
}

