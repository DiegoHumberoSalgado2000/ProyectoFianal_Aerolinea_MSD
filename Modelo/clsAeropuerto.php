<?php

class clsAeropuerto {

    private $id;
    private $nombre;
    private $descripcion;
    private $estado;
    private $id_Ubicacion;

    function __construct($id, $nombre, $descripcion, $estado, $id_Ubicacion){
        
        $this->id  = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->id_Ubicacion = $id_Ubicacion;
    }

    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function getEstado() {
        return $this->estado;
    }
    function getId_Ubicacion() {
        return $this->id_Ubicacion;
    }

    function setId($id){
        $this->id = $id;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function setId_Ubicacion($id_Ubicacion){
        $this->id_Ubicacion = $id_Ubicacion;
    }


}