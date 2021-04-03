$(document).ready(function(){

});

function listarEmpleado(){
    $.ajax({
        type: 'post',
        url:"Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type: 'list' },
        success:function(respuesta){
            var res= JSON.parse(respuesta);
            var info=JSON.parse(res.data);

            var lista =""

            if(info.length >0){
                for( f=0;f<info.length;f++){
                    lista = lista + "<tr>";
                    lista = lista + "<td>" + info[f].nombres + "</td>";
                    lista = lista + "<td>" + info[f].apellidos + "</td>";
                    lista = lista + "<td>" + info[f].cedula + "</td>";
                    lista = lista + "<td>" + info[f].correo + "</td>";
                    lista = lista + "<td>" + info[f].telefonoCelular + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "</tr>";

                }
                $("#ListaEmpleados").html(lista);
            }else{
                $("#ListaEmpleados").html("<b>No se encuentra informacion </b>");
            }
        },
        error:function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
}