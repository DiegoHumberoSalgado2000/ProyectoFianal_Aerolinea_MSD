<?php



require '../DAO/HistorialReservaDAO.php';


$correo= isset($_REQUEST['correo'])? $_REQUEST['correo']:"";


$type=isset($_REQUEST['type'])? $_REQUEST['type'] : "";


$dao=new HistorialReservaDAO();


switch ($type) {

    case "listarHistorialReserva":
        $dao->ListarHistorialReserva($correo);
        break;
}

