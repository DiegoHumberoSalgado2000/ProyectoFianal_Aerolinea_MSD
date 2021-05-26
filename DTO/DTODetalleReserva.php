<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTODetalleReserva
 *
 * @author Diego
 */
class DTODetalleReserva {

    //put your code here

    private $Nombre;
    private $Apellido;
    private $Cedula;
    private $Telefono;
    private $Correo;
    private $UbicacionSalida;
    private $UbicacionLlegada;
    private $FechaSalida;
    private $FechaLlegada;
    private $NumeroVuelo;
    private $PrecioSilla;
    private $PrecioTiquete;
    private $precioTotalPagar;

    function __construct($Nombre, $Apellido, $Cedula, $Telefono, $Correo, $UbicacionSalida, $UbicacionLlegada, $FechaSalida, $FechaLlegada, $NumeroVuelo, $PrecioSilla, $PrecioTiquete, $precioTotalPagar) {
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Cedula = $Cedula;
        $this->Telefono = $Telefono;
        $this->Correo = $Correo;
        $this->UbicacionSalida = $UbicacionSalida;
        $this->UbicacionLlegada = $UbicacionLlegada;
        $this->FechaSalida = $FechaSalida;
        $this->FechaLlegada = $FechaLlegada;
        $this->NumeroVuelo = $NumeroVuelo;
        $this->PrecioSilla = $PrecioSilla;
        $this->PrecioTiquete = $PrecioTiquete;
        $this->precioTotalPagar = $precioTotalPagar;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getUbicacionSalida() {
        return $this->UbicacionSalida;
    }

    function getUbicacionLlegada() {
        return $this->UbicacionLlegada;
    }

    function getFechaSalida() {
        return $this->FechaSalida;
    }

    function getFechaLlegada() {
        return $this->FechaLlegada;
    }

    function getNumeroVuelo() {
        return $this->NumeroVuelo;
    }

    function getPrecioSilla() {
        return $this->PrecioSilla;
    }

    function getPrecioTiquete() {
        return $this->PrecioTiquete;
    }

    function getPrecioTotalPagar() {
        return $this->precioTotalPagar;
    }

    function setNombre($Nombre): void {
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido): void {
        $this->Apellido = $Apellido;
    }

    function setCedula($Cedula): void {
        $this->Cedula = $Cedula;
    }

    function setTelefono($Telefono): void {
        $this->Telefono = $Telefono;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setUbicacionSalida($UbicacionSalida) {
        $this->UbicacionSalida = $UbicacionSalida;
    }

    function setUbicacionLlegada($UbicacionLlegada) {
        $this->UbicacionLlegada = $UbicacionLlegada;
    }

    function setFechaSalida($FechaSalida) {
        $this->FechaSalida = $FechaSalida;
    }

    function setFechaLlegada($FechaLlegada) {
        $this->FechaLlegada = $FechaLlegada;
    }

    function setNumeroVuelo($NumeroVuelo) {
        $this->NumeroVuelo = $NumeroVuelo;
    }

    function setPrecioSilla($PrecioSilla) {
        $this->PrecioSilla = $PrecioSilla;
    }

    function setPrecioTiquete($PrecioTiquete) {
        $this->PrecioTiquete = $PrecioTiquete;
    }

    function setPrecioTotalPagar($precioTotalPagar) {
        $this->precioTotalPagar = $precioTotalPagar;
    }

}
