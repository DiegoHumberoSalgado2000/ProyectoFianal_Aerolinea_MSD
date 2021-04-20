$(document).ready(function (){
    cargarDatos();
    $("#btnGuardarItinerario").click(guardarItinerarioVuelo);
    $("#btnBuscarItinerario").click(buscarItinerarioVuelo);
    $("#btnEliminarItinerario").click(eliminarItinerarioVuelo);
    $("#btnModificarItinerario").click(ModificarItinerarioVuelo);
    $("#btnCancelarItinerario").click(cancelarItinerario);

    
    cancelarItinerario();
});
/**
 * Función utilizada para listar los itinerariosVuelo con el estado disponible
 */
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
                    lista = lista + "<td>" + info[f].vuelo + "</td>";
                    lista = lista + "<td>" + info[f].nombreUbicacionLlegada + "</td>";
                    lista = lista + "<td>" + info[f].nombreUbicacionSalida + "</td>";
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

/**
 * Función utilizada para guardar un ItinerarioVuelo
 */
function guardarItinerarioVuelo(){
    let objItinerarioVuelo = {
        idItinerarioVuelo:$("#txtIdItinerarioVuelo").val(),
        idVuelo : $("#CmbVuelo").val(),
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
                    cancelarItinerario();
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

/**
 * Función utilizada para modificar un ItinerarioVuelo
 */
function ModificarItinerarioVuelo(){
    let objItinerarioVuelo={
        idItinerarioVuelo:$("#txtIdItinerarioVuelo").val(),
        idVuelo : $("#CmbVuelo").val(),
        idUbicacionllegada : $("#CmbUbicacionLlegada").val(),
        idUbicacionsalida : $("#CmbUbicacionSalida").val(),
        fechallegada : $("#DateFechaLlegada").val(),
        fechasalida : $("#DateFechaSalida").val(),
        descripcion : $("#txtDescripcionItinerario").val(),
        type:""

    };

    if(objItinerarioVuelo.idItinerarioVuelo!== ""){
        objItinerarioVuelo.type='modificar';

        $.ajax({
            type:'post',
            url:"../Controlador/gestionItinerarioVuelo.php",
            beforeSend:function(){

            },

            data:objItinerarioVuelo,
            success:function(data){
                var info =JSON.parse(data);

                if(info.res ==="Success"){
                    alert("Modificado con exito");
                    listarItinearioVuelo();
                    cancelarItinerario();
                }else if(info.res === "False"){
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
    }else {
        alert("Para modificar un itinerario antes hay que buscarlo");
    }

}

/**
 * Función utilizada para buscar un ItinerarioVuelo
 */
function buscarItinerarioVuelo(){
    var objItinerarioVuelo={
        idVuelo:$("#CmbVuelo").val(),
        type: "buscar"
    };

    $.ajax({
        type:'post',
        url: "../Controlador/gestionItinerarioVuelo.php",
        beforeSend:function(){

        },

        data:objItinerarioVuelo,
        success:function (res){
            var info=JSON.parse(res);
            var data=JSON.parse(info.data);

            if(info.msj === "Success"){
                $("#txtIdItinerarioVuelo").val(data[0].id);
                $("#CmbVuelo").val(data[0].id_vuelo);
                $("#CmbUbicacionLlegada").val(data[0].id_ubicacion_llegada);
                $("#CmbUbicacionSalida").val(data[0].id_ubicacion_salida);
                $("#DateFechaLlegada").val(data[0].fecha_llegada);
                $("#DateFechaSalida").val(data[0].fecha_salida);
                $("#txtDescripcionItinerario").val(data[0].descripcion);

                let btnGuardar=document.getElementById("btnGuardarItinerario");
                let btnModificar = document.getElementById("btnModificarItinerario");
                let btnEliminar = document.getElementById("btnEliminarItinerario");
                let CmbVuelo = document.getElementById("CmbVuelo");

                CmbVuelo.disabled=true;
                btnGuardar.disabled =true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;
            }else{
                alert("No se encuentra Itinerario");
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
 * Función utilizada para eliminar un ItinerarioVuelo,en este caso actualizar 
 * al estado a no disponible
 */
function eliminarItinerarioVuelo(){
    var objItinerarioVuelo={
        idItinerarioVuelo:$("#txtIdItinerarioVuelo").val(),
        type: "eliminar"
    };

    if(confirm("Esta seguro")){

        $.ajax({
            type:'post',
            url: "../Controlador/gestionItinerarioVuelo.php",
            beforeSend:function(){

            },
            data:objItinerarioVuelo,
            success:function(res){
                var info =JSON.parse(res);

                if(info.res==="Success"){
                    alert("Eliminado con exito");
                    listarItinearioVuelo();
                    cancelarItinerario();
                }else{
                    alert("No se ha eliminado, Antes de eliminar el itinerario hay que buscarlo.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }

        });
    }else{
        alert("Vale");
    }
}
/**
 * Función utilizada para limpiar los inputs y habilitar los botones e inputs
 */
function cancelarItinerario(){
    limpiarformulario();
    habilitarBotones();

}

/**
 * Función utilizada para habilitar los botones e inputs
 */
function habilitarBotones(){
    let btnGuardaritinerario = document.getElementById("btnGuardarItinerario");
    let btnModificaritinerario = document.getElementById("btnModificarItinerario");
    let btnEliminaritinerario = document.getElementById("btnEliminarItinerario");
    let CmbVuelo = document.getElementById("CmbVuelo");
    

    btnModificaritinerario.disabled =true;
    btnEliminaritinerario.disabled =true;
    btnGuardaritinerario.disabled=false;
    CmbVuelo.disabled=false;
    
}

/**
 * Función utilizada para limpiar los inputs
 */
function limpiarformulario(){
    $("#CmbVuelo").val("-1");
    $("#CmbUbicacionLlegada").val("-1");
    $("#CmbUbicacionSalida").val("-1");
    $("#DateFechaLlegada").val("dd/mm/aaaa");
    $("#DateFechaSalida").val("dd/mm/aaaa");
    $("#txtDescripcionItinerario").val("");
}

/**
 * Función utilizada para cargar los select y la lista de los Itinerarios
 */
function cargarDatos(){
    cargarVuelo();
    cargarubicacionLlegada();
    cargarubicacionSalida();
    listarItinearioVuelo();
    
}

/**
 * Función utilizada para cargar el select de Vuelo
 */
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

            let select = document.getElementById("CmbVuelo");

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
/**
 * Función utilizada para cargar el select de las ubicaciones
 */
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
/**
 * Función utilizada para cargar el select de las ubicaciones
 */
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

