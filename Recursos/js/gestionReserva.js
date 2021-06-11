$(document).ready(function () {
cargarDatosReserva();
asignarFechaHoy();
$("#btnBuscarVuelo").click(buscarVueloReserva);

});

function asignarFechaHoy(){
    let hoy=new Date();

    let dia=hoy.getDate();
    let mes=hoy.getMonth()+1;
    let agnio=hoy.getFullYear();

    dia=('0'+dia).slice(-2);
    mes=('0'+mes).slice(-2);


    let formato=`${agnio}-${mes}-${dia}`;// Utilizando una literal de plantilla. yyyy-MM-dd
    document.querySelector("#FechaSalida").value = formato;
    document.querySelector("#FechaLlegada").value = formato;
}





function Encrypt(word, key = '1239873697412580') {
    let encJson = CryptoJS.AES.encrypt(JSON.stringify(word), key).toString()
    let encData = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(encJson))
    return encData
}

function Decrypt(word, key = '1239873697412580') {
    let decData = CryptoJS.enc.Base64.parse(word).toString(CryptoJS.enc.Utf8)
    let bytes = CryptoJS.AES.decrypt(decData, key).toString(CryptoJS.enc.Utf8)
    return JSON.parse(bytes)
}

function buscarVueloReserva(){


    var objReservaItinerario={
        idUbicacionSalida:$("#cmbSalida").val(),
        idUbicacionLlegada:$("#cmdLlegada").val(),
        fechaSalida:$("#FechaSalida").val(),
        fechaLlegada:$("#FechaLlegada").val(),
        type: "buscarVueloReserva"
    };
    $.ajax({
        type:'post',
        url:"Controlador/gestionReserva.php",
        beforeSend:function(){
        },
        data:objReservaItinerario,
        success:function(res){
            var info=JSON.parse(res);

            if(info.res === "False"){
                alert (info.msj);
            }else {
                if(info.msj === "Success"){
                    //alert(res);

                    var encriptado= Encrypt(res);
                    //alert(encriptado);

                    //alert(Decrypt(encriptado));
                    window.location.href='Vista/Lista_Vuelos.php?res='+encriptado;

                }else{
                    alert ("No se han encontrado vuelos")
                }
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
    cargarubicacionSalida();
    $("#cmbSalida").change(cargarubicacionLlegada)
    $("#cmdLlegada").change(vldLlegada);

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

function vldLlegada() {
    let idUbicacionsalida = $("#cmdLlegada").val();
    if (idUbicacionsalida === "-1") {
        alert("Por favor, seleccione una ubicación de llegada válida");
    }

}
/**
 * Función utilizada para cargar el select de las ubicaciones
 */
function cargarubicacionSalida(){
    $.ajax({
        type:'post',
        url: "Controlador/gestionReserva.php",
        beforeSend: function(){
        },
        data:{type:"listUbicacionSalida"},
        success:function(res){
            let info = JSON.parse(res);
            let data = JSON.parse(info.data);
            let select = document.getElementById("cmbSalida");
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
function cargarubicacionLlegada(){

    let idUbicacion=$("#cmbSalida").val();

    if(idUbicacion!=="-1"){
        $.ajax({
            type:'post',
            url:"Controlador/gestionReserva.php",
            beforeSend:function(){
            },
            data:{type:"listUbicacionLlegada",idUbicacionSel:idUbicacion},
            success:function(res){
                let info=JSON.parse(res);
                let data=JSON.parse(info.data);
                let select=document.getElementById("cmdLlegada");
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
        alert("Por favor, seleccione una ubicación de salida");
    }

}