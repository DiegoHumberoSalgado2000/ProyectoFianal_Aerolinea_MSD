$(document).ready(function () {

    datosRequeridos(correoUsuarioIdentificado);
    listarDatos();
    $("#btnEditar").click(cargarEditar);
    });


let correoUsuarioIdenti;
function datosRequeridos(correoUsuarioIdentificado){

    correoUsuarioIdenti=correoUsuarioIdentificado;
    //alert("Su correo es " +correoUsuarioIdenti);
}


function listarDatos(){

    var obj = {
        correo: correoUsuarioIdenti,
        type: "buscarAdministradorCorreo"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/datosMenuAdministrador.php",
        beforeSend: function () {

        },
        data: obj,
        success: function (res) {
            //alert (res);

            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                //id,nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion
                document.getElementById("lblNombre").innerHTML = data[0].nombres;
                document.getElementById("lblApellido").innerHTML = data[0].apellidos;
                document.getElementById("txtCorreo").innerHTML = data[0].correo;
                document.getElementById("lblCedula").innerHTML = data[0].cedula;
                document.getElementById("lblEstado").innerHTML = data[0].estado;
                document.getElementById("lblTelefono").innerHTML = data[0].telefono_celular;
                document.getElementById("lblCorreo2").innerHTML = data[0].correo;

            } else {
                alert("Error al cargar los datos del administrador");
                limpiar();
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });



}


function cargarEditar(){

    var obj = {
        correo: correoUsuarioIdenti,
        type: "buscarAdministradorCorreo"
    };


    $.ajax({
        type: 'post',
        url: "../Controlador/datosMenuAdministrador.php",
        beforeSend: function () {

        },
        data: obj,
        success: function (res) {
            //alert (res);

            var info = JSON.parse(res);
            var data = JSON.parse(info.data);

            if (info.msj === "Success") {
                //id,nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion

                $("#txtNombre").val(data[0].nombres);
                $("#txtApellido").val(data[0].apellidos);
                $("#txtCorreo").val(data[0].correo);
                $("#txtCedula").val(data[0].cedula);
                $("#txtTelefono").val(data[0].telefono_celular);

                document.getElementById("txtNombre").disabled = true;
                document.getElementById("txtApellido").disabled = true;
                document.getElementById("txtCorreo").disabled = true;
                document.getElementById("txtCedula").disabled = true;
            } else {
                alert("Error al cargar los datos del administrador");
                limpiar();
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }
    });




}