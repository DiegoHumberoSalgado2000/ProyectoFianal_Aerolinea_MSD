<?php

require '../Modelo/ClsHistorialPago.php';
require '../DAO/HistorialPagoDAO.php';

$idHistorialPagos = isset($_REQUEST['idHistorialPagos']) ? $_REQUEST['idHistorialPagos'] : "";
$id_reserva = isset($_REQUEST['id_reserva']) ? $_REQUEST['id_reserva'] : "";
$total_pagar = isset($_REQUEST['total_pagar']) ? $_REQUEST['total_pagar'] : "";
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : "";
$targeta_credito = isset($_REQUEST['targeta_credito']) ? $_REQUEST['targeta_credito'] : "";
$mes_vencimiento = isset($_REQUEST['mes_vencimiento']) ? $_REQUEST['mes_vencimiento'] : "";
$opcion_pago = isset($_REQUEST['opcion_pago']) ? $_REQUEST['opcion_pago'] : "";
$Avencimiento = isset($_REQUEST['Avencimiento']) ? $_REQUEST['Avencimiento'] : "";
$numero_targeta = isset($_REQUEST['numero_targeta']) ? $_REQUEST['numero_targeta'] : "";
$numero_verificacion = isset($_REQUEST['numero_verificacion']) ? $_REQUEST['numero_verificacion'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";

$historialPagos = new ClsHistorialPago($idHistorialPagos, $id_reserva, $total_pagar, $estado, $targeta_credito, $mes_vencimiento, $opcion_pago, $Avencimiento, $numero_targeta, $numero_verificacion, $descripcion);
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

$patronValCedula = "/^([0-9])*$/";
$patronValCedulaInfo = "La cedula tiene que tener dato numerico";

$patronValNombre = "/^(?=.{3,18}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValNombreInfo = "El nombre tiene que tener dato alfabetico y entre 3 y 18 caracteres";

$patronValApellido = "/^(?=.{3,36}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/";
$patronValApellidoInfo = "El apellido tiene que tener dato alfabetico y entre 3 y 36 caracteres";

$patronValCorreo = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
$patronValCorreoInfo = "El correo tiene que tener un formato tipo :alguien@algunlugar.es";

$patronValTelefono = "/^[1-9]\d{9}$/";
$patronValTelefonoInfo = "El telefono solo recibe numeros de celular";

/**
 * Usado para recibir un $type el cual ayuda para controlar que petición se requiere
 */
switch ($type) {
    case "guardar":

        if (!preg_match($patronValMastercard, $numero_targeta)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValMastercardInfo]));
            break;
        } else if (!preg_match($patronValMastercard, $numero_targeta)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaVisaInfo]));
            break;
        } else if (!preg_match($patronValMastercard, $numero_targeta)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaAmericanExpressInf]));
            break;
        } else if (preg_match($patronValMastercard, $numero_targeta)) {
            echo (json_encode(['res' => 'False', "msj" => $patronValTarjetaDinersInf]));
            break;
        }

        if (!preg_match($patronValCedula, $cedula)) {
            echo(json_encode(['res' => 'False', "msj" => $patronValCedulaInfo
            ]));
            break;
        }

        if (!preg_match($patronValNombre, $nombre)) {
            echo(json_encode(['res' => 'False', "msj" => $patronValNombreInfo
            ]));
            break;
        }
        if (!preg_match($patronValApellido, $apellido)) {
            echo(json_encode(['res' => 'False', "msj" => $patronValApellidoInfo
            ]));
            break;
        }

        if (!preg_match($patronValCorreo, $correo)) {
            echo(json_encode(['res' => 'False', "msj" => $patronValCorreoInfo
            ]));
            break;
        }

        if (!preg_match($patronValTelefono, $telefono)) {
            echo(json_encode(['res' => 'False', "msj" => $patronValTelefonoInfo
            ]));
            break;
        }

        $HistorialPagosDAO->guardar($historialPagos);
        break;

    case "list":
        $HistorialPagosDAO->Lista();
        break;
}


