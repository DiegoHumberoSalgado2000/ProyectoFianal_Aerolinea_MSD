<?php

class marcaDAO{

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }
    /**
     *funcion utilizada para listar una Lista dependiendo del fabricante, utilizado en la gestión del avión.
     */
    public function listarSel(clsGeneral $obj) {
        $sql = "SELECT id,nombre from marca where id_fabricante='" . $obj->getId() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /**
     *funcion utilizada para listar las marcas disponibles.
     */

    public function listar() {
        $sql = "SELECT nombre,descripcion,estado,id_fabricante from marca where estado='disponible'";
        $this->objCon->Execute($sql);
    }




}