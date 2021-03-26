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
include("Componentes/banner.php");
?>

<div width="80%">
<?php
        if(isset($_REQUEST['page'])){
           include($_REQUEST['page'].".php");
        }else{
            include("Vista/Inicio.php");
        }
 
         ?>

</div>

<?php
include("Componentes/footer.php");
?>
    </body>
</html>
