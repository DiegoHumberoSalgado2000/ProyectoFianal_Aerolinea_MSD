$(document).ready(function(){
    cargarDatos();
    $("#btnGuardar").click(guardarEmpleado);
    $("#btnBuscar").click(buscarEmpleado);
    $("#btnModificar").click(modificarEmpleado);
    $("#btnCancelar").click(cancelar);
    $("#btnEliminar").click(eliminarEmpleado);
    cancelar();
});


/**
 *Función utilizada para listar los empleados con el estado en disponible
 */
function listarEmpleado(){
    $.ajax({
        type: 'post',
        url: "../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type: 'list' },
        success: function (respuesta) {

            var res = JSON.parse(respuesta);
            var info=JSON.parse(res.data);

            var lista ="";

            if(info.length >0){
                for( f=0;f<info.length;f++){
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
                $("#ListaEmpleados").html(lista);
            }else{
                $("#ListaEmpleados").html("<b>No se encuentra información</b>");
            }
        },
        error:function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
}
/**
 *Función utilizada para guardar un empleado
 */
function guardarEmpleado(){
   
        let objEmpleado ={
            idEmpleado:$("#txtIdEmpleado").val(),
            cedula: $("#txtCedula").val(),
            nombre: $("#txtNombre").val(),
            apellido: $("#txtApellido").val(),
            correo : $("#txtCorreo").val(),
            telefono : $("#txtTelefono").val(),
            contrasena : $("#txtContrasena").val(),
            descripcion : $("#txtDescripcion").val(),
            type:""

        };

        if(objEmpleado.idEmpleado !== ""){
            alert("No se puede guardar, ya que buscó antes un avión. oprima el botón cancelar y luego intente nuevamente.")
        }else{
            objEmpleado.type='guardar';
         $.ajax({
            type:"post",
            url:"../Controlador/gestionEmpleado.php",
            beforeSend:function(){

            },
            data:objEmpleado,
            success:function(data){
                var info =JSON.parse(data);

                if(info.res=== "Success"){
                    alert("Se guardó correctamente");
                    listarEmpleado();
                    cancelar();
                }else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Transacción fallida, verifique que la cédula no se encuentre registrada");
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
 *función utilizada para buscar un empleado
 */
function buscarEmpleado(){
    var objEmpleado={
        cedula: $("#txtCedula").val(),
        type : "buscar"
    };

    $.ajax({
        type: 'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function () {

        },
        data: objEmpleado,
        success:function (res){
            var info= JSON.parse(res);
            var data =JSON.parse(info.data);

            if (info.msj==="Success"){
                $("#txtIdEmpleado").val(data[0].id);
                $("#txtCedula").val(data[0].cedula);
                $("#txtNombre").val(data[0].nombres);
                $("#txtApellido").val(data[0].apellidos);
                $("#txtCorreo").val(data[0].correo);
                $("#txtTelefono").val(data[0].telefono_celular);
                $("#txtContrasena").val(data[0].contrasena);
                $("#txtDescripcion").val(data[0].descripcion);

                let btnGuardar=document.getElementById("btnGuardar");
                let btnModificar=document.getElementById("btnModificar");
                let btnEliminar = document.getElementById("btnEliminar");
                let txtCedula=document.getElementById("txtCedula");
                let txtNombre=document.getElementById("txtNombre");
                let txtApellido=document.getElementById("txtApellido");


                btnGuardar.disabled=true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;
                txtCedula.disabled=true;
                txtNombre.disabled=true;
                txtApellido.disabled=true;
                
            }else{
                alert("No se encuentra el empleado");
                limpiar();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
}
/**
 *Función utilizada para modificar un empleado
 */
function modificarEmpleado(){
    let objEmpleado ={
        idEmpleado:$("#txtIdEmpleado").val(),
        cedula: $("#txtCedula").val(),
        nombre: $("#txtNombre").val(),
        apellido: $("#txtApellido").val(),
        correo : $("#txtCorreo").val(),
        telefono : $("#txtTelefono").val(),
        contrasena : $("#txtContrasena").val(),
        descripcion : $("#txtDescripcion").val(),
        type:""

    };

    if(objEmpleado.idEmpleado!==""){
        objEmpleado.type='modificar';
    $.ajax({
        type:"post",
        url:"../Controlador/gestionEmpleado.php",
        beforeSend:function(){

        },
        data:objEmpleado,
        success:function(data){
            var info =JSON.parse(data);

            if(info.res=== "Success"){
                alert("Se modificó correctamente");
                listarEmpleado();
                cancelar();
            }else if(info.res === "False"){
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
}else{
    alert("Para modificar un Empleado antes hay que buscarlo");
}
}

/**
 *funcion utilizada para eliminar un empleado,
 *en este caso actualizar el estado a no disponible.
 */
function eliminarEmpleado(){
    var objEmpleado={
        idEmpleado:$("#txtIdEmpleado").val(),
        type:"eliminar"
    };
    if(confirm("Esta seguro")){

        $.ajax({
            type:'post',
            url:"../Controlador/gestionEmpleado.php",
            beforeSend:function(){

            },
            data:objEmpleado,
            success:function(res){
                var info = JSON.parse(res);

                if(info.res === "Success"){
                    alert("Eliminado con éxito");
                    listarEmpleado();
                    cancelar();
                }else{
                    alert("No se ha eliminado");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
    
    }else{
        alert("Vale")
    }
}
/**
 *función utilizada para limpiar los inputs y habilitar los botones y inputs.
 */
function cancelar(){
    limpiar();
    deshabilitarBotones();

}
/**
 *función utilizada para habilitar los botones y inputs
 */
function deshabilitarBotones(){
    let btnGuardar = document.getElementById("btnGuardar");
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");
    let txtCedula=document.getElementById("txtCedula");
    let txtNombre =document.getElementById("txtNombre");
    let txtApellido=document.getElementById("txtApellido");

    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
    txtCedula.disabled=false;
    txtNombre.disabled=false;
    txtApellido.disabled=false;
}
/**
 *funcion utilizada para limpiar los inputs
 */
function limpiar(){
    $("#txtIdEmpleado").val("");
    $("#txtCedula").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCorreo").val("");
    $("#txtTelefono").val("");
    $("#txtContrasena").val("");
    $("#txtDescripcion").val("");
}
/**
 *función utilizada para cargar la lista de Empleados
 */
function cargarDatos(){
    listarEmpleado();

}
