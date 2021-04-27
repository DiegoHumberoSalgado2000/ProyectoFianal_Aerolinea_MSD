<?php

class itinerarioVueloDAO{
    private $con;
    private $objCon;
    
    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     * Función utilizada para guardar un itinerarioVuelo,
     * entra como parametro un objeto tipo ItinerarioVuelo
     */
    public function guardar(clsItinerarioVuelo $obj){
        $sql="INSERT INTO itinerario_vuelo(id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion) VALUES ('" . $obj->getIdVuelo() . "','" . $obj->getIdUbicacionLlegada() . "','" . $obj->getIdUbicacionSalida() . "','" . $obj->getFechaLlegada() . "','" . $obj->getFechaSalida() . "','disponible','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     * Función utilizada para buscar un itinerarioVuelo,
     * entra como parametro un objeto tipo ItinerarioVuelo
     */
    public function buscar(clsItinerarioVuelo $obj){
        $sql="SELECT id,id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where id_vuelo='" . $obj->getIdVuelo() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /**
     * Función utilizada para eliminar ItinerarioVuelo ,en este caso realiza un actualizar 
     * el cual cambia el estado a 'no disponible'
     */
    public function eliminar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     * Función utilizada para modificar un ItinerarioVuelo,
     * entra como parametro un objeto de tipo ItinerarioVuelo
     */
    public function modificar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set id_vuelo='" . $obj->getIdVuelo() . "',id_ubicacion_llegada='" . $obj->getIdUbicacionLlegada() . "',id_ubicacion_salida='" . $obj->getIdUbicacionSalida() . "',fecha_llegada='" . $obj->getFechaLlegada() . "',fecha_salida='" . $obj->getFechaSalida() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     * Función utilizada para listar todos los ItinerarioVuelo con el estado en 'disponible'
     */
    public function listar(){
        $sql="SELECT (SELECT tipo_vuelo from vuelo where id=id_vuelo)as vuelo,(SELECT nombre from ubicacion where id=id_ubicacion_llegada)as nombreUbicacionLlegada,(SELECT nombre from ubicacion where id=id_ubicacion_salida) as nombreUbicacionSalida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where estado='disponible'";
        $this->objCon->Execute($sql);
    }
    /**
     * Funcion utilizada para listar una lista de vuelos
     */
    public function listarVueloSel(){
        $sql="SELECT id,tipo_vuelo from vuelo where estado='disponible' ORDER BY tipo_vuelo";
        $this->objCon->Execute($sql);
    }
    /**
    *Funcion utilizada para listar una lista de ubicacion del vuelo  
    */
    public function listarUbicacion(){
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
    
}