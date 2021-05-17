<?php


require '../Modelo/ClsReserva.php';
require '../DAO/reservaDAO.php';
require '../Modelo/clsGeneral.php';

$idUbicacionSel= isset($_REQUEST['idUbicacionSel'])? $_REQUEST['idUbicacionSel']:"";

$idItinerarioVuelo=isset($_REQUEST['idItinerarioVuelo'])? $_REQUEST['idItinerarioVuelo']:"";
$idVuelo=isset($_REQUEST['idVuelo'])? $_REQUEST['idVuelo']:"";
$idUbicacionllegada=isset($_REQUEST['idUbicacionllegada'])? $_REQUEST['idUbicacionllegada']:"";
$idUbicacionsalida=isset($_REQUEST['idUbicacionsalida'])? $_REQUEST['idUbicacionsalida']:"";
$fechallegada=isset($_REQUEST['fechallegada'])? $_REQUEST['fechallegada']:"";
$fechasalida=isset($_REQUEST['fechasalida'])? $_REQUEST['fechasalida']:"";
$estado=isset($_REQUEST['estado'])? $_REQUEST['estado']:"";
$descripcion=isset($_REQUEST['descripcion'])? $_REQUEST['descripcion']:"";
$fechaactual=isset($_REQUEST['fechaactual'])? $_REQUEST['fechaactual']:"";

$type=isset($_REQUEST['type'])? $_REQUEST['type'] : "";


$reservaDAO=new reservaDAO();


switch ($type) {
    case "listUbicacionSalida":
        $reservaDAO->listarUbicaciones();
        break;
    case "listUbicacionLlegada":
        $ubicacionSalida = new clsGeneral($idUbicacionSel);
        $reservaDAO->listarubicacionLlegada($ubicacionSalida);
        break;
}