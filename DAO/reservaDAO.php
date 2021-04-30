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
    *Funcion utilizada para listar una lista de ubicacion del vuelo  
    */
    public function listarUbicacionLlegada(){
        $sql= "SELECT id,nombre from ubicacion where estado='disponible' ORDER BY nombre";
        $this->objCon->Execute($sql);
    }

    /**
     * Función utilizada para listar una lista dependiendo de la ubicacion de ida ,
     * utilizando en la gestion del Itinerario vuelo
     */
    public function listarubicacionSalida(clsGeneral $obj){
        $sql="SELECT id,nombre from ubicacion where id!='" . $obj->getId() . "' and estado='disponible' ORDER BY nombre";
        $this->objCon->Execute($sql);
    }
    /**
     *funcion utilizada para listar una Lista dependiendo del ubicacion de salidas, utilizado en la gestión del itinerario vuelo.
     */
    public function listarUbicacionSalidaSel(clsGeneral $obj) {
        $sql = "SELECT id,nombre from ubicacion where id='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    

    
}