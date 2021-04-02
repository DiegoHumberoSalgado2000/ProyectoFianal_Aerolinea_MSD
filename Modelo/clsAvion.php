<?php
class clsAvion{
    private $id;
    private $descripcion;
    private $estado;
    private $placa;
    private $idColor;
    private $idMarca;

    function __construct($id, $descripcion, $estado, $placa, $idColor, $idMarca) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->placa = $placa;
        $this->idColor = $idColor;
        $this->idMarca = $idMarca;
    }

    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEstado() {
        return $this->estado;
    }

    function getPlaca() {
        return $this->placa;
    }

    function getIdColor() {
        return $this->idColor;
    }

    function getIdMarca() {
        return $this->idMarca;
    }

    function setId($estado) {
        $this->estado = $estado;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function setIdColor($idColor) {
        $this->idColor = $idColor;
    }

    function setIdMarca($idMarca) {
        $this->idMarca = $idMarca;
    }
}