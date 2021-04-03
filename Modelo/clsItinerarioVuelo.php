<?php

class clsItinerarioVuelo{
    private $id;
    private $idVuelo;
    private $idUbicacionLlegada;
    private $idUbicacionSalida;
    private $fechaLlegada;
    private $fechaSalida;
    private $estado;
    private $descripcion;

    function __construct($id, $idVuelo, $idUbicacionLlegada, $idUbicacionSalida, $fechaLlegada, $fechaSalida, $estado, $descripcion){ 
    $this->id = $id;
    $this->idVuelo = $idVuelo;
    $this->idUbicacionLlegada = $idUbicacionLlegada;
    $this->idUbicacionSalida = $idUbicacionSalida;
    $this->fechaLlegada = $fechaLlegada;
    $this->fechaSalida = $fechaSalida;
    $this->estado = $estado;
    $this->descripcion = $descripcion;  
    }

    function getId(){
        return $this->id;
    }
    function getIdVuelo(){
        return $this->idVuelo;
    }
    function getIdUbicacionLlegada(){
        return $this->idUbicacionLlegada;
    }
    function getIdUbicacionSalida(){
        return $this->idUbicacionSalida;
    }
    function getFechaLlegada(){
        return $this->fechaLlegada;
    }
    function getFechaSalida(){
        return $this->fechaSalida;
    }
    function getEstado(){
        return $this->estado;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setIdVuelo($idVuelo) {
        $this->idVuelo = $idVuelo;
    }
    function setIdUbicacionLLegada($idUbicacionLlegada) {
        $this->idUbicacionLlegada = $idUbicacionLlegada;
    }
    function setIdUbicacionSalida($idUbicacionSalida) {
        $this->idUbicacionSalida = $idUbicacionSalida;
    }
    function setFechaLlegada($fechaLlegada) {
        $this->fechaLlegada = $fechaLlegada;
    }
    function setFechaSalida($fechaSalida) {
        $this->fechaSalida = $fechaSalida;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }










    
}