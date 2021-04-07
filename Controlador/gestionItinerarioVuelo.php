<?php

require '../Modelo/clsItinerarioVuelo.php';
require '../DAO/itinerarioVueloDAO.php';


$idItinerarioVuelo=isset($_REQUEST['idItinerarioVuelo'])? $_REQUEST['idItinerarioVuelo']:"";
$idVuelo=isset($_REQUEST['idVuelo'])? $_REQUEST['idVuelo']:"";
$idUbicacionllegada=isset($_REQUEST['idUbicacionllegada'])? $_REQUEST['idUbicacionllegada']:"";
$idUbicacionsalida=isset($_REQUEST['idUbicacionsalida'])? $_REQUEST['idUbicacionsalida']:"";
$fechallegada=isset($_REQUEST['fechallegada'])? $_REQUEST['fechallegada']:"";
$fechasalida=isset($_REQUEST['fechasalida'])? $_REQUEST['fechasalida']:"";
$estado=isset($_REQUEST['estado'])? $_REQUEST['estado']:"";
$descripcion=isset($_REQUEST['descripcion'])? $_REQUEST['descripcion']:"";

$type=isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$itinerarioVuelo=new clsItinerarioVuelo($idItinerarioVuelo,$idVuelo,$idUbicacionllegada,$idUbicacionsalida,$fechallegada,$fechasalida,$estado,$descripcion);
$itinerarioVueloDAO = new itinerarioVueloDao();


$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

switch($type){

    case "guardar":
        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if($idVuelo==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione Vuelo"
            ]));
            break;
        }
        if($idUbicacionllegada==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione Ubicacion de llegada"
            ]));
            break;
        }
        if($idUbicacionsalida==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione Ubicacion de salida"
            ]));
            break;
        }

        $itinerarioVueloDAO->guardar($itinerarioVuelo);
        break;
    
    case "list":
        $itinerarioVueloDAO->listar();
        break;


    case "listVuelo":
        $itinerarioVueloDAO->listarVueloSel();
        break;
    case "listUbicacion":
        $itinerarioVueloDAO->listarUbicacion();
        break;
}