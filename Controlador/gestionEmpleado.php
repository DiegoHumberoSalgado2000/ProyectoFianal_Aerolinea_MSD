<?php
require '../Modelo/clsEmpleado.php';
require '../DAO/empleadoDAO.php';

$idEmpleado= isset($_REQUEST['idEmpleado'])? $_REQUEST['idEmpleado']:"";
$cedula=isset($_REQUEST['cedula'])? $_REQUEST['cedula']:"";
$nombre=isset($_REQUEST['nombre'])? $_REQUEST['nombre']:"";
$apellido=isset($_REQUEST['apellido'])? $_REQUEST['apellido']:"";
$correo=isset($_REQUEST['correo'])? $_REQUEST['correo']:"";
$telefono=isset($_REQUEST['telefono'])? $_REQUEST['telefono']:"";
$contrasena=isset($_REQUEST['contrasena'])? $_REQUEST['contrasena']:"";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$descripcion=isset($_REQUEST['descripcion'])? $_REQUEST['descripcion']:"";
$type= isset($_REQUEST['type'])? $_REQUEST['type'] : "";


$empleado=new clsEmpleado($idEmpleado,$nombre,$apellido,$cedula,$correo,$telefono,$contrasena,$estado,$descripcion);
$empleadoDAO=new empleadoDAO();

/**
 * Expresiones regulares
 */
$patronValCedula="/^([0-9])*$/";
$patronValCedulaInfo="La cedula tiene que tener dato numerico";

$patronValNombre="/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValNombreInfo="El nombre tiene que tener dato alfabetico y entre 3 y 18 caracteres";

$patronValApellido="/^(?=.{3,36}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValApellidoInfo="El apellido tiene que tener dato alfabetico y entre 3 y 36 caracteres";

$patronValCorreo="/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
$patronValCorreoInfo="El correo tiene que tener un formato tipo :alguien@algunlugar.es";


$patronValTelefono="/^[1-9]\d{9}$/";
$patronValTelefonoInfo="El telefono solo recibe numeros de celular";

$patronValContrasena="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$patronValContrasenaInfo="La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos";

$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch($type){

    case "guardar":

        if(!preg_match($patronValCedula,$cedula)){
            echo(json_encode(['res' => 'False', "msj" => $patronValCedulaInfo
            ]));
            break;
        }

        if(!preg_match($patronValNombre,$nombre)){
            echo(json_encode(['res' => 'False', "msj" => $patronValNombreInfo
            ]));
            break;
        }
        if(!preg_match($patronValApellido,$apellido)){
            echo(json_encode(['res' => 'False', "msj" => $patronValApellidoInfo
            ]));
            break;
        }

        if(!preg_match($patronValCorreo,$correo)){
            echo(json_encode(['res' => 'False', "msj" => $patronValCorreoInfo
            ]));
            break;
        }

        if(!preg_match($patronValTelefono,$telefono)){
            echo(json_encode(['res' => 'False', "msj" => $patronValTelefonoInfo
            ]));
            break;
        }
        if(!preg_match($patronValContrasena,$contrasena)){
            echo(json_encode(['res' => 'False', "msj" => $patronValContrasenaInfo
            ]));
            break;
        }
        if(!preg_match($patronValDescripcion,$descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }
        $empleadoDAO->guardar($empleado);
        break;
    
    case "buscar":
        $empleadoDAO->buscar($empleado);
        break;
    
    case "modificar":

        if(!preg_match($patronValCorreo,$correo)){
            echo(json_encode(['res' => 'False', "msj" => $patronValCorreoInfo
            ]));
            break;
        }

        if(!preg_match($patronValTelefono,$telefono)){
            echo(json_encode(['res' => 'False', "msj" => $patronValTelefonoInfo
            ]));
            break;
        }

        if(!preg_match($patronValContrasena,$contrasena)){
            echo(json_encode(['res' => 'False', "msj" => $patronValContrasenaInfo
            ]));
            break;
        }

        if(!preg_match($patronValDescripcion,$descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }
        $empleadoDAO->modificar($empleado);
        break;
    
    case "eliminar":
        $empleadoDAO->eliminar($empleado);
        break;

        
    case "list":
        $empleadoDAO->listar();
        break;        
}