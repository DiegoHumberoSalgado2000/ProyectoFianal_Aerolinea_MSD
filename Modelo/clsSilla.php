<?php

class clsSilla{
    private $id;
    private $idItinerarioVuelo;
    private $numeroSilla;
    private $estado;
    private $tipo;
    private $descripcion;
    private $precio;

    public function __construct($id, $idItinerarioVuelo, $numeroSilla, $estado, $tipo, $descripcion,$precio){
    $this->$id = $id;
    $this->idItinerarioVuelo = $idItinerarioVuelo;
    $this->numeroSilla = $numeroSilla;
    $this->estado = $estado;
    $this->tipo = $tipo;
    $this->descripcion = $descripcion;
    $this->precio = $precio;
    }

    function getId(){
        return $this->id;
    }
    function getIdItinerarioVuelo(){
        return $this->idItinerarioVuelo;
    }
    function getNumeroSilla(){
        return $this->numeroSilla;
    }
    function getEstado(){
        return $this->estado;
    }
    function getTipo(){
        return $this->tipo;
    }
    function getDescripcion(){
        return $this->descripcion;
    }

    function getPrecio(){
        return $this->precio;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setIdItinerarioVuelo($idItinerarioVuelo) {
        $this->idItinerarioVuelo = $idItinerarioVuelo;
    }
    function setNumeroSilla($numeroSilla) {
        $this->numeroSilla = $numeroSilla;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }


}