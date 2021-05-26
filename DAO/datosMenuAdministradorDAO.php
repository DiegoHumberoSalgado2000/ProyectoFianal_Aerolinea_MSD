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




}