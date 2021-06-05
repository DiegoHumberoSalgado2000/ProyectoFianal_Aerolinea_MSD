<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gestionDetalleReserva
 *
 * @author Diego
 */
require '../DTO/DTODetalleReserva.php';
require '../DAO/DetalleReservaDAO.php';

$codigoReser = isset($_REQUEST['codigoReser']) ? $_REQUEST['codigoReser'] : "";

$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$detalleReservaDAo = new DetalleReservaDAO();

/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "BuscarDetalleReserva":
        $detalleReservaDAo->BuscarDetalleReserva($codigoReser);
        break;
}
