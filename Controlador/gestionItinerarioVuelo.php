<?php

require '../Modelo/clsAvion.php';
require '../DAO/itinerarioVueloDAO.php';



$type=isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$itinerarioVueloDAO = new itinerarioVueloDao();


switch($type){

    case "listVuelo":
        $itinerarioVueloDAO->listarVueloSel();
        break;
    case "listUbicacion":
        $itinerarioVueloDAO->listarUbicacion();
        break;
}