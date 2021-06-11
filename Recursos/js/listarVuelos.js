$(document).ready(function () {

    listarTabla(datos);


    });

    //var CryptoJS = require("crypto-js");

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


    function listarTabla(datos) {

        //var datos=$("#txtDatos").val();
        try {
            var json=Decrypt(datos);
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
                    lista = lista + "<td>" +   '<a href=http://localhost/Aerolinea_MSD/Vista/Seleccion_Asientos.php?res='+Encrypt(arreglo[f].id)+' type="button" id="Ir" class="btn btn-danger" >Seleccionar</a>' + "</td>";
                    lista = lista + "</tr>";
                    }

                    $("#tablaVuelos").html(lista);
                }else{
                    $("#tablaVuelos").html("<b>No se encuentra información</b>");
                }
            } else {
                alert("No se encuentra vuelo con esos datos");
            }

        } catch (error) {
            alert("No altere la dirección url");
        }


    }
