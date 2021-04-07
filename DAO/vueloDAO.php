<?php

class vueloDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsVuelo $obj){
        $sql="INSERT INTO vuelo(tipo_vuelo,descripcion,estado,id_avion) VALUES ('" . $obj->getTipoVuelo() . "','" . $obj->getDescripcion() . "','disponible','" . $obj->getIdAvion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }
    public function buscar(clsVuelo $obj){
        $sql="SELECT id,tipo_vuelo,descripcion,estado,id_avion from vuelo where id_avion='" . $obj->getTipoVuelo() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }
    public function eliminar(clsVuelo $obj){
        $sql="UPDATE vuelo set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    public function modificar(clsVuelo $obj){
        $sql="UPDATE vuelo set tipo_vuelo='" . $obj->getTipoVuelo() . "',descripcion='" . $obj->getDescripcion() . "',id_avion='" . $obj->getIdAvion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    public function listar(){
        $sql="SELECT tipo_vuelo,descripcion,estado,id_avion from vuelo where estado='disponible'";
        $this->objCon->Execute($sql);
    }
    /**
     * Funcion utilizada para listar los aviones disponibles
     */

    public function listarAvionSel(){
        $sql="SELECT id,placa from avion where estado='disponible'";
        $this->objCon->Execute($sql);
    }
}