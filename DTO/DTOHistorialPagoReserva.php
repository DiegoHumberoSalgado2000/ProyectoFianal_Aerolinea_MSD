<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTOHistorialPagoReserva
 *
 * @author Diego
 */
class DTOHistorialPagoReserva {

    //put your code here

    private $CodigoReserva;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    private $Correo;
    private $Estado;
    private $Descripcion;
    private $PrecioSilla;
    private $PrecioVuelo;
    private $TotalPago;
    private $TarjetaCredito;
    private $TipoVuelo;

    function __construct($CodigoReserva, $Nombre, $Apellido, $Telefono, $Correo, $Estado, $Descripcion, $PrecioSilla, $PrecioVuelo, $TotalPago, $TarjetaCredito, $TipoVuelo) {
        $this->CodigoReserva = $CodigoReserva;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Telefono = $Telefono;
        $this->Correo = $Correo;
        $this->Estado = $Estado;
        $this->Descripcion = $Descripcion;
        $this->PrecioSilla = $PrecioSilla;
        $this->PrecioVuelo = $PrecioVuelo;
        $this->TotalPago = $TotalPago;
        $this->TarjetaCredito = $TarjetaCredito;
        $this->TipoVuelo = $TipoVuelo;
    }

    function getCodigoReserva() {
        return $this->CodigoReserva;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getPrecioSilla() {
        return $this->PrecioSilla;
    }

    function getPrecioVuelo() {
        return $this->PrecioVuelo;
    }

    function getTotalPago() {
        return $this->TotalPago;
    }

    function getTarjetaCredito() {
        return $this->TarjetaCredito;
    }

    function getTipoVuelo() {
        return $this->TipoVuelo;
    }

    function setCodigoReserva($CodigoReserva) {
        $this->CodigoReserva = $CodigoReserva;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    function setPrecioSilla($PrecioSilla) {
        $this->PrecioSilla = $PrecioSilla;
    }

    function setPrecioVuelo($PrecioVuelo) {
        $this->PrecioVuelo = $PrecioVuelo;
    }

    function setTotalPago($TotalPago) {
        $this->TotalPago = $TotalPago;
    }

    function setTarjetaCredito($TarjetaCredito) {
        $this->TarjetaCredito = $TarjetaCredito;
    }

    function setTipoVuelo($TipoVuelo) {
        $this->TipoVuelo = $TipoVuelo;
    }

}
