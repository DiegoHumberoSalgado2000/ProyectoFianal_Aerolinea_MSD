$(document).ready(function(){

    $("#btnGuardarUbicacion").click(guardarUbicacion);
    $("#btnBuscarUbicacion").click(buscarUbicacion);
    $("#btnModificarUbicacion").click(ModificarUbicacion);
    $("#btnEliminarUbicacion").click(eliminarUbicacion);
    $("#btnCancelarUbicacion").click(cancelar);
    cancelar();
});


/**
 *Función utilizada para guardar una ubicación 
 */
function guardarUbicacion(){
    let objUbicacion={
        idUbicacion:$("#txtIdUbicacion").val(),
        nombre :$("#txtUbicacion").val(),
        descripcion : $("#txtDescripcionUbicacion").val(),
        type:""


    };

    if(objUbicacion.idUbicacion!==""){
        alert("No se puede guardar, ya que buscó antes la ubicación. oprima el botón cancelar y luego intente nuevamente.")
    }else{
        objUbicacion.type='guardar';

        $.ajax({
            type:"post",
            url:"../Controlador/gestionUbicacion.php",
            beforeSend:function(){

            },
            data:objUbicacion,
            success:function(data){
                var info =JSON.parse(data);

                if(info.res=== "Success"){
                    alert("Se guardó correctamente");
                    cancelar();
                }else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Transacción fallida, verifique que la ubicación no se encuentre registrada");
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
 *Función utilizada para buscar una ubicación
 */
function buscarUbicacion(){
    var objUbicacion={
        nombre:$("#txtUbicacion").val(),
        type : "buscar"
    };

    $.ajax({
        type: 'post',
        url:"../Controlador/gestionUbicacion.php",
        beforeSend: function () {

        },
        data: objUbicacion,
        success:function (res){
            var info= JSON.parse(res);
            var data =JSON.parse(info.data);

            if (info.msj==="Success"){
                $("#txtIdUbicacion").val(data[0].id);
                $("#txtUbicacion").val(data[0].nombre);
                $("#txtDescripcionUbicacion").val(data[0].descripcion);
                

                let btnGuardar=document.getElementById("btnGuardarUbicacion");
                let btnModificar=document.getElementById("btnModificarUbicacion");
                let btnEliminar = document.getElementById("btnEliminarUbicacion");
                let txtUbicacion=document.getElementById("txtUbicacion");
                


                btnGuardar.disabled=true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;
                txtUbicacion.disabled=true;
                
                
            }else{
                alert("No se encuentra la ubicación");
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
 *Función utilizada para modificar una ubicación
 */
function ModificarUbicacion(){
    let objUbicacion={
        idUbicacion:$("#txtIdUbicacion").val(),
        nombre :$("#txtUbicacion").val(),
        descripcion : $("#txtDescripcionUbicacion").val(),
        type:""
    };

    if(objUbicacion.idUbicacion!==""){
        objUbicacion.type='modificar';

        $.ajax({
            type:"post",
            url:"../Controlador/gestionUbicacion.php",
            beforeSend:function(){

            },
            data:objUbicacion,
            success:function(data){
                var info =JSON.parse(data);

                if(info.res=== "Success"){
                    alert("Se modifico correctamente");
                    cancelar();
                }else if(info.res === "False"){
                    alert(info.msj)
                }else{
                    alert("Error al modificar,no ha modificado datos. Si desea modificar, modifique algún dato");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }

        });
    }else{
        alert("Para modificar una ubicación antes hay que buscarlo");
    }
}
/**
 *Función utilizada para eliminar una ubicación,
 * en este caso actualizar el estado a no disponible.
 */
function eliminarUbicacion(){
    var objUbicacion={
        idUbicacion:$("#txtIdUbicacion").val(),
        type:"eliminar"
    };
    if(confirm("Esta seguro")){

        $.ajax({
            type:'post',
            url:"../Controlador/gestionUbicacion.php",
            beforeSend:function(){

            },
            data:objUbicacion,
            success:function(res){
                var info = JSON.parse(res);

                if(info.res === "Success"){
                    alert("Eliminado con exito");
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
    let btnGuardar = document.getElementById("btnGuardarUbicacion");
    let btnModificar = document.getElementById("btnModificarUbicacion");
    let btnEliminar = document.getElementById("btnEliminarUbicacion");
    let txtUbicacion=document.getElementById("txtUbicacion");
    

    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
    txtUbicacion.disabled=false;
    
}
/**
 *funcion utilizada para limpiar los inputs
 */
function limpiar(){
    $("#txtIdUbicacion").val("");
    $("#txtUbicacion").val("");
    $("#txtDescripcionUbicacion").val("");
}