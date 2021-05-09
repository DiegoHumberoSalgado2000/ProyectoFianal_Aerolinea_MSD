<?php

class avionDAO{

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }
    /**
     *Función utilizada para guardar un avión, entra como parametro un objeto de tipo avión
     */
    public function guardar(clsAvion $obj) {
        $sql = "INSERT INTO avion(placa,id_color,id_marca,descripcion,estado) VALUES ('" . $obj->getPlaca() . "','" . $obj->getIdColor() . "','" . $obj->getIdMarca() . "','" . $obj->getDescripcion() . "','disponible')";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para buscar un avión, entra como parametro un objeto de tipo avión
     */

    public function buscar(clsAvion $obj) {
        $sql = "SELECT id,placa,id_color,id_marca,descripcion from avion where placa='" . $obj->getPlaca() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }
    /**
     *Función utilizada para buscar un fabricante por el id de la marca, entra como parametro un objeto de tipo avión
     */

    public function buscarFabricantePorIdMarca(clsAvion $obj) {
        $sql ="SELECT f.id,f.nombre from fabricante f JOIN marca m on m.id_fabricante=f.id where m.id='" . $obj->getIdMarca() . "'";
        $this->objCon->Execute($sql);
    }
    /**
     *Función utilizada para eliminar un avión, en este caso realiza un actualizar el cual cambia el estado a 'no disponible'
     */
    public function eliminar(clsAvion $obj) {
        $sql = "UPDATE avion set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
    /**
     *Función utilizada para modificar un avión, entra como parametro un objeto de tipo avión
     */
    public function modificar(clsAvion $obj) {
        $sql = "UPDATE avion set id_color='" . $obj->getIdColor() . "',id_marca='" . $obj->getIdMarca() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     *Funcion utilizada para para listar todos lo aviones con el estado en 'disponible'
     */

    public function listar() {
        $sql = "SELECT placa,(SELECT nombre from color where id=id_color) as nombreColor,(SELECT nombre from marca where id=id_marca) as nombreMarca,descripcion,estado from avion where estado='disponible'";
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

    /**
     *funcion utilizada para mostrar la cantidad de aviones registrados.
     */
    public function cantidadAviones() {
        $sql = "SELECT count(id) cantidad from avion";
        $this->objCon->Execute($sql);
    }

}
