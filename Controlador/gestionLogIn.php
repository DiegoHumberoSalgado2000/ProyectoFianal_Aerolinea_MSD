<?php


include '../DAO/logInDAO.php';

$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$correoLogin = isset($_REQUEST['txtCorreoLogin']) ?  $_REQUEST['txtCorreoLogin'] : "";
$contrasenaLogin = isset($_REQUEST['txtContrasenaLogin']) ?  $_REQUEST['txtContrasenaLogin'] :  "";


session_start();

$conex = new logInDAO();

switch ($type) {
    case "con":
        $conex->logIn($correoLogin,$contrasenaLogin);
        break;

    case "desc":
        session_destroy();
        $mensaje = "Sesión cerrada correctamente";
        header('location:../index.php?msjlogIn=' . $mensaje);
        break;
}




