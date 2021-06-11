$(document).ready(function(){

    $("#btnIngresarMiReserva").click(buscarReserva);
    
});

function Encrypt(word, key = '1239873697412580') {
    let encJson = CryptoJS.AES.encrypt(JSON.stringify(word), key).toString()
    let encData = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(encJson))
    return encData
}

function buscarReserva(){


    var objReserva={
        cedula:$("#cedulaMiReserva").val(),
        codigoReserva:$("#codigoMiReserva").val(),
        type: "BuscarMi_Reserva"
    };
    $.ajax({
        type:'post',
        url:"Controlador/gestionMiReserva.php",
        beforeSend:function(){
        },
        data:objReserva,
        success:function(res){
            var info=JSON.parse(res);

            if(info.res === "False"){
                alert (info.msj);
            }else {
                if(info.msj === "Success"){
                    var encriptado= Encrypt(res);
                    window.location.href='Vista/Mi_Reserva.php?res='+encriptado;

                }else{
                    alert("No se han encontrado reserva o su reserva no cumple con el plazo mínimo de 8 días antes del Vuelo")
                }
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}