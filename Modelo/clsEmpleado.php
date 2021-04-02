<?php
class clsEmpleado {
    private $id;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $correo;
    private $telefonoCelular;
    private $contrasena;
    private $estado;
    private $descripcion;

    function __construct($id, $nombres, $apellidos, $cedula,$correo,$telefonoCelular,$contrasena,$estado,$descripcion) {
        $this->id = $id;
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->cedula=$cedula;
        $this->correo=$correo;
        $this->telefonoCelular=$telefonoCelular;
        $this->contrasena=$contrasena;
        $this->estado=$estado;
        $this->descripcion=$descripcion;



    }
    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombres;
    }
    function getApellidos() {
        return $this->apellidos;
    }
    function getCedula() {
        return $this->cedula;
    }
    function getCorreo() {
        return $this->correo;
    }
    function getTelefonoCelular() {
        return $this->telefonoCelular;
    }
    function getContrasena() {
        return $this->contrasena;
    }
    function getEstado() {
        return $this->estado;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombres) {
        $this->nombres = $nombres;
    }
    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    function setCedula($cedula) {
        $this->cedula = $cedula;
    }
    function setCorreo($correo) {
        $this->correo = $correo;
    }
    function setTelefonoCelular($telefonoCelular) {
        $this->telefonoCelular = $telefonoCelular;
    }
    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
}

