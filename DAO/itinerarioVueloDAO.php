<?php

class itinerarioVueloDAO{
    private $con;
    private $objCon;
    
    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsItinerarioVuelo $obj){
        $sql="INSERT INTO itinerario_vuelo(id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion) VALUES ('" . $obj->getIdVuelo() . "','" . $obj->getIdUbicacionLlegada() . "','" . $obj->getIdUbicacionSalida() . "','" . $obj->getFechaLlegada() . "','" . $obj->getFechaSalida() . "','disponible','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsItinerarioVuelo $obj){
        $sql="SELECT id,id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where id_vuelo='" . $obj->getIdVuelo() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set id_vuelo='" . $obj->getIdVuelo() . "',id_ubicacion_llegada='" . $obj->getIdUbicacionLlegada() . "',id_ubicacion_salida='" . $obj->getIdUbicacionSalida() . "',fecha_llegada='" . $obj->getFechaLlegada() . "',fecha_salida='" . $obj->getFechaSalida() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar(){
        $sql="SELECT id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where estado='disponible'";
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
    
}