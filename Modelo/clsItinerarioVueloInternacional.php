<?php

class clsItinerarioVueloInternacional{
    private $id;
    private $id_Itinerario_Vuelo_Uno;
    private $id_Itinerario_Vuelo_Dos;
    private $estado;
    private $Descripcion;

    function __construct($id, $id_Itinerario_Vuelo_Uno, $id_Itinerario_Vuelo_Dos, $estado, $Descripcion){
        $this->id = $id;
        $this->id_Itinerario_Vuelo_Uno = $id_Itinerario_Vuelo_Uno;
        $this->id_Itinerario_Vuelo_Dos = $id_Itinerario_Vuelo_Dos;
        $this->estado = $estado;
        $this->Descripcion = $Descripcion;
    }
    function getId(){
        return $this->id;
    }
    function getId_Itinerario_Vuelo_Uno(){
        return $this->id_Itinerario_Vuelo_Uno;
    }
    function getId_Itinerario_Vuelo_Dos(){
        return $this->id_Itinerario_Vuelo_Dos;
    }
    function getEstado(){
        return $this->estado;
    }
    function getDescripcion(){
        return $this->Descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setId_Itinerario_Vuelo_Uno($id_Itinerario_Vuelo_Uno) {
        $this->id_Itinerario_Vuelo_Uno = $id_Itinerario_Vuelo_Uno;
    }
    function setId_Itinerario_Vuelo_Dos($id_Itinerario_Vuelo_Dos) {
        $this->id_Itinerario_Vuelo_Dos = $id_Itinerario_Vuelo_Dos;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

}