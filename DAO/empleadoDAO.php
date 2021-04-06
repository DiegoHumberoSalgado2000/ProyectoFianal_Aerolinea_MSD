<?php

class empleadoDAO {
    Private $con;
    private $objCon;

    function __construct(){
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsEmpleado $obj){
        $sql="INSERT INTO empleado(nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion) VALUES ('" . $obj->getNombre() . "','" . $obj->getApellidos() . "','" . $obj->getCedula() . "','" . $obj->getCorreo() . "','" . $obj->getTelefonoCelular() . "','" . $obj->getContrasena() . "','disponible','" . $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsEmpleado $obj){
        $sql="SELECT id,nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion from empleado where cedula='" . $obj->getCedula() . "' and estado='disponible'";
        $this ->objCon->Execute($sql);
    }

    public function eliminar(clsEmpleado $obj){
        $sql="UPDATE empleado set estado='no disponible' where id='" . $obj->getId() . "'";
        $this ->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsEmpleado $obj){
        $sql="UPDATE empleado set correo='" . $obj->getCorreo() . "',telefono_celular='" . $obj->getTelefonoCelular() . "',contrasena='" . $obj->getContrasena() . "',descripcion='" . $obj->getDescripcion() . "' where id='" . $obj->getId() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }
     public function listar(){
         $sql="SELECT nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion from empleado where estado='disponible'";
         $this->objCon->Execute($sql);
     }




}