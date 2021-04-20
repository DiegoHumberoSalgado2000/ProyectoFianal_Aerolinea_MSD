$(document).ready(function () {
    $("#btnGuardar").click(guardarPasajero);
    $("#btnRegistrar").click(RegistrarPasajero);
});

function guardarPasajero() {

    let objPasajero = {

        idPasajero: $("#txtIdPasajero").val(),
        nombre: $("#txtNombre").val(),
        apellido: $("#txtApellido").val(),
        cedula: $("#txtCedula").val(),
        correo: $("#txtCorreo").val(),
        telefono: $("#txtTelefono").val(),
        contraseña: $("#txtContraseña").val(),
        type: ""
    };

    if (objPasajero.idPasajero !== "") {
        alert("No se puede guardar, ya que buscó antes un avion. oprima el boton cancelar y luego intente nuevamente.")
    } else {
        objPasajero.type = 'guardar';
        $.ajax({
            type: 'post',
            url: "../Controlador/CtlPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (data) {
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se ha guardado con exito");
                    LimpiarText();
                } else if (info.res === "False") {
                    alert(info.msj)
                } else {
                    alert("Transacción fallida, Este usuario ya esta registrado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }

}


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
        alert("No se puede guardar, ya que buscó antes un avion. oprima el boton cancelar y luego intente nuevamente.")
    } else {
        objPasajero.type = 'guardar';
        $.ajax({
            type: 'post',
            url: "Controlador/CtlPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (data) {
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se ha registrado con exito");
                    LimpiarText();
                } else if (info.res === "False") {
                    alert(info.msj)
                }else{
                    alert("Transacción fallida, Este usuario ya esta registrado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    }

}


function LimpiarText() {
    $("#txtIdPasajero").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCedula").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
    $("#txtContrasena").val("");
}



