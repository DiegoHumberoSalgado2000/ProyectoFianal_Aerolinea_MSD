<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../DAO/HistorialPagoReservaDAO.php';

$type = isset($_REQUEST['type'])? $_REQUEST['type'] : "";

$historialPagoReservaDao=new HistorialPagoReservaDAO();


switch ($type) {
    
    case "list":
    $historialPagoReservaDao->listar();
        break;

}

