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
        $sql="SELECT id,id_vuelo,numero_silla,precio,estado,tipo,descripcion from silla where id_vuelo=(SELECT id_vuelo from itinerario_vuelo where id=$idItinerario) and estado='disponible'";
        $this->objCon->Execute($sql);
    }



    /*
    *Función utilizada para buscar una silla en especifico
    */
    public function listarSillasDisponibles($idItinerario,$idSilla){
        $sql="SELECT id,id_vuelo,numero_silla,precio,estado,tipo,descripcion from silla where id_vuelo=(SELECT id_vuelo from itinerario_vuelo where id=3) and estado='disponible' and id=$idSilla";
        $this->objCon->Execute($sql);
    }



}