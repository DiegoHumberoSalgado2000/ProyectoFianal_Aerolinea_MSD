<?php

require '../Modelo/clsVuelo.php';
require '../DAO/vueloDAO.php';



$idVuelo = isset($_REQUEST['idVuelo']) ? $_REQUEST['idVuelo'] : "";
$tipovuelo = isset($_REQUEST['tipovuelo']) ? $_REQUEST['tipovuelo'] : "";
$idAvion = isset($_REQUEST['idAvion']) ? $_REQUEST['idAvion'] : "";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";

$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$vuelo=new clsVuelo($idVuelo,$tipovuelo,$descripcion,$estado,$idAvion);
$vueloDAO =new vueloDAO();

/**
 *Expresiones regulares.
 */
$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch($type){

    case "guardar":

        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if($tipovuelo==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un tipo vuelo"
            ]));
            break;
        }

        if($idAvion==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un Avion"
            ]));
            break;
        }
    

        $vueloDAO->guardar($vuelo);
        break;
    
    
    case "buscar":

        if($idAvion==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un Avion"
            ]));
            break;
        }

        $vueloDAO->buscar($vuelo);
        break;

    case "modificar":
        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if($tipovuelo==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un tipo vuelo"
            ]));
            break;
        }

        $vueloDAO->modificar($vuelo);
        break;
    
    case "eliminar":

        $vueloDAO->eliminar($vuelo);
        break;

    case "list":
        $vueloDAO->listar();
        break;
    
    case "listAvion":
        $vueloDAO->listarAvionSel();
        break;

    
}