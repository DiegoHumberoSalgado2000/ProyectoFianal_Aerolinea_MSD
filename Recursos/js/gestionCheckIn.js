$(document).ready(function(){

    $("#btnIngresarCheckIn").click(buscarCheckIn);
   
    
});

function Encrypt(word, key = '1239873697412580') {
    let encJson = CryptoJS.AES.encrypt(JSON.stringify(word), key).toString()
    let encData = CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(encJson))
    return encData
}

function buscarCheckIn(){


    var objCheckin={
        cedula:$("#cedulacheckin").val(),
        codigoReserva:$("#codigoReserva").val(),
        type: "BuscarCheck_in"
    };
    $.ajax({
        type:'post',
        url:"Controlador/gestionCheckIn.php",
        beforeSend:function(){
        },
        data:objCheckin,
        success:function(res){
            var info=JSON.parse(res);

            if(info.res === "False"){
                alert (info.msj);
            }else {
                if(info.msj === "Success"){
                    var encriptado= Encrypt(res);
                    window.location.href='Vista/Mi_Check-in.php?res='+encriptado;

                }else{
                    alert ("No se han encontrado reserva")
                }
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
}


