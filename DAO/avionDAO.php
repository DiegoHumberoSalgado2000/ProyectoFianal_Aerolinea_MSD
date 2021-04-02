<?php

class avionDAO{

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsAvion $obj) {
        $sql = "INSERT INTO avion(placa,id_color,id_marca,descripcion,estado) VALUES ('" . $obj->getPlaca() . "','" . $obj->getIdColor() . "','" . $obj->getIdMarca() . "','" . $obj->getDescripcion() . "','" . $obj->getEstado() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsAvion $obj) {
        $sql = "SELECT id,placa,id_color,id_marca,descripcion,estado from avion where id='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsAvion $obj) {
        $sql = "UPDATE avion set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsAvion $obj) {
        $sql = "UPDATE avion set placa='" . $obj->getPlaca() . "',id_color='" . $obj->getIdColor() . "',id_marca='" . $obj->getIdMarca() . "',descripcion='" . $obj->getDescripcion() . "',estado='" . $obj->getEstado() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar() {
        $sql = "SELECT placa,id_color,id_marca,descripcion,estado from avion where estado='disponible'";
        $this->objCon->Execute($sql);
    }




}
