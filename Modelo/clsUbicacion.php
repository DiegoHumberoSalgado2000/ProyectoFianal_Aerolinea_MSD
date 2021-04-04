<?php

class clsUbicacion {
    private $id;
    private $nombre;
    private $descripcion;
    private $estado;

    function __construct($id, $nombre, $descripcion, $estado)

    
    {                                                                   
        $this->id = $id;

        $this->nombre = $nombre;
        
        $this->descripcion = $descripcion;

        $this->estado = $estado;
    }

    function getId(){
        return $this->id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getDescripcion(){
        return $this->descripcion;
    }
    function getEstado(){
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }


}