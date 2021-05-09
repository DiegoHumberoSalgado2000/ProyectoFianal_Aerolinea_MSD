<?php

require '../Modelo/clsGeneral.php';
require '../Modelo/clsAvion.php';
require '../DAO/avionDAO.php';



/**
 *idFabricanteSel, se utiliza para saber el id del fabricante para así mostrar sus respectivas marcas :)
 */
$idFabricanteSel = isset($_REQUEST['idFabricanteSel'])? $_REQUEST['idFabricanteSel'] : "";

$idAvion = isset($_REQUEST['idAvion']) ? $_REQUEST['idAvion'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$placa = isset($_REQUEST['placa']) ? $_REQUEST['placa'] : "";
$idColor = isset($_REQUEST['idColor']) ? $_REQUEST['idColor'] : "";
$idMarca = isset($_REQUEST['idMarca']) ? $_REQUEST['idMarca'] : "";

$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";



$selectFabricante = new clsGeneral($idFabricanteSel);
$avion=new clsAvion($idAvion, $descripcion, $estado, $placa, $idColor, $idMarca);
$avionDAO= new avionDAO();


/**
 *Expresiones regulares.
 */

$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";


$patronValPlaca="/^(HK\-)+[A-Z]{3}[0-9]{2}[A-Z0-9]$/";
$patronValPlacaInfo="La placa tiene que tener: al principio HK: Aviación General y comercial, ejemplo: HK-XXX99X o HK-XXX999, en mayúsculas";

/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "listColor":
        $avionDAO->listarColorSel();
        break;
    case "listFabricante":
        $avionDAO->listarFabricanteSel();
        break;
    case "listMarca":
        $avionDAO->listarMarcaSel($selectFabricante);
        break;
    case "guardar":
        if(!preg_match($patronValPlaca, $placa)){
            echo(json_encode(['res' => 'False', "msj" => $patronValPlacaInfo
            ]));
            break;
        }

        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if($idFabricanteSel==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un fabricante"
            ]));
            break;
        }

        if($idMarca==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione una marca"
            ]));
            break;
        }

        if($idColor==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un color"
            ]));
            break;
        }
        $avionDAO->guardar($avion);
        break;

    case "buscar":
        $avionDAO->buscar($avion);
        break;

    case "modificar":
        if(!preg_match($patronValDescripcion, $descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }

        if($idFabricanteSel==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un fabricante"
            ]));
            break;
        }

        if($idMarca==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione una marca"
            ]));
            break;
        }

        if($idColor==-1){
            echo(json_encode(['res' => 'False', "msj" => "seleccione un color"
            ]));
            break;
        }
        $avionDAO->modificar($avion);
        break;

    case "eliminar":
        $avionDAO->eliminar($avion);
        break;

    case "buscarFabricantePorMarca":
        $avionDAO->buscarFabricantePorIdMarca($avion);
        break;

    case "list":
        $avionDAO->listar();
        break;

    case "validarCantidad":
        $avionDAO->cantidadAviones();
        break;
}