$(document).ready(function () {

    datosRequeridos(correoUsuarioIdentificado);
    listarDatos();
    $("#btnEditar").click(cargarEditar);
    $("#btnGuardarActualizar").click(guardarActualizar);


    });


let correoUsuarioIdenti;
function datosRequeridos(correoUsuarioIdentificado){

    correoUsuarioIdenti=correoUsuarioIdentificado;
    //alert("Su correo es " +correoUsuarioIdenti);
}


function listarDatos(){
    document.getElementById("btnGuardarActualizar").disabled = true;
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
                document.getElementById("lblCorreo").innerHTML = data[0].correo;
                document.getElementById("lblCedula").innerHTML = data[0].cedula;
                document.getElementById("lblEstado").innerHTML = data[0].estado;
                document.getElementById("lblTelefono").innerHTML = data[0].telefono_celular;
                document.getElementById("lblCorreo2").innerHTML = data[0].correo;
                document.getElementById("lblNombreApellido").innerHTML = data[0].nombres+" "+data[0].apellidos;

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

                document.getElementById("btnGuardarActualizar").disabled = false;
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

function limpiar(){
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCorreo").val("");
    $("#txtCedula").val("");
    $("#txtTelefono").val("");
    $("#txtContrasena").val("");
    $("#txtConfirmarContrasena").val("");
    document.getElementById("btnGuardarActualizar").disabled = true;
    document.getElementById("txtNombre").disabled = false;
    document.getElementById("txtApellido").disabled = false;
    document.getElementById("txtCorreo").disabled = false;
    document.getElementById("txtCedula").disabled = false;
}

function guardarActualizar(){



    let obj = {
        telefonoCelular:$("#txtTelefono").val(),
        contrasena:$("#txtContrasena").val(),
        confirmarContrasena: $("#txtConfirmarContrasena").val(),
        correo:correoUsuarioIdenti,
        type: "modificarAdministrador"


    };

        $.ajax({
            type: 'post',
            url: "../Controlador/datosMenuAdministrador.php",
            beforeSend: function () {

            },
            data: obj,
            success: function (data) {
                //alert(data);
                var info = JSON.parse(data);

                if (info.res === "Success") {
                    alert("Se actualizó los datos del administrador correctamente");
                    limpiar();
                } else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Error al modificar, no ha modificado datos. Si desea modificar, modifique algún dato");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });


}