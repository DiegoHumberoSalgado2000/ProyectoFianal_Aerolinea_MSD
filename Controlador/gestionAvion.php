<?php

require '../Modelo/clsGeneral.php';
require '../DAO/avionDAO.php';
require '../DAO/colorDAO.php';
require '../DAO/fabricanteDAO.php';
require '../DAO/marcaDAO.php';

$idFabricanteSel = isset($_REQUEST['idFabricanteSel'])? $_REQUEST['idFabricanteSel'] : "";
$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$selectFabricante = new clsGeneral($idFabricanteSel);
$avionDAO = new avionDAO();
$colorDAO= new colorDAO();
$fabricanteDAO= new fabricanteDAO();
$marcaDAO= new marcaDAO();



switch ($type) {
    case "color":
        $colorDAO->listarSel();
        break;

    case "marca":
        $marcaDAO->listarSel($selectFabricante);
        break;

    case "fabricante":
        $fabricanteDAO->listarSel();
        break;

    case "list":
        $avionDAO->listar();
        break;
}