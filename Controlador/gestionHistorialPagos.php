<?php

require '../Modelo/ClsHistorialPago.php';
require '../DAO/HistorialPagoDAO.php';

$idHistorialPagos = isset($_REQUEST['idHistorialPagos']) ? $_REQUEST['idHistorialPagos'] : "";
$idReserva = isset($_REQUEST['idReserva']) ? $_REQUEST['idReserva'] : "";
$TotalAPagar = isset($_REQUEST['TotalAPagar']) ? $_REQUEST['TotalAPagar'] : "";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$tarjeraCredito = isset($_REQUEST['tarjeraCredito']) ? $_REQUEST['tarjeraCredito'] : "";
$mesVencimiento = isset($_REQUEST['mesVencimiento']) ? $_REQUEST['mesVencimiento'] : "";
$opcionPago = isset($_REQUEST['opcionPago']) ? $_REQUEST['opcionPago'] : "";
$Avencimiento = isset($_REQUEST['Avencimiento']) ? $_REQUEST['Avencimiento'] : "";
$numeroTarjetaCredtiro = isset($_REQUEST['numeroTarjetaCredtiro']) ? $_REQUEST['numeroTarjetaCredtiro'] : "";
$numeroVerificado = isset($_REQUEST['numeroVerificado']) ? $_REQUEST['numeroVerificado'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";

$historialPagos = new ClsHistorialPago($idHistorialPagos, $idReserva, $TotalAPagar, $estado, $tarjeraCredito, $mesVencimiento, $opcionPago, $Avencimiento, $numeroTarjetaCredtiro, $numeroVerificado, $descripcion);
$HistorialPagosDAO = new HistorialPagoDAO();

/**
 * Expresiones regulares
 */
$patronValMastercard = "/^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/";
$patronValMastercardInfo = "numero de tarjeta no valido Las tarjetas Mastercard empiezan con el número 5 o los digitos de la tarjeta no son validos";

$patronValTarjetaVisa = "/^4[0-9]{12}(?:[0-9]{3})?$/";
$patronValTarjetaVisaInfo = "numero de tarjeta no valido Las tarjetas Visa siempre comienzan con el número 4 o los digitos de la tarjeta no son validos";

$patronValTarjetaAmericanExpress = "/^3[47][0-9]{13}$/";
$patronValTarjetaAmericanExpressInf = "numero de tarjeta no valido las tarjetas American Express siempre comienzan con el numero 3 o los digitos de la tarjeta no son validos";

$patronValTarjetaDiners = "/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/";
$patronValTarjetaDinersInf = "numero de tarjeta no valido las tarjetas Diners siempre comienzan con el numero 3 o los digitos de la tarjeta no son validos";



/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "guardar":

        if ($tarjeraCredito == "Seleccione el tipo de tarjeta de Credito") {
            echo(json_encode(['res' => 'False', "msj" => "seleccione la tarjeta de credito"
            ]));
            break;
        }

        if ($mesVencimiento == "Seleccione el mes de Vencimiento") {
            echo(json_encode(['res' => 'False', "msj" => "seleccione el mes de vencimineto"
            ]));
            break;
        }

        if ($opcionPago == "Seleccione la cantidad de Cuotas") {
            echo(json_encode(['res' => 'False', "msj" => "seleccione la cantidad de cuotas"
            ]));
            break;
        }

        if ($Avencimiento == "Seleccione el Año de Vencimiento") {
            echo(json_encode(['res' => 'False', "msj" => "seleccione el año de vencimineto"
            ]));
            break;
        }


        if ($numeroTarjetaCredtiro == "") {
            echo(json_encode(['res' => 'False', "msj" => "Ingrese el numero de tarjeta de credito"
            ]));
            break;
        }

        if ($numeroVerificado == "") {
            echo(json_encode(['res' => 'False', "msj" => "Ingrese el numero para verificar la tarjeta de credito"
            ]));
            break;
        }
        /**
        if ($tarjeraCredito == "Visa") {
            if (!preg_match($patronValTarjetaVisa, $numeroTarjetaCredtiro)) {
                echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaVisaInfo]));
                break;
            }
            break;
        }

        if ($tarjeraCredito == "Mastercard") {
            if (!preg_match($patronValMastercard, $numeroTarjetaCredtiro)) {
                echo (json_encode(['res' => 'False', "msj" => $patronValMastercardInfo]));
                break;
            }
            break;
        }

        if ($tarjeraCredito == "American Express") {
            if (!preg_match($patronValTarjetaAmericanExpress, $numeroTarjetaCredtiro)) {
                echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaAmericanExpressInf]));
                break;
            }
            break;
        }

        if ($tarjeraCredito == "Diners") {
            if (!preg_match($patronValTarjetaDiners, $numeroTarjetaCredtiro)) {
                echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaDinersInf]));
                break;
            }
            break;
        }
        */

        $HistorialPagosDAO->GuardarHistorialPagos($historialPagos);
        break;

    case "list":
        $HistorialPagosDAO->Lista();
        break;
}


