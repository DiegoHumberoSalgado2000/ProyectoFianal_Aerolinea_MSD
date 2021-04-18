<?php
class ClsPasajero{
    
    private $id;
    private $Nombre;
    private $Apellido;
    private $Cedula;
    private $Correo;
    private $Telefono;
    private $Contrasena;
    private $Estado;
    private $Descripcion;
    
    function __construct($id, $Nombre, $Apellido, $Cedula, $Correo, $Telefono, $Contrasena, $Estado, $Descripcion) {
        $this->id = $id;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Cedula = $Cedula;
        $this->Correo = $Correo;
        $this->Telefono = $Telefono;
        $this->Contrasena = $Contrasena;
        $this->Estado = $Estado;
        $this->Descripcion = $Descripcion;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido() {
        return $this->Apellido;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getContrasena() {
        return $this->Contrasena;
    }

    function getEstado() {
        return $this->Estado;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    function setApellido($Apellido){
        $this->Apellido = $Apellido;
    }

    function setCedula($Cedula){
        $this->Cedula = $Cedula;
    }

    function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

    function setContrasena($Contrasena){
        $this->Contrasena = $Contrasena;
    }

    function setEstado($Estado){
        $this->Estado = $Estado;
    }

    function setDescripcion($Descripcion){
        $this->Descripcion = $Descripcion;
    }


    
}

