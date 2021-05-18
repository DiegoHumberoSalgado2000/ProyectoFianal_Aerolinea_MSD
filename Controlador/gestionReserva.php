<?php


require '../Modelo/ClsReserva.php';
require '../DAO/reservaDAO.php';
require '../Modelo/clsGeneral.php';

$idUbicacionSel= isset($_REQUEST['idUbicacionSel'])? $_REQUEST['idUbicacionSel']:"";

$idUbicacionSalida=isset($_REQUEST['idUbicacionSalida'])? $_REQUEST['idUbicacionSalida']:"";
$idUbicacionLlegada=isset($_REQUEST['idUbicacionLlegada'])? $_REQUEST['idUbicacionLlegada']:"";
$fechaSalida=isset($_REQUEST['fechaSalida'])? $_REQUEST['fechaSalida']:"";
$fechaLlegada=isset($_REQUEST['fechaLlegada'])? $_REQUEST['fechaLlegada']:"";


//$fecha_llegada=strtotime($fechallegada);
//$fecha_salida=strtotime($fechasalida);




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

    case "buscarVueloReserva":

        if($idUbicacionSalida==-1){
            echo(json_encode(['res' => 'False', "msj" => "No ha seleccionano una ubicacion de salida"
            ]));
            break;
        }

        if($idUbicacionLlegada==-1){
            echo(json_encode(['res' => 'False', "msj" => "No ha seleccionano una ubicacion de llegada"
            ]));
            break;
        }


        $reservaDAO->buscarVueloReserva($fechaLlegada,$fechaSalida,$idUbicacionLlegada,$idUbicacionSalida);
        break;
}

