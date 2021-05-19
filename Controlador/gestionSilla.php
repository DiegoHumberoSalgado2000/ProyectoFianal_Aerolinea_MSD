<?php

require '../Modelo/clsGeneral.php';
require '../Modelo/clsSilla.php';
require '../DAO/sillaDAO.php';


$idItinerario = isset($_REQUEST['idItinerario']) ? $_REQUEST['idItinerario'] : "";
$numeroSilla = isset($_REQUEST['numeroSilla']) ? $_REQUEST['numeroSilla'] : "";
$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$sillaDAO= new sillaDAO();
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
}