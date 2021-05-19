<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../DTO/DTOPasageroReserva.php';
require '../DAO/pasajeroReservaDAO.php';

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$nombre = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : "";
$apellido = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : "";
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$telefono = isset($_REQUEST['telefono_celular']) ? $_REQUEST['telefono_celular'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$pasajeroReserva = new DTOPasajeroReserva($nombre, $apellido, $cedula, $correo, $telefono, $id);
$pasajeroReservaDAO = new pasajeroReservaDAO();


/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {

    case "cargarDatos":

        $pasajeroReservaDAO->CargarDatos($pasajeroReserva);
        break;
}


