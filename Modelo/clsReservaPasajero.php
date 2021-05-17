<?php

class ClsReservaPasajero{

    private $id;
    private $id_Reserva;
    private $id_Pasajero;
    private $estado;
    private $descripcion;

    function __construct($id, $id_Reserva, $id_Pasajero, $estado, $descripcion){
        
        $this->id = $id; 
        $this->id_Reserva = $id_Reserva;
        $this->id_Pasajero = $id_Pasajero;
        $this->estado = $estado;
        $this->descripcion = $descripcion;
    }

    function getId() {
        return $this->id;
    }
    function getId_Reserva() {
        return $this->id_Reserva;
    }
    function getId_Pasajero() {
        return $this->id_Pasajero;
    }
    function getEstado() {
        return $this->estado;
    }
    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id){
        $this->id = $id;
    }
    function setId_Reserva($id_Reserva){
        $this->id_Reserva = $id_Reserva;
    }
    function setId_Pasajero($id_Pasajero){
        $this->id_Pasajero = $id_Pasajero;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

}