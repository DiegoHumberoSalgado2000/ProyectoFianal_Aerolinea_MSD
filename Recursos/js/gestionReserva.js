$(document).ready(function () {
cargarDatosReserva();
$("#btnBuscarVuelo").click(buscarVueloReserva);

});



function buscarVueloReserva(){


    var objReservaItinerario={
        idUbicacionllegada:$("#CmbOrigen").val(),
        idUbicacionsalida:$("#CmbDestino").val(),
        fechallegada:$("#FechaSalida").val(),
        fechasalida:$("#FechaRegreso").val(),
        type: "buscarVueloReserva"

    };

    $.ajax({
        type:'post',
        url:"Controlador/gestionItinerarioVuelo.php",
        beforeSend:function(){

        },

        data:objReservaItinerario,
        success:function(res){
            var info=JSON.parse(res);
            var arreglo=JSON.parse(info.data);

            if(info.msj === "Success"){

                var lista ="";
                if (arreglo.length > 0) {
                    for (f = 0; f < arreglo.length; f++) {
                        lista = lista + "<tr>";
                        lista = lista + "<td>" + arreglo[f].placa + "</td>";
                        lista = lista + "<td>" + arreglo[f].id_ubicacion_llegada + "</td>";
                        lista = lista + "<td>" + arreglo[f].id_ubicacion_salida + "</td>";
                        lista = lista + "<td>" + arreglo[f].fecha_llegada + "</td>";
                        lista = lista + "<td>" + arreglo[f].fecha_salida + "</td>";
                        lista = lista + "<td>" + arreglo[f].descripcion + "</td>";
                        lista = lista + "</tr>";
                    }


                    window.location.href='Vista/Lista_Vuelos.php?lista='+lista;

                } else {
                    var x="No se encuentra informacion"
                    window.location.href='Vista/Lista_Vuelos.php?lista='+x;
                }



            }else{
                alert("No se encuentra vuelo con esos datos");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
}










function cargarDatosReserva(){
    habilitar();
    cargarubicacionLlegada();
    $("#CmbOrigen").change(cargarubicacionSalida)
    $("#CmbDestino").change(vldorigenSalida);

}


function habilitar(){
    document.getElementById("chk1").onclick = function(){
        if(document.getElementById("FechaRegreso").disabled){
            document.getElementById("FechaRegreso").disabled=false;
        }else{
            document.getElementById("FechaRegreso").disabled=true;
        }
    }
}

function vldorigenSalida() {
    let idUbicacionsalida = $("#CmbOrigen").val();

    if (idUbicacionsalida === "-1") {
        alert("Por favor, seleccione una origen valido 😉");
    }

}
/**
 * Función utilizada para cargar el select de las ubicaciones
 */
 function cargarubicacionLlegada(){
    $.ajax({
        type:'post',
        url: "Controlador/gestionReserva.php",
        beforeSend: function(){

        },
        data:{type:"listUbicacionLLegada"},
        success:function(res){
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);

            let select = document.getElementById("CmbOrigen");

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

    let idUbicacion=$("#CmbOrigen").val();

    if(idUbicacion!=="-1"){

        $.ajax({
            type:'post',
            url:"Controlador/gestionReserva.php",
            beforeSend:function(){

            },
            data:{type:"listUbicacionSalida",idUbicacionSel:idUbicacion},
            success:function(res){
                let info=JSON.parse(res);
                let data=JSON.parse(info.data);

                let select=document.getElementById("CmbDestino");

                //Limpiar select

                while(select.length>1){
                    select.remove(select.length-1);
                }

                //se llena el select

                if(data.length>0){
                    let opt=null;
                    for (var i =0;i<data.length;i++){
                        opt = new Option(data[i].nombre,data[i].id);
                        select.options[select.length]=opt;
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }

        });

    }else{
        alert("Por favor, seleccione una ubicacion de ida");
    }
    
}