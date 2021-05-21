<?php

require '../Modelo/clsItinerarioVuelo.php';
require '../DAO/itinerarioVueloDAO.php';
require '../Modelo/clsGeneral.php';


$idUbicacionSel= isset($_REQUEST['idUbicacionSel'])? $_REQUEST['idUbicacionSel']:"";
$idUbicacionrange= isset($_REQUEST['idUbicacionrange'])? $_REQUEST['idUbicacionrange']:"";

$idItinerarioVuelo=isset($_REQUEST['idItinerarioVuelo'])? $_REQUEST['idItinerarioVuelo']:"";
$idVuelo=isset($_REQUEST['idVuelo'])? $_REQUEST['idVuelo']:"";
$idUbicacionllegada=isset($_REQUEST['idUbicacionllegada'])? $_REQUEST['idUbicacionllegada']:"";
$idUbicacionsalida=isset($_REQUEST['idUbicacionsalida'])? $_REQUEST['idUbicacionsalida']:"";
$fechallegada=isset($_REQUEST['fechallegada'])? $_REQUEST['fechallegada']:"";
$fechasalida=isset($_REQUEST['fechasalida'])? $_REQUEST['fechasalida']:"";
$estado=isset($_REQUEST['estado'])? $_REQUEST['estado']:"";
$precio=isset($_REQUEST['precio'])? $_REQUEST['precio']:"";
$descripcion=isset($_REQUEST['descripcion'])? $_REQUEST['descripcion']:"";
$fechaactual=isset($_REQUEST['fechaactual'])? $_REQUEST['fechaactual']:"";

$type=isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$selectubicacionsel = new clsGeneral($idUbicacionrange);
$selectUbicacion = new clsGeneral($idUbicacionSel);
$itinerarioVuelo=new clsItinerarioVuelo($idItinerarioVuelo,$idVuelo,$idUbicacionllegada,$idUbicacionsalida,$fechallegada,$fechasalida,$estado,$precio,$descripcion);
$itinerarioVueloDAO = new itinerarioVueloDao();

/**
 * Expresiones regulares
 */
$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

$patronValPrecio="/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/";/**El patron regular que distingue entre negativo y positivo */
$patronValPrecioInfo="El precio puede tener numeros enteros positivos y decimales positivos y no se permite numeros negativos";

$fecha_llegada=strtotime($fechallegada);
$fecha_salida=strtotime($fechasalida);
$fecha_hoy=strtotime($fechaactual);
/**
 * Usado para recibir $type el cual ayuda para controlar que peticion se requiere
 */
switch($type){

    case "guardar":
        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if(!preg_match($patronValPrecio,$precio)){
            echo(json_encode(['res' => 'False', "msj" => $patronValPrecioInfo
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
        if($fechallegada==$fechasalida){
            echo(json_encode(['res' => 'False', "msj" => "Las fecha de llegada y de salida son iguales"
            ]));
            break;
        }
        if($fecha_llegada<$fecha_salida){
            echo(json_encode(['res' => 'False', "msj" => "Las fecha de llegada es menor a la de salida"
            ]));
            break;
        }
        /**
        *if($fecha_salida<$fecha_hoy){
        *    echo(json_encode(['res' => 'False', "msj" => "La fecha de salida no puede ser menor a la fecha de hoy"
        *    ]));
        *    break;
        *}

        */

        $itinerarioVueloDAO->guardar($itinerarioVuelo);
        break;


    case "buscar":
        $itinerarioVueloDAO->buscar($itinerarioVuelo);
        break;

    case "modificar":

        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }
        if(!preg_match($patronValPrecio,$precio)){
            echo(json_encode(['res' => 'False', "msj" => $patronValPrecioInfo
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
        if($fechallegada==$fechasalida){
            echo(json_encode(['res' => 'False', "msj" => "Las fecha de llegada y de salida son iguales"
            ]));
            break;
        }
        if($fecha_llegada<$fecha_salida){
            echo(json_encode(['res' => 'False', "msj" => "Las fecha de llegada es menor a la de salida"
            ]));
            break;
        }


        $itinerarioVueloDAO->modificar($itinerarioVuelo);
        break;


    case "eliminar":
        $itinerarioVueloDAO->eliminar($itinerarioVuelo);
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
    case "listUbicacionIdLlegada":
        $itinerarioVueloDAO->listarUbicacionLlegadaSel($selectubicacionsel);
        break;
    case "listUbicacionLlegada":
        $itinerarioVueloDAO->listarubicacionLlegada($selectUbicacion);
        break;

    case "buscarUbicacionLlegadaId":
        $itinerarioVueloDAO->buscarUbicacionLlegadaPorId($itinerarioVuelo);
        break;

    case "buscarVueloReserva":
        $itinerarioVueloDAO->buscarVueloReserva($itinerarioVuelo);
        break;
}