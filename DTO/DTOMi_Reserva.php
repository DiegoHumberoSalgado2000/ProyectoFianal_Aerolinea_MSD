<?php

class DTOMi_Reserva{
    private $nombre;
    private $apellido;
    private $cedula;
    private $telefono;
    private $correo;
    private $idReserva;
    private $codigoReserva;
    private $silla;
    private $origen;
    private $destino;
    private $fecha_Salida;
    private $fecha_Llegada;
    private $Estado_Reserva;
    private $idVuelo;
    private $Estado_Vuelo;
    private $Placa_Avion;
    function __construct($nombre, $apellido, $cedula, $telefono, $correo,$idReserva,$codigoReserva, $silla, $origen, $destino, $fecha_Salida, $fecha_Llegada, $Estado_Reserva, $idVuelo, $Estado_Vuelo, $Placa_Avion)

    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->idReserva = $idReserva;
        $this->codigoReserva=$codigoReserva; 
        $this->silla = $silla;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->fecha_Salida = $fecha_Salida;
        $this->fecha_Llegada = $fecha_Llegada;
        $this->Estado_Reserva = $Estado_Reserva;  
        $this->idVuelo = $idVuelo;
        $this->Estado_Vuelo = $Estado_Vuelo;
        $this->Placa_Avion = $Placa_Avion;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getApellido(){
        return $this->apellido;
    }
    function getCedula(){
        return $this->cedula;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function getCorreo(){
        return $this->correo;
    }
    function getId_Reserva(){
        return $this->idReserva;
    }
    function getCodigoReserva(){
        return $this->codigoReserva;
    }
    function getSilla(){
        return $this->silla;
    }
    function getOrigen(){
        return $this->origen;
    }
    function getDestino(){
        return $this->destino;
    }
    function getFecha_Salida(){
        return $this->fecha_Salida;
    }
    function getFecha_Llegada(){
        return $this->fecha_Llegada;
    }
    function getEstado_Reserva(){
        return $this->Estado_Reserva;
    }
    function getId_Vuelo(){
        return $this->idVuelo;
    }
    function getEstado_Vuelo(){
        return $this->Estado_Vuelo;
    }
    function getPlaca_Avion(){
        return $this->Placa_Avion;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setApellido($apellido){
        $this->apellido = $apellido;
    }
    function setCedula($cedula){
        $this->cedula = $cedula;
    }
    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    function setCorreo($correo){
        $this->correo = $correo;
    }
    function setId_Reserva($idReserva){
        $this->idReserva = $idReserva;
    }
    function setCodigoReserva($codigoReserva){
        $this->codigoReserva = $codigoReserva;
    }
    function setSilla($silla){
        $this->silla = $silla;
    }
    function setOrigen($origen){
        $this->origen = $origen;
    }
    function setDestino($destino){
        $this->destino = $destino;
    }
    function setFecha_Salida($fecha_Salida){
        $this->fecha_Salida = $fecha_Salida;
    }
    function setFecha_Llegada($fecha_Llegada){
        $this->fecha_Llegada = $fecha_Llegada;
    }
    function setEstado_Reserva($Estado_Reserva){
        $this->Estado_Reserva = $Estado_Reserva;
    }
    function setId_Vuelo($idVuelo){
        $this->idVuelo = $idVuelo;
    }
    function setEstado_Vuelo($Estado_Vuelo){
        $this->Estado_Vuelo = $Estado_Vuelo;
    }
    function setPlaca_Avion($Placa_Avion){
        $this->Placa_Avion = $Placa_Avion;
    }

} 
