<?php
require '../DTO/DTOMi_Reserva.php.';
require '../DAO/mi_reservaDAO.php';

$nombre = isset($_REQUEST['nombres']) ? $_REQUEST['nombres'] : "";
$apellido = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : "";
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$telefono = isset($_REQUEST['telefono_celular']) ? $_REQUEST['telefono_celular'] : "";
$idReserva= isset($_REQUEST['idReserva']) ? $_REQUEST['idReserva'] : "";
$codigoReserva=isset($_REQUEST['codigoReserva']) ? $_REQUEST['codigoReserva'] : "";
$silla=isset($_REQUEST['silla']) ? $_REQUEST['silla'] : "";
$origen=isset($_REQUEST['origen']) ? $_REQUEST['origen'] : "";
$destino=isset($_REQUEST['destino']) ? $_REQUEST['destino'] : "";
$fecha_Salida=isset($_REQUEST['fecha_Salida']) ? $_REQUEST['fecha_Salida'] : "";
$fecha_Llegada=isset($_REQUEST['fecha_Llegada']) ? $_REQUEST['fecha_Llegada'] : "";
$Estado_Reserva=isset($_REQUEST['Estado_Reserva']) ? $_REQUEST['Estado_Reserva'] : "";
$idVuelo=isset($_REQUEST['idVuelo']) ? $_REQUEST['idVuelo'] : "";
$Estado_Vuelo=isset($_REQUEST['Estado_Vuelo']) ? $_REQUEST['Estado_Vuelo'] : "";
$Placa_Avion=isset($_REQUEST['Placa_Avion']) ? $_REQUEST['Placa_Avion'] : "";
$type=isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$fechaactual=isset($_REQUEST['fechaactual'])? $_REQUEST['fechaactual']:"";

$miReserva=new DTOMi_Reserva($nombre,$apellido,$cedula,$telefono,$correo,$idReserva,$codigoReserva,$silla,$origen,$destino,$fecha_Salida,$fecha_Llegada,$Estado_Reserva,$idVuelo,$Estado_Vuelo,$Placa_Avion);
$miReservaDAO=new mi_reservaDAO();

$patronValCodigo="/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/";/**El patron regular que distingue entre negativo y positivo */
$patronValCodigoInfo="El codigo puede tener numeros enteros positivos y decimales positivos y no se permite numeros negativos";

$patronValCedula="/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/";/**El patron regular que distingue entre negativo y positivo */
$patronValCedulaInfo="La cedula puede tener numeros enteros positivos y decimales positivos y no se permite numeros negativos";

$fecha_hoy=strtotime($fechaactual);


switch($type){

    case "BuscarMi_Reserva":
        if($codigoReserva==null && $cedula==null){
            echo(json_encode(['res' => 'False', "msj" => "Ingrese los datos"
            ]));
            break;
        }

        if($codigoReserva==null){
            echo(json_encode(['res' => 'False', "msj" => "Ingrese codigo de la reserva"
            ]));
            break;
        }
        if($cedula==null){
            echo(json_encode(['res' => 'False', "msj" => "Ingrese cedula"
            ]));
            break;
        }

        if(!preg_match($patronValCodigo,$codigoReserva)){
            echo(json_encode(['res' => 'False', "msj" => $patronValCodigoInfo
            ]));
            break;

        }
        if(!preg_match($patronValCedula,$cedula)){
            echo(json_encode(['res' => 'False', "msj" => $patronValCedulaInfo
            ]));
            break;

        }
        $miReservaDAO->BuscarMi_Reserva($miReserva);
        break;

    case "CancelarReserva":

        $miReservaDAO->CancelarReserva($miReserva);
        break;

}