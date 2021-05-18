<?php

class reservaDAO{

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardarReserva(ClsReserva $obj){
        $sql="INSERT INTO reserva(id_silla,id_pasajero_principal,estado,fecha_hora_reserva,descripcion)VALUES ('" . $obj->getId_Silla() . "','" . $obj->getId_Pasajero_Principal() . "','" . $obj->getEstado() . "','" . $obj->getFecha_Hora_Reserva() . "','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
    *Funcion utilizada para listar las ubicaciones disponibles
    */
    public function listarUbicaciones(){
        $sql= "SELECT id,nombre from ubicacion where estado='disponible' ORDER BY nombre";
        $this->objCon->Execute($sql);
    }

    /**
     * Función utilizada para listar una lista dependiendo de la ubicacion de salida.
     */
    public function listarubicacionLlegada(clsGeneral $obj){
        $sql="SELECT id,nombre from ubicacion where id!='" . $obj->getId() . "' and estado='disponible' ORDER BY nombre";
        $this->objCon->Execute($sql);
    }
    /**
     *funcion utilizada para listar una Lista dependiendo del ubicacion de llegada.
     */
    public function listarUbicacionLlegadaSel(clsGeneral $obj) {
        $sql = "SELECT id,nombre from ubicacion where id='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }


    public function buscarVueloReserva($fechaLlegada,$fechaSalida,$ubicacionLlegada,$ubicacionSalida){
        $sql="SELECT id,(select a.placa from vuelo v join avion a on v.id_avion=a.id where v.id=id_vuelo)as placa,(select nombre from ubicacion where id=id_ubicacion_llegada)as ubicacionLlegada,(select nombre from ubicacion where id=id_ubicacion_salida)as ubicacionSalida,fecha_llegada,fecha_salida,estado,precio,descripcion from itinerario_vuelo where id_ubicacion_llegada='$ubicacionLlegada' and id_ubicacion_salida='$ubicacionSalida' and DATE(fecha_llegada)='$fechaLlegada' and DATE(fecha_salida)='$fechaSalida'";
        $this->objCon->Execute($sql);
    }

}