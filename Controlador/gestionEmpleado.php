<?php
require '../Modelo/clsEmpleado.php';

$type= isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$empleadoDAO=new empleadoDAO();

switch($type){

    
    case "list":
        $empleadoDAO->listar();
        break;
}