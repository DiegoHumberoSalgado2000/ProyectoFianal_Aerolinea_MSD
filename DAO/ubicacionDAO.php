<?php

class ubicacionDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     *Función utilizada para guardar un ubicación, 
     *entra como parametro un objeto de tipo ubicación
     */
    public function guardar(clsUbicacion $obj){
        $sql="INSERT INTO ubicacion(nombre,descripcion,estado) VALUES ('" . $obj->getNombre() . "','" . $obj->getDescripcion() . "','disponible')";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para buscar un ubicación,
     * entra como parametro un objeto de tipo ubicación
     */
    public function buscar(clsUbicacion $obj){
        $sql="SELECT id,nombre,descripcion,estado from ubicacion where nombre='" . $obj->getNombre() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }
    /**
     *Función utilizada para eliminar una ubicación,
     * en este caso realiza un actualizar el cual cambia el estado a 'no disponible'
     */
    public function eliminar(clsUbicacion $obj){
        $sql="UPDATE ubicacion set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para modificar una ubicación,
     * entra como parametro un objeto de tipo ubicación
     */
    public function modificar(clsUbicacion $obj){
        $sql="UPDATE ubicacion set descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
}