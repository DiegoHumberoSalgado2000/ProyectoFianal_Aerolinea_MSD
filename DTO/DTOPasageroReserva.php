<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DTOPasajeroReserva{
    
    private $Nombre;
    private $Apellido;
    private $Cedula;
    private $Correo;
    private $Telefono;
    private $idReserva;
    
    function __construct($Nombre, $Apellido, $Cedula, $Correo, $Telefono, $idReserva) {
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Cedula = $Cedula;
        $this->Correo = $Correo;
        $this->Telefono = $Telefono;
        $this->idReserva = $idReserva;
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

    function getCorreo() {
        return $this->Correo;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getIdReserva() {
        return $this->idReserva;
    }

    function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido){
        $this->Apellido = $Apellido;
    }

    function setCedula($Cedula){
        $this->Cedula = $Cedula;
    }

    function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

    function setIdReserva($idReserva){
        $this->idReserva = $idReserva;
    }


}


