$(document).ready(function () {
    listaPasajero();
    $("#btnCancelar").click(cancelar);
    $("#btnBuscar").click(buscarPasajero);
    $("#btnModificar").click(modificarPasajero);
    $("#btnEliminar").click(eliminarPasajero);
    cancelar();
});

/**
 *función utilizada para buscar un Pasajero
 */
function buscarPasajero() {
    var objPasajero = {
        cedula: $("#txtCedula").val(),
        type: "buscar"
    };
    if (objPasajero.cedula !== "") {
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (res) {
                var info = JSON.parse(res);
                var data = JSON.parse(info.data);

                if (info.msj === "Success") {
                    $("#txtIdPasajero").val(data[0].id);
                    $("#txtNombre").val(data[0].nombres);
                    $("#txtApellido").val(data[0].apellidos);
                    $("#txtCedula").val(data[0].cedula);
                    $("#txtCorreo").val(data[0].correo);
                    $("#txtTelefono").val(data[0].telefono_celular);
                    $("#txtDescripcion").val(data[0].descripcion);

                    let btnModificar = document.getElementById("btnModificar");
                    let btnEliminar = document.getElementById("btnEliminar");
                    let txtNombre = document.getElementById("txtNombre");
                    let txtApellido = document.getElementById("txtApellido");
                    let txtCedula = document.getElementById("txtCedula");

                    btnModificar.disabled = false;
                    btnEliminar.disabled = false;
                    txtNombre.disabled = true;
                    txtApellido.disabled = true;
                    txtCedula.disabled = true;

                } else {
                    alert("No se encuentra el pasajero");
                    LimpiarText();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    } else {
        alert("No has ingresado el número de cédula para buscar al pasajero");
    }

}

/**
 *Función utilizada para modificar un Pasajero
 */
function modificarPasajero() {

    let objPasajero = {

        idPasajero: $("#txtIdPasajero").val(),
        nombre: $("#txtNombre").val(),
        apellido: $("#txtApellido").val(),
        cedula: $("#txtCedula").val(),
        correo: $("#txtCorreo").val(),
        telefono: $("#txtTelefono").val(),
        descripcion: $("#txtDescripcion").val(),
        type: ""
    };

    if (objPasajero.idPasajero !== "") {
        objPasajero.type = 'modificar';
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (data) {
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se modificó correctamente");
                    listaPasajero();
                    cancelar();
                } else if (info.res === "False") {
                    alert(info.msj)
                } else {
                    alert("Error al modificar, no ha modificado datos. Si desea modificar, modifique algún dato");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    } else {
        alert("Para modificar un Empleado antes hay que buscarlo");
    }
}

/**
 *funcion utilizada para eliminar un Pasajero,
 *en este caso actualizar el estado a no disponible.
 */
function eliminarPasajero() {
    var objPasajero = {
        idPasajero: $("#txtIdPasajero").val(),
        type: "eliminar"
    };
    if (confirm("Esta seguro")) {
        $.ajax({
            type: 'post',
            url: "../Controlador/gestionPasajero.php",
            beforeSend: function () {

            },
            data: objPasajero,
            success: function (res) {
                var info = JSON.parse(res);

                if (info.res === "Success") {
                    alert("Eliminado con éxito");
                    listaPasajero();
                    cancelar();
                } else {
                    alert("No se ha eliminado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    } else {
        alert("Vale")
    }
}

/**
 *Función utilizada para listar los Pasajeros con el estado en disponible
 */
function listaPasajero() {
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionPasajero.php",
        beforeSend: function () {

        },
        data: {type: 'list'},
        success: function (respuesta) {

            var res = JSON.parse(respuesta);
            var info = JSON.parse(res.data);

            var lista = "";

            if (info.length > 0) {
                for (f = 0; f < info.length; f++) {
                    lista = lista + "<tr>";
                    lista = lista + "<td>" + info[f].nombres + "</td>";
                    lista = lista + "<td>" + info[f].apellidos + "</td>";
                    lista = lista + "<td>" + info[f].cedula + "</td>";
                    lista = lista + "<td>" + info[f].correo + "</td>";
                    lista = lista + "<td>" + info[f].telefono_celular + "</td>";
                    lista = lista + "<td>" + info[f].estado + "</td>";
                    lista = lista + "<td>" + info[f].descripcion + "</td>";
                    lista = lista + "</tr>";
                }
                $("#ListaPasajero").html(lista);
            } else {
                $("#ListaPasajero").html("<b>No se encuentra información</b>");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });
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

/**
 *función utilizada para cargar la lista de Empleados
 */
function cancelar() {
    LimpiarText();
    desabilitarBotones();
}

/**
 *función utilizada para limpiar los inputs y habilitar los botones y inputs.
 */
function desabilitarBotones() {
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");
    let txtNombre = document.getElementById("txtNombre");
    let txtApellido = document.getElementById("txtApellido");
    let txtCedula = document.getElementById("txtCedula");

    btnModificar.disabled = true;
    btnEliminar.disabled = true;
    txtNombre.disabled = false;
    txtApellido.disabled = false;
    txtCedula.disabled = false;
}