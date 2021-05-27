<?php


class datosMenuAdministradorDAO{
    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /*
    *Funcion utilizado para buscar a un administrador por su correo
    */
    public function buscarAdministradorCorreo($correo){
        $sql="SELECT id,nombres,apellidos,cedula,correo,telefono_celular,contrasena,estado,descripcion from administrador where correo='$correo' and estado='disponible'";
        $this ->objCon->Execute($sql);
    }

    /**
     * Funcion utilizada para modificar un empleado
     */
    public function modificarAdministrador($correo,$telefonoCelular,$contrasena){
        $sql = "UPDATE administrador set telefono_celular='$telefonoCelular',contrasena='$contrasena' where correo='$correo'";
        $this->objCon->ExecuteTransaction($sql);
    }


}