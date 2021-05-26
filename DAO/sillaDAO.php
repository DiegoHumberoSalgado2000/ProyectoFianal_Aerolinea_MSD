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

    /*
    *Función utilizada para obtener el nuevo codigo de la reserva
    */
    public function obtenerNuevoCodigoReserva(){
        $sql="SELECT MAX(codigo)+1 ultimo FROM reserva";
        $this->objCon->Execute($sql);
    }

    /*
    *Función utilizada para guardar una reserva
    */
    public function guardarReserva($silla,$pasajeroPrincipal,$fechaHoy,$codigo){
        $sql="INSERT INTO reserva (id_silla,id_pasajero_principal,codigo,estado,fecha_hora_reserva,descripcion) values($silla,$pasajeroPrincipal,$codigo,'disponible','$fechaHoy','ninguna')";
        $this->objCon->ExecuteTransaction($sql);
    }



    /*
    *Función utilizada para saber si un pasajero ya seleccióno una silla con anterioridad
    */
    public function saberSiSeleccionoSilla($correo,$contrasena,$itinerarioVuelo){
        $sql="SELECT id FROM reserva where id_pasajero_principal=(select id from pasajero where correo='$correo' and contrasena='$contrasena' )and id_silla=(SELECT id from silla where id=id_silla and id_itinerario_vuelo=$itinerarioVuelo)  and estado='disponible' or estado='pagado' or estado='checkin'";
        $this->objCon->Execute($sql);
    }

    /*
    *Función utilizada para obtener la cedula del pasajar
    */
    public function obtenerCedulaPasajero($pasajeroPrincipal){
        $sql="SELECT cedula from pasajero where id=$pasajeroPrincipal";
        $this->objCon->Execute($sql);
    }

}