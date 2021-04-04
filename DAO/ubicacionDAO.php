<?php

class ubicacionDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsUbicacion $obj){
        $sql="INSERT INTO ubicacion(nombre,descripcion,estado) VALUES ('" . $obj->getNombre() . "','" . $obj->getDescripcion() . "','" . $obj->getEstado() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }
    public function buscar(clsUbicacion $obj){
        $sql="SELECT id,nombre,descripcion,estado from ubicacion where id='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }
    public function eliminar(clsUbicacion $obj){
        $sql="UPDATE ubicacion set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    public function modificar(clsUbicacion $obj){
        $sql="UPDATE ubicacion set descripcion='" . $obj->getDescripcion() . "',estado='" . $obj->getEstado() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
}