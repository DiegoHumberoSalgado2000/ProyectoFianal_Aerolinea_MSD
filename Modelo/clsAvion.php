<?php

class clsAvion{

    private $id;
    private $descripcion;
    private $estado;
    private $placa;
    private $color;
    private $marca;
  
    function __construct($id, $descripcion, $estado, $placa, $color, $marca) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->placa = $placa;
        $this->color = $color;
        $this->marca = $marca;
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
    function getColor() {
        return $this->color;
    }

    function getMarca() {
        return $this->marca;
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

    function setColor($color) {
        $this->color = $color;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    

}