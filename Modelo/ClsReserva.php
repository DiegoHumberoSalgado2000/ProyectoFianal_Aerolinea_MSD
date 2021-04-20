<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClsReserva
 *
 * @author Diego
 */
class ClsReserva {
    
    private $Id;
    private $Id_Silla;
    private $Id_Pasajero_Principal;
    private $Estado;
    private $Fecha_Hora_Reserva;
    private $Descripcion;
    
    
    function __construct($Id, $Id_Silla, $Id_Pasajero_Principal, $Estado, $Fecha_Hora_Reserva, $Descripcion) {
        $this->Id = $Id;
        $this->Id_Silla = $Id_Silla;
        $this->Id_Pasajero_Principal = $Id_Pasajero_Principal;
        $this->Estado = $Estado;
        $this->Fecha_Hora_Reserva = $Fecha_Hora_Reserva;
        $this->Descripcion = $Descripcion;
    }

    function getId() {
        return $this->Id;
    }

    function getId_Silla() {
        return $this->Id_Silla;
    }

    function getId_Pasajero_Principal() {
        return $this->Id_Pasajero_Principal;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getFecha_Hora_Reserva() {
        return $this->Fecha_Hora_Reserva;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function setId($Id){
        $this->Id = $Id;
    }

    function setId_Silla($Id_Silla){
        $this->Id_Silla = $Id_Silla;
    }

    function setId_Pasajero_Principal($Id_Pasajero_Principal){
        $this->Id_Pasajero_Principal = $Id_Pasajero_Principal;
    }

    function setEstado($Estado){
        $this->Estado = $Estado;
    }

    function setFecha_Hora_Reserva($Fecha_Hora_Reserva){
        $this->Fecha_Hora_Reserva = $Fecha_Hora_Reserva;
    }

    function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }

}
