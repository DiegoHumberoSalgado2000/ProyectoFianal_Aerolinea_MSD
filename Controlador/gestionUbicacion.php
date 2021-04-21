<?php
require '../Modelo/clsUbicacion.php';
require '../DAO/ubicacionDAO.php';

$idUbicacion=isset($_REQUEST['idUbicacion'])? $_REQUEST['idUbicacion']:"";
$nombre=isset($_REQUEST['nombre'])? $_REQUEST['nombre']:"";
$descripcion=isset($_REQUEST['descripcion'])? $_REQUEST['descripcion']:"";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";

$type= isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$ubicacion = new clsUbicacion($idUbicacion,$nombre,$descripcion,$estado);
$ubicacionDAO = new ubicacionDAO();

/**
 *Expresiones regulares.
 */
$patronValNombre="/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValNombreInfo="La ubicación tiene que tener dato alfabetico y entre 3 y 18 caracteres";

$patronValDescripcion="/^[A-Za-z0-9\s]{7,254}$/";/** el patron regular distingue entre mayusculas y minusculas en caso de que no lo haga se pone así  "/^[a-z0-9_-]{3,16}$/i"*/
$patronValDescripcionInfo="La descripción puede tener, letras en mayusculas y minusculas, espacios como también números decimales, El tamaño es de 7 a 254 caracteres. No se permitén otros simbolos";

/**
 *Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch($type){

    case "guardar":

        if(!preg_match($patronValNombre,$nombre)){
            echo(json_encode(['res' => 'False', "msj" => $patronValNombreInfo
            ]));
            break;
        }
        if(!preg_match($patronValDescripcion,$descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }
        $ubicacionDAO->guardar($ubicacion);
        break;
    case "buscar":
        $ubicacionDAO->buscar($ubicacion);
        break;

    case "modificar":
        if(!preg_match($patronValDescripcion,$descripcion)){
            echo(json_encode(['res' => 'False', "msj" => $patronValDescripcionInfo
            ]));
            break;
        }
        $ubicacionDAO->modificar($ubicacion);
        break;
    
    case "eliminar":
        $ubicacionDAO->eliminar($ubicacion);
        break;
}