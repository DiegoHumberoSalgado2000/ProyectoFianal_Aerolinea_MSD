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
        $sql = "INSERT INTO avion(placa,id_color,id_marca,descripcion,estado) VALUES ('" . $obj->getPlaca() . "','" . $obj->getIdColor() . "','" . $obj->getIdMarca() . "','" . $obj->getDescripcion() . "','disponible')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsAvion $obj) {
        $sql = "SELECT id,placa,id_color,id_marca,descripcion from avion where placa='" . $obj->getPlaca() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    public function buscarFabricantePorIdMarca(clsAvion $obj) {
        $sql ="SELECT f.id,f.nombre from fabricante f JOIN marca m on m.id_fabricante=f.id where m.id='" . $obj->getIdMarca() . "'";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsAvion $obj) {
        $sql = "UPDATE avion set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsAvion $obj) {
        $sql = "UPDATE avion set placa='" . $obj->getPlaca() . "',id_color='" . $obj->getIdColor() . "',id_marca='" . $obj->getIdMarca() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar() {
        $sql = "SELECT placa,id_color,id_marca,descripcion,estado from avion where estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /**
     *funcion utilizada para listar una Lista.
     */
    public function listarColorSel() {
        $sql = "SELECT id,nombre from color where estado='disponible' ORDER BY nombre";
        $this->objCon->Execute($sql);
    }
    /**
     *funcion utilizada para listar una Lista.
     */
    public function listarFabricanteSel() {
        $sql = "SELECT id,nombre from fabricante where estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /**
     *funcion utilizada para listar una Lista dependiendo del fabricante, utilizado en la gestión del avión.
     */
    public function listarMarcaSel(clsGeneral $obj) {
        $sql = "SELECT id,nombre from marca where id_fabricante='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }



}
