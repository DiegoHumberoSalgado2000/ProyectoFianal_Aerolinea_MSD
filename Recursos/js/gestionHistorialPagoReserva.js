/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    listaHistorialPagoReserva();
});

function listaHistorialPagoReserva() {
    $.ajax({
        
        type: 'post',
        url:"../Controlador/gestionHistorialPagoReserva.php",
        beforeSend: function () {

        },
        data:{type: 'list'},
        success: function (respuesta) {
            var res= JSON.parse(respuesta);
            var info=JSON.parse(res.data);

            var lista="";

            if(info.length>0) {
                for( f=0;f<info.length;f++){
                    lista = lista + "<tr>";
                    lista=lista+"<td>"+info[f].codigo+ "</td>";
                    lista=lista+"<td>"+info[f].nombres+ "</td>";
                    lista = lista + "<td>" + info[f].apellidos + "</td>";
                    lista = lista + "<td>" + info[f].telefono_celular + "</td>";
                    lista = lista + "<td>" + info[f].correo + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "<td>" + info[f].precioSilla + "</td>";
                    lista = lista + "<td>" + info[f].precioVuelo + "</td>";
                    lista = lista + "<td>" + info[f].total_pagar + "</td>";
                    lista = lista + "<td>" + info[f].targeta_credito + "</td>";
                    lista = lista + "<td>" + info[f].tipo_vuelo + "</td>";
                    lista = lista + "</tr>";
              }
              $("#ListaHistorialPagoReserva").html(lista);
            }else{
                $("#ListaHistorialPagoReserva").html("<b>No se encuentra información</b>");
            }
        },
        error:function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
    
}


