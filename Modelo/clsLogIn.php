<?php

class clsLogIn {

    private $correo;
    private $contrasena;


    function __construct($correo, $contrasena) {
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }


    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }




}

