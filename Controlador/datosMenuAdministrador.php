<?php

require '../DAO/datosMenuAdministradorDAO.php';



$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";


$dao= new datosMenuAdministradorDAO();




switch ($type) {
    case "buscarAdministradorCorreo":
        $dao->buscarAdministradorCorreo($correo);
        break;
}


