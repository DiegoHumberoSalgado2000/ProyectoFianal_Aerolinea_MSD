<?php

require '../Modelo/clsGeneral.php';
require '../Modelo/clsSilla.php';
require '../DAO/sillaDAO.php';


$idItinerario = isset($_REQUEST['idItinerario']) ? $_REQUEST['idItinerario'] : "";
$numeroSilla = isset($_REQUEST['numeroSilla']) ? $_REQUEST['numeroSilla'] : "";
$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";
$correo = isset($_REQUEST['correo'])? $_REQUEST['correo'] : "";
$contrasena = isset($_REQUEST['contrasena'])? $_REQUEST['contrasena'] : "";

$silla = isset($_REQUEST['silla'])? $_REQUEST['silla'] : "";
$pasajeroPrincipal = isset($_REQUEST['pasajeroPrincipal'])? $_REQUEST['pasajeroPrincipal'] : "";
$fechaHoy = isset($_REQUEST['fechaHoy'])? $_REQUEST['fechaHoy'] : "";
$codigo = isset($_REQUEST['codigo'])? $_REQUEST['codigo'] : "";


$sillaDAO= new sillaDAO();



$patronValContrasena = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
$patronValContrasenaInfo = "La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.NO puede tener otros símbolos Ejemplo: w3Unpocodet0d0";


$patronValCorreo = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
$patronValCorreoInfo = "El correo tiene que tener un formato tipo :alguien@algunlugar.es";







/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "listSillasDisponibles":
        $sillaDAO->listarSillasDisponibles($idItinerario);
        break;
    case "buscarSilla":
        $sillaDAO->buscarSilla($idItinerario,$numeroSilla);
        break;
    case "buscarPersona":
        if (!preg_match($patronValCorreo, $correo)) {
            echo (json_encode(['res' => 'False', 'msj' => $patronValCorreoInfo]));
            break;
        }

        if (!preg_match($patronValContrasena, $contrasena)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValContrasenaInfo]));
            break;
        }
        $sillaDAO->buscarPasajero($correo,$contrasena);
        break;
    case "obtenerNuevoCodigoReserva":
        $sillaDAO->obtenerNuevoCodigoReserva();
        break;

    case "guardarReserva":
        $sillaDAO->guardarReserva($silla,$pasajeroPrincipal,$fechaHoy,$codigo);
        break;

    case "seleccionoSilla":
        $sillaDAO->saberSiSeleccionoSilla($correo,$contrasena,$idItinerario);
        break;
    case "obtenerCedulaPorId":
        $sillaDAO->obtenerCedulaPasajero($pasajeroPrincipal);
        break;
}


