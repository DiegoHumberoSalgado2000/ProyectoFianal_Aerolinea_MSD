<?php


require '../Modelo/ClsReserva.php';
require '../DAO/reservaDAO.php';
require '../Modelo/clsGeneral.php';
//require '../DAO/itinerarioVueloDAO.php';
//require '../Modelo/clsItinerarioVuelo.php';



$idUbicacionSel= isset($_REQUEST['idUbicacionSel'])? $_REQUEST['idUbicacionSel']:"";
$idUbicacionrange= isset($_REQUEST['idUbicacionrange'])? $_REQUEST['idUbicacionrange']:"";

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

$selectubicacionsel = new clsGeneral($idUbicacionrange);
$selectUbicacion = new clsGeneral($idUbicacionSel);
$reservaDAO=new reservaDAO();
//$itinerarioVueloDAO= new itinerarioVueloDAO();

//$itinerarioVuelo=new clsItinerarioVuelo($idItinerarioVuelo,$idVuelo,$idUbicacionllegada,$idUbicacionsalida,$fechallegada,$fechasalida,$estado,$descripcion);


switch ($type) {

    

    case "listUbicacionLLegada":
        $reservaDAO->listarUbicacionLlegada();
        break;

    case "listUbicacionIdSalida":
        $reservaDAO->listarUbicacionSalidaSel($selectubicacionsel);
        break;
    case "listUbicacionSalida":
        $reservaDAO->listarubicacionSalida($selectUbicacion);
        break;
    
   
    

}