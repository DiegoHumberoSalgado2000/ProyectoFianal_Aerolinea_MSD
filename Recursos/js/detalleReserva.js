/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    BloquearTextDetalleReserva();
});

function BloquearTextDetalleReserva() {
    let txtNombre = document.getElementById("txtNombre");
    let txtApellido = document.getElementById("txtApellido");
    let txtCedula = document.getElementById("txtCedula");
    let txtCorreo = document.getElementById("txtCorreo");
    let txtTelefono = document.getElementById("txtTelefono");
    let txtTotalPagar = document.getElementById("txtTotalPago");
    let txtUbicacionsalida = document.getElementById("txtUbicacionSalida");
    let txtUbicacionLlegada = document.getElementById("txtUbicacionLlegada");
    let txtFechaSalida = document.getElementById("txtFechaSalida");
    let txtFechaLlegada = document.getElementById("txtFechaLlegada");
    let txtNumeroVuelo = document.getElementById("txtNumeroVuelo");

    txtNombre.disabled = true;
    txtApellido.disabled = true;
    txtCedula.disabled = true;
    txtCorreo.disabled = true;
    txtTelefono.disabled = true;
    txtTotalPagar.disabled = true;
    txtUbicacionsalida.disabled = true;
    txtUbicacionLlegada.disabled = true;
    txtFechaSalida.disabled = true;
    txtFechaLlegada.disabled = true;
    txtNumeroVuelo.disabled = true;

}


