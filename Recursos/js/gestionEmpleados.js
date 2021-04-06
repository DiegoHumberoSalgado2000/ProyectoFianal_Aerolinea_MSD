$(document).ready(function(){
    cargarDatos();
    $("#btnGuardar").click(guardarEmpleado);
    $("#btnBuscar").click(buscarEmpleado);
    $("#btnModificar").click(modificarEmpleado);
    $("#btnCancelar").click(cancelar);
    $("#btnEliminar").click(eliminarEmpleado);
    cancelar();
});

var resulCedula="";
var msjCedula="";
var resulNombre="";
var msjNombre="";
var resulApellido="";
var msjApellido="";
var resulCorreo="";
var msjCorreo="";
var resulTelefono="";
var msjTelefono="";
var resulContrasena="";
var msjContrasena="";
var resuDescripcion="";
var msjDescripcion="";


var condiResultado="";
var msjResultado="";

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
                $("#ListaEmpleados").html("<b>No se encuentra informacion</b>");
            }
        },
        error:function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
}

function guardarEmpleado(){
   // let validar = validarDatos();
    
   // if(validar == true){
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
                    alert("Se guardo correctamente");
                    listarEmpleado();
                    cancelar();
                }else{
                    alert("Transacción fallida, verifique que la cedula no se encuentre registrada")
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }

        });
    //}

}

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

                btnGuardar.disabled=true;
                btnModificar.disabled=false;
                btnEliminar.disabled=false;
                txtCedula.disabled=true;
                
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
                alert("Se modifico correctamente");
                listarEmpleado();
                cancelar();
            }else{
                alert("Transacción fallida, verifique que la cedula no se encuentre registrada")
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }

    });
//}
}
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
                    alert("Eliminado con exito");
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
function cancelar(){
    limpiar();
    deshabilitarBotones();

}
function deshabilitarBotones(){
    let btnGuardar = document.getElementById("btnGuardar");
    let btnModificar = document.getElementById("btnModificar");
    let btnEliminar = document.getElementById("btnEliminar");
    let txtCedula=document.getElementById("txtCedula");

    btnModificar.disabled =true;
    btnEliminar.disabled =true;
    btnGuardar.disabled=false;
    txtCedula.disabled=false;
}
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

function cargarDatos(){
    listarEmpleado();

}
function validarDatos(){
    let condicion1=true;
    let condicion2=true;
    let condicion3=true;
    let condicion4=true;
    let condicion5=true;
    let condicion6=true;
    let condicion7=true;

    validarCedula();
    if(resulCedula==="False" || resulCedula===""){
        if(resulCedula===""){
            alert("Verifique la cedula");
            condicion1=false;
        }else{
            alert(msjCedula)
            condicion1=false;
        }

    }

    validarNombre();
    if(resulNombre==="False" || resulNombre===""){
        if(resulCedula===""){
            alert("verifique el nombre");
            condicion2=false;
        }else{
            alert(msjNombre)
            condicion2=false;
        }
    }

    validarApellido();
    if(resulApellido==="False" || resulApellido===""){
        if(resulCedula===""){
            alert("verifique el apellido");
            condicion3=false;
        }else{
            alert(msjApellido)
            condicion3=false;
        }
    }

    validarCorreo();

    if(resulCorreo==="False" || resulCorreo===""){
        if(resulCedula===""){
            alert("verifique el correo");
            condicion4=false;
        }else{
            alert(msjCorreo)
            condicion4=false;
        }
    }

    validarTelefono();

    if(resulTelefono==="False" || resulTelefono===""){
        if(resulCedula===""){
            alert("verifique el telefono");
            condicion5=false;
        }else{
            alert(msjTelefono)
            condicion5=false;
        }
    }

    validarContrasena();

    if(resulContrasena==="False" || resulContrasena===""){
        if(resulCedula===""){
            alert("verifique la contrasena");
            condicion6=false;
        }else{
            alert(msjContrasena)
            condicion6=false;
        }
    }

    validarDescripcion();

    if(resuDescripcion==="False" || resuDescripcion===""){
        if(resulCedula===""){
            alert("verifique la descripción");
            condicion7=false;
        }else{
            alert(msjDescripcion)
            condicion7=false;
        }
    }

    if(condicion1===true && condicion2 ==true && condicion3==true && condicion4==true && condicion5==true && condicion6==true && condicion7==true){
        return true;
    }else{
        return false;
    }


}

function validarCedula(){
    let txtCedula=$("#txtCedula").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarCedula",cedula:txtCedula},
        success: function(res){
            let resultado = JSON.parse(res);

            resulCedula=resultado.resultado;
            msjCedula=resultado.msj;
        },
        error:function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " +textStatus +"\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
        }


    });

}

function validarNombre(){
    let txtnombre=$("#txtNombre").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarNombre",nombre:txtnombre},
        success:function(res){
            let resultado =JSON.parse(res);

            resulNombre=resultado.resultado;
            msjNombre=resultado.msj;
        },
        error: function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
            
        }
    });
}

function validarApellido(){
    let txtapellido=$("#txtApellido").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarApellido",apellido:txtapellido},
        success:function(res){
            let resultado =JSON.parse(res);

            resulApellido=resultado.resultado;
            msjApellido=resultado.msj;
        },
        error: function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
            
        }
    });
}
function validarCorreo(){
    let txtcorreo=$("#txtCorreo").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarCorreo",correo:txtcorreo},
        success:function(res){
            let resultado =JSON.parse(res);

            resulCorreo=resultado.resultado;
            msjCorreo=resultado.msj;
        },
        error: function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
            
        }
    });
}
function validarTelefono(){
    let txttelefono=$("#txtTelefono").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarTelefono",correo:txttelefono},
        success:function(res){
            let resultado =JSON.parse(res);

            resulTelefono=resultado.resultado;
            msjTelefono=resultado.msj;
        },
        error: function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
            
        }
    });
}

function validarContrasena(){
    let txtcontrasena=$("#txtContrasena").val();

    $.ajax({
        type:'post',
        url:"../Controlador/gestionEmpleado.php",
        beforeSend: function(){

        },
        data:{type:"validarContrasena",contrasena:txtcontrasena},
        success:function(res){
            let resultado =JSON.parse(res);

            resulContrasena=resultado.resultado;
            msjContrasena=resultado.msj;
        },
        error: function(jqXHR,textStatus,errorThrown){
            alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
            alert("Verifique la ruta del archivo");
            
        }
    });
}

function validarDescripcion() {
    let txtDescripcion = $("#txtDescripcion").val();

        $.ajax({
            type: 'post',
            url: "../Controlador/gestionAvion.php",
            beforeSend: function () {

            },
            data: {type: "validarDescripcion", descripcion: txtDescripcion},
            success: function (res) {

                let resultado = JSON.parse(res);

                resuDescripcion=resultado.resultado;
                msjDescripcion=resultado.msj;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error detectado: " + textStatus + "\nExcepcion: " + errorThrown);
                alert("Verifique la ruta del archivo");
            }
        });
}






