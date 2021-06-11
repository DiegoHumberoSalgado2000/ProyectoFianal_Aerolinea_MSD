$(document).ready(function () {
    $("#btnRegistrar").click(RegistrarPasajero);
});

/**
 *Función utilizada para guardar un Pasagero
 */
function RegistrarPasajero() {

    let objPasajero = {

        idPasajero: $("#txtIdPasajero").val(),
        nombre: $("#txtNombre").val(),
        apellido: $("#txtApellido").val(),
        cedula: $("#txtCedula").val(),
        correo: $("#txtCorreo").val(),
        telefono: $("#txtTelefono").val(),
        contrasena: $("#txtContrasena").val(),
        type: ""
    };
    if (objPasajero.idPasajero !== "") {
        alert("No se puede guardar, ya que buscó antes un avión. oprima el botón cancelar y luego intente nuevamente.")
    } else {
        objPasajero.type = 'guardar';
        $.ajax({
            type: 'post',
            url: "Controlador/gestionPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (data) {
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se ha registrado con éxito");
                    LimpiarText();
                } else if (info.res === "False") {
                    alert(info.msj)
                } else {
                    alert("Transacción fallida, Este usuario ya está registrado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }

}

/**
 *funcion utilizada para limpiar los inputs
 */
function LimpiarText() {
    $("#txtIdPasajero").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCedula").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
    $("#txtContrasena").val("");
    $("#txtDescripcion").val("");
}


function validarLogIn(tipo) {

    $("#txtType").val(tipo);

    if (tipo === "con") {

        let correoLogin = $("#txtCorreoLogin").val();
        let contrasenaLogin = $("#txtContrasenaLogin").val();



        if (correoLogin !== "" && contrasenaLogin !== "") {
            document.getElementById("formularioLogIn").submit();
        } else {
            alert("Ingrese todos los datos");
            //alert("hola mundo "+correoLogin+" "+contrasenaLogin);
        }
    } else {
        document.getElementById("formularioLogOut").submit();
    }


}