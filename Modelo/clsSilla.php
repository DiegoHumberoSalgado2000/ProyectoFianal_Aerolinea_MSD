<?php

class clsSilla{
    private $id;
    private $idVuelo;
    private $numeroSilla;
    private $estado;
    private $tipo;
    private $descripcion;

    public function __construct($id, $idVuelo, $numeroSilla, $estado, $tipo, $descripcion){
    $this->$id = $id;
    $this->idVuelo = $idVuelo;
    $this->numeroSilla = $numeroSilla;
    $this->estado = $estado;
    $this->tipo = $tipo;
    $this->descripcion = $descripcion;
    }

    function getId(){
        return $this->id;
    }
    function getIdVuelo(){
        return $this->idVuelo;
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

    function setId($id) {
        $this->id = $id;
    }
    function setIdVuelo($idVuelo) {
        $this->idVuelo = $idVuelo;
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

}