<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php
//include("Componentes/banner.php");
?>

<div width="80%">
<?php

        session_start();

        if (isset($_REQUEST['msjlogIn'])) {
            $mensaje= $_REQUEST['msjlogIn'];
            printf("<script type='text/javascript'>alert(' $mensaje'); </script>");
        }

        if (isset($_SESSION["pasajero"])) {
            include("Componentes/banner_Pasajero.php");
            include('Vista/Inicio.php');
            include("Componentes/footer_Pasajero.php");
        } else {
            if(isset($_SESSION["administrador"])){
                include("Componentes/banner_Administrador.php");
                include("Vista/Inicio.php");
                include("Componentes/footer_administrador.php");
            }
            else{
                if(isset($_SESSION["empleado"])){
                    include("Componentes/banner_Empleado.php");
                    include("Vista/Inicio.php");
                    include("Componentes/footer_Pasajero.php");
                }else{
                    //include("Vista/Inicio.php");
                    include("Componentes/banner.php");
                    include('Vista/Inicio.php');
                    include("Componentes/footer.php");
                }
            }

        }
        /**
        if(isset($_REQUEST['page'])){
            include($_REQUEST['page'].".php");
        }else{
            include("Vista/Inicio.php");
        }
        */

        ?>

</div>

<?php
//include("Componentes/footer.php");
?>
    </body>
</html>
