<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../DTO/DTOPasageroReserva.php';
require '../DAO/pasajeroReservaDAO.php';

$codigoRese = isset($_REQUEST['codigoRese']) ? $_REQUEST['codigoRese'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$pasajeroReservaDAO = new pasajeroReservaDAO();



/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {

    case "cargarDatos":

        $pasajeroReservaDAO->CargarDatos($codigoRese);
        break;
}


