<?php

class itinerarioVuelo{
    private $con;
    private $objCon;
    
    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsItinerarioVuelo $obj){
        $sql="INSERT INTO itinerario_vuelo(id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion) VALUES ('" . $obj->getIdVuelo() . "','" . $obj->getIdUbicacionLlegada() . "','" . $obj->getIdUbicacionSalida() . "','" . $obj->getFechaLlegada() . "','" . $obj->getFechaSalida() . "','" . $obj->getEstado() . "','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsItinerarioVuelo $obj){
        $sql="SELECT id,id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where id='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsItinerarioVuelo $obj){
        $sql="UPDATE itinerario_vuelo set id_vuelo='" . $obj->getIdVuelo() . "',id_ubicacion_llegada='" . $obj->getIdUbicacionLlegada() . "',id_ubicacion_salida='" . $obj->getIdUbicacionSalida() . "',fecha_llegada='" . $obj->getFechaLlegada() . "',fecha_salida='" . $obj->getFechaSalida() . "',estado='" . $obj->getEstado() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar(){
        $sql="SELECT id_vuelo,id_ubicacion_llegada,id_ubicacion_salida,fecha_llegada,fecha_salida,estado,descripcion from itinerario_vuelo where estado='disponible'";
        $this->objCon->Execute($sql);
    }
    
    
}