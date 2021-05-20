$(document).ready(function () {

listarTabla();


});

function listarTabla() {

    var json=$("#txtJson").val();

    var info = JSON.parse(json);

    var arreglo = JSON.parse(info.data);

    if (info.msj === "Success") {
    var lista = "";
    if (arreglo.length > 0) {
        for (f = 0; f < arreglo.length; f++) {
            lista = lista + "<tr>";
            lista = lista + "<td>" + arreglo[f].placa + "</td>";
            lista = lista + "<td>" + arreglo[f].ubicacionSalida + "</td>";
            lista = lista + "<td>" + arreglo[f].fecha_salida + "</td>";
            lista = lista + "<td>" + arreglo[f].ubicacionLlegada + "</td>";
            lista = lista + "<td>" + arreglo[f].fecha_llegada + "</td>";
            lista = lista + "<td>" + arreglo[f].precio + "</td>";
            lista = lista + "<td>" + arreglo[f].descripcion + "</td>";
            lista = lista + "<td>" + arreglo[f].estado + "</td>";
            lista = lista + "<td>" +   '<a href=http://localhost/Aerolinea_MSD/Vista/Seleccion_Asientos.php?res='+arreglo[f].id+' type="button" id="Ir" class="btn btn-danger" >Seleccionar</a>' + "</td>";
            lista = lista + "</tr>";
            }

            $("#tablaVuelos").html(lista);
        }else{
            $("#tablaVuelos").html("<b>No se encuentra informacion</b>");
        }
    } else {
        alert("No se encuentra vuelo con esos datos");
    }

}
