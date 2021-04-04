<?php

class clsVuelo{
    private $id;
    private $tipoVuelo;
    private $descripcion;
    private $estado;
    private $idAvion;

    function __construct($id, $tipoVuelo, $descripcion, $estado, $idAvion){
        
        $this->id = $id;
        
        $this->tipoVuelo = $tipoVuelo;
        
        $this->descripcion = $descripcion;

        $this->estado = $estado;
        
        $this->idAvion = $idAvion;
    }

    function getId(){
        return $this->id;
    }
    function getTipoVuelo(){
        return $this->tipoVuelo;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getEstado(){
        return $this->estado;
    }
    function getIdAvion(){
        return $this->idAvion;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setTipoVuelo($tipoVuelo) {
        $this->tipoVuelo = $tipoVuelo;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setIdAvion($idAvion) {
        $this->idAvion = $idAvion;
    }





}