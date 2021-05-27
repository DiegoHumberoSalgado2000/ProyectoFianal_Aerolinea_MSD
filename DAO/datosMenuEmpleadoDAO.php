<?php


class datosMenuEmpleadoDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /*
    *Funcion utilizado para buscar a un empleado por su correo
    */
    public function buscarEmpleadoCorreo($correo){
        $sql="SELECT id,nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion from empleado where correo='$correo' and estado='disponible'";
        $this ->objCon->Execute($sql);
    }


    /**
     * Funcion utilizada para modificar un empleado
     */
    public function modificarEmpleado($correo,$telefonoCelular,$contrasena){
        $sql = "UPDATE empleado set telefono_celular='$telefonoCelular',contrasena='$contrasena' where correo='$correo'";
        $this->objCon->ExecuteTransaction($sql);
    }


}