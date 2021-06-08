<?php


require '../DAO/BuscarReservaDisponibleDAO.php';


$codigoReser = isset($_REQUEST['codigoReser']) ? $_REQUEST['codigoReser'] : "";

$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$buscarReservaDisponibleDao = new BuscarReservaDisponibleDAO();

/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "BuscarReserva":

        $buscarReservaDisponibleDao->BuscarReservaDisponible($codigoReser);
        break;
}
