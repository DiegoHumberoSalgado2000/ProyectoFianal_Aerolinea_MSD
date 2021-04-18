<?php

class PasajeroDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(ClsPasajero $obj) {
        $sql = "INSERT INTO pasajero(id,nombre,apellido,cedula,correo,telefono,contrasena,estado,descripcion)VALUES('" . $obj->getId() . "','" . $obj->getNombre() . "','" . $obj->getApellido() . "','" . $obj->getCedula() . "','" . $obj->getCorreo() . "','" . $obj->getTelefono() . "','" . $obj->getContrasena() . "','" . $obj->getEstado() . "','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(ClsPasajero $obj) {
        $sql="SELECT id,nombre,apellido,cedula,correo,telefono,contrasena,estado,descripcion from pasajero where cedula='". $obj->getCedula()."' and estado='activo'";
        $this->objCon->Execute($sql);
    }
    
}
