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

$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

switch($type){

    case "guardar":
        $vueloDAO->guardar($vuelo);
        break;
    

    case "list":
        $vueloDAO->listar();
        break;
    
    case "listAvion":
        $vueloDAO->listarAvionSel();
        break;

    case "validarDescripcion":
        if(preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['resultado' => 'True', "msj" => "Correcto"
            ]));
        }else{
            echo(json_encode(['resultado' => 'False', "msj" => $patronValDescripcionInfo
            ]));
        }

        break;
}