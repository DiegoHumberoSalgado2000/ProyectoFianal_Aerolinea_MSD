$(document).ready(function (){
    cargarVuelo();
});

function cargarDatos(){
    cargarVuelo();
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