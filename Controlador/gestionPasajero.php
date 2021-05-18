<?php

require '../Modelo/ClsPasajero.php';
require '../DAO/PasajeroDAO.php';

$idPasajero = isset($_REQUEST['idPasajero']) ? $_REQUEST['idPasajero'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : "";
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : "";
$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : "";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$pasajero = new ClsPasajero($idPasajero, $nombre, $apellido, $cedula, $correo, $telefono, $contrasena, $estado, $descripcion);
$pasajeroDAO = new PasajeroDAO();

/**
 * Expresiones regulares
 */
$patronValCedula = "/^[0-9\s]{5,10}$/";
$patronValCedulaInfo = "La cedula tiene que ser solo números, tiene que estar en un rango de 5 a 10 números y no puede tener espacios.";

$patronValNombre = "/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValNombreInfo = "El nombre tiene que tener dato alfabetico y entre 3 y 18 caracteres";

$patronValApellido = "/^(?=.{3,36}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValApellidoInfo = "El apellido tiene que tener dato alfabetico y entre 3 y 36 caracteres";

$patronValCorreo = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
$patronValCorreoInfo = "El correo tiene que tener un formato tipo :alguien@algunlugar.es";


$patronValTelefono = "/^[0-9]{10}$/";
$patronValTelefonoInfo = "El telefono celular solo recibe números, Tiene que tener una longuitud de 10 números, Sin espacios";

$patronValContrasena = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$patronValContrasenaInfo = "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos Ejemplo: w3Unpocodet0d0";

$patronValDescripcion = "/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i" */
$patronValDescripcionInfo = "La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "guardar":

        if (!preg_match($patronValNombre, $nombre)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValNombreInfo]));
            break;
        }

        if (!preg_match($patronValApellido, $apellido)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValApellidoInfo]));
            break;
        }

        if (!preg_match($patronValCedula, $cedula)) {

            echo (json_encode(['res' => 'False', "msj" => $patronValCedulaInfo]));
            break;
        }

        if (!preg_match($patronValCorreo, $correo)) {
            echo (json_encode(['res' => 'False', 'msj' => $patronValCorreoInfo]));
            break;
        }

        if (!preg_match($patronValTelefono, $telefono)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValTelefonoInfo]));
            break;
        }

        if (!preg_match($patronValContrasena, $contrasena)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValContrasenaInfo]));
            break;
        }



        $pasajeroDAO->guardar($pasajero);
        break;

    case "buscar":
        $pasajeroDAO->buscar($pasajero);
        break;

    case "modificar":

        if (!preg_match($patronValNombre, $nombre)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValNombreInfo]));
            break;
        }

        if (!preg_match($patronValApellido, $apellido)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValApellidoInfo]));
            break;
        }

        if (!preg_match($patronValCedula, $cedula)) {

            echo (json_encode(['res' => 'False', "msj" => $patronValCedulaInfo]));
            break;
        }

        if (!preg_match($patronValCorreo, $correo)) {
            echo (json_encode(['res' => 'False', 'msj' => $patronValCorreoInfo]));
            break;
        }

        if (!preg_match($patronValTelefono, $telefono)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValTelefonoInfo]));
            break;
        }

        $pasajeroDAO->modificar($pasajero);
        break;

    case "eliminar":
        $pasajeroDAO->eliminar($pasajero);
        break;

    case "list":
        $pasajeroDAO->listar();
        break;
}












