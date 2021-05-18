<?php

class PasajeroDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }
    
    /**
     *Función utilizada para guardar un Pasajero, 
     *entra como parametro un objeto de tipo Pasajero
     */
    public function guardar(ClsPasajero $obj) {
        $sql = "INSERT INTO Pasajero(nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion)VALUES('" . $obj->getNombre() . "','" . $obj->getApellido() . "','" . $obj->getCedula() . "','" . $obj->getCorreo() . "','" . $obj->getTelefono() . "','" . $obj->getContrasena() . "','disponible','ninguno')";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     *Función utilizada para buscar un Pasajero, 
     *entra como parametro un objeto de tipo Pasajero
     */
    public function buscar(ClsPasajero $obj) {
        $sql = "SELECT id,nombres,apellidos,cedula,correo,telefono_celular,estado,descripcion from Pasajero where cedula='" . $obj->getCedula() . "' and estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /**
     *Función utilizada para eliminar un Pasajero,
     * en este caso realiza un actualizar el cual cambia el estado a 'no disponible'
     */
    public function eliminar(ClsPasajero $obj) {
        $sql = "UPDATE Pasajero set estado='no disponible' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     *Función utilizada para modificar un Pasajero, 
     *entra como parametro un objeto de tipo Pasajero
     */
    public function modificar(ClsPasajero $obj) {
        $sql = "UPDATE Pasajero set correo='" . $obj->getCorreo() . "',telefono_celular='" . $obj->getTelefono() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     *Funcion utilizada para para listar todos los Pasajeros 
     *con el estado en 'disponible'
     */
    public function listar() {
        $sql = "SELECT nombres,apellidos,cedula,correo,telefono_celular,estado,descripcion from Pasajero where estado='disponible'";
        $this->objCon->Execute($sql);
    }

}