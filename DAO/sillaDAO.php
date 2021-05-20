<?php

class sillaDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /*
    *Función utilizada para listar las sillas disponibles
    */
    public function listarSillasDisponibles($idItinerario){
        $sql="SELECT id,id_itinerario_vuelo,numero_silla,precio,estado,tipo,descripcion from silla where id_itinerario_vuelo=$idItinerario";
        $this->objCon->Execute($sql);
    }



    /*
    *Función utilizada para buscar una silla en especifico
    */
    public function buscarSilla($idItinerario,$numeroSilla){
        $sql="SELECT id,id_itinerario_vuelo,numero_silla,precio,estado,tipo,descripcion from silla where id_itinerario_vuelo=$idItinerario and numero_silla=$numeroSilla and estado='disponible'";
        $this->objCon->Execute($sql);
    }
    /*
    *Función utilizada para buscar un pasajero
    */
    public function buscarPasajero($correo,$contrasena){
        $sql="SELECT id,correo,contrasena from pasajero where correo='$correo' and contrasena='$contrasena' and estado='disponible'";
        $this->objCon->Execute($sql);
    }



}