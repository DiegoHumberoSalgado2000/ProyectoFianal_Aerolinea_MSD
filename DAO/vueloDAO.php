<?php

class vueloDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     * Función utilizada para guardar un vuelo,
     * entra como parametro un objeto de tipo vuelo
     */
    public function guardar(clsVuelo $obj){
        $sql="INSERT INTO vuelo(tipo_vuelo,descripcion,estado,id_avion) VALUES ('" . $obj->getTipoVuelo() . "','" . $obj->getDescripcion() . "','disponible','" . $obj->getIdAvion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para buscar un vuelo, 
     *entra como parametro un objeto de tipo vuelo
     */
    public function buscar(clsVuelo $obj){
        $sql="SELECT id,tipo_vuelo,descripcion,estado,id_avion from vuelo where id_avion='" . $obj->getIdAvion() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }
     /**
     *Función utilizada para eliminar un vuelo, 
     *en este caso realiza un actualizar el cual cambia el estado a 'no disponible'
     */
    public function eliminar(clsVuelo $obj){
        $sql="UPDATE vuelo set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para modificar un vuelo, 
     *entra como parametro un objeto de tipo vuelo
     */
    public function modificar(clsVuelo $obj){
        $sql="UPDATE vuelo set tipo_vuelo='" . $obj->getTipoVuelo() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
      /**
     *Funcion utilizada para para listar todos los vuelos con el estado en 'disponible'
     */
    public function listar(){
        $sql="SELECT tipo_vuelo,descripcion,estado,(SELECT placa from avion where id=id_avion ) as nombreavion from vuelo where estado='disponible'";
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