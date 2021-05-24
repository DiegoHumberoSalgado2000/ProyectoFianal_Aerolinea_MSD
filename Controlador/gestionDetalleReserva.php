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

$nombre = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : "";
$apellido = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : "";
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$telefono = isset($_REQUEST['telefono_celular']) ? $_REQUEST['telefono_celular'] : "";
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$ubicacionSalida = isset($_REQUEST['nombreUbicacionSalida']) ? $_REQUEST['nombreUbicacionSalida'] : "";
$ubicacionLlegada = isset($_REQUEST['nombreUbicacionLlegada']) ? $_REQUEST['nombreUbicacionLlegada'] : "";
$fechaSalida = isset($_REQUEST['fecha_salida']) ? $_REQUEST['fecha_salida'] : "";
$fechaLlegada = isset($_REQUEST['fecha_llegada']) ? $_REQUEST['fecha_llegada'] : "";
$numeroVuelo = isset($_REQUEST['placa']) ? $_REQUEST['placa'] : "";
$precioSilla = isset($_REQUEST['precioSilla']) ? $_REQUEST['precioSilla'] : "";
$precioTiquete = isset($_REQUEST['precioTiquete']) ? $_REQUEST['precioTiquete'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";


$detalleReserva = new DTODetalleReserva($nombre, $apellido, $cedula, $telefono, $correo, $ubicacionSalida, $ubicacionLlegada, $fechaSalida, $fechaLlegada, $numeroVuelo, $precioSilla, $precioTiquete);
$detalleReservaDAo = new DetalleReservaDAO();

/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "BuscarDetalleReserva":
        $detalleReservaDAo->BuscarDetalleReserva($detalleReserva);
        break;
    case "BuscarEnviarInformacion":
        $detalleReservaDAo->buscarEnviarInformacion($detalleReserva);
        break;
}
