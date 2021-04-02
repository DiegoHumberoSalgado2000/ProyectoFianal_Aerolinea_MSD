<?php

class clsMarca{
    private $id;
    private $nombre;
    private $descripcion;
    private $estado;
    private $idFabricante;

    function __construct($id, $nombre, $descripcion, $estado,$idFabricante) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->idFabricante=$idFabricante;
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

    function getIdFabricante() {
        return $this->idFabricante;
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

    function setIdFabricante($idFabricante) {
        $this->idFabricante = $idFabricante;
    }

}