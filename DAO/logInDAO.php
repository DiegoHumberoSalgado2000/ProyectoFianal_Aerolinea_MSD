<?php

class logInDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function logIn($correo,$contrasena) {


        $sqlPasajero = "SELECT correo,contrasena from pasajero where correo='$correo' and contrasena='$contrasena' and estado='disponible'";
        $sqlAdministrador = "SELECT correo,contrasena from administrador where correo='$correo' and contrasena='$contrasena' and estado='disponible'";
        $sqlEmpleado = "SELECT correo,contrasena from empleado where correo='$correo' and contrasena='$contrasena' and estado='disponible'";
        // Le asigno la consulta SQL a la conexion de la base de datos
        $resultadoPasajero = $this->objCon->getConnect()->prepare($sqlPasajero);
        // Executo la consulta //
        $resultadoPasajero->execute();


        $resultadoAdministrador = $this->objCon->getConnect()->prepare($sqlAdministrador);
        $resultadoAdministrador->execute();

        $resultadoEmpleado = $this->objCon->getConnect()->prepare($sqlEmpleado);
        $resultadoEmpleado->execute();


        // Si obtuvo resultados, entonces paselos a un vector


        if ($resultadoPasajero->rowCount() > 0) {

            $vecPasajero = $resultadoPasajero->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["pasajero"] = $vecPasajero[0]['correo'];
            header('location:../index.php');
        }else{
            if ($resultadoAdministrador->rowCount() > 0) {
                $vecAdministrador = $resultadoAdministrador->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION["administrador"] = $vecAdministrador[0]['correo'];
                header('location:../index.php');
            }
            else{

                if ($resultadoEmpleado->rowCount() > 0) {
                    $vecEmpleado = $resultadoEmpleado->fetchAll(PDO::FETCH_ASSOC);
                    session_start();
                    $_SESSION["empleado"] = $vecEmpleado[0]['correo'];
                    header('location:../index.php');

                }else{
                    $mensaje = "El correo y contraseña no se encuentran registrados";
                    header('location:../index.php?msjlogIn=' . $mensaje);
                }
            }
        }

    }

}
