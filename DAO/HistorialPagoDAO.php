<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistorialPagoDAO
 *
 * @author Diego
 */
class HistorialPagoDAO {

    //put your code here

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     * Función utilizada para Guardar la Confirmacion del Pago, 
     * entra como parametro un objeto de tipo historial Pafo
     */
    public function GuardarHistorialPagos(ClsHistorialPago $obj) {

        $sql = "UPDATE historial_pago set total_pagar='" . $obj->getTotal_Pagos() . "',targeta_credito='" . $obj->getTarjeta_credito() . "',mes_vencimiento='" . $obj->getMes_vencimiento() . "',opcion_pago='" . $obj->getOpcion_pago() . "',Avencimiento='" . $obj->getAvencimiento() . "',numero_targeta='" . $obj->getNumero_tarjeta() . "',numero_verificacion='" . $obj->getNumero_verificacion() . "',estado='" . "pagado" . "',descripcion='" . "reserva pagada" . "' where id_reserva='" . $obj->getId_Reserva() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     * Funcion utilizada para listar todos los pagos del los pasageros
     * con el estado en 'disponible'
     */
    public function Lista() {
        $sql = "SELECT id,id_reserva,total_pagar,estado,descripcion from historial_pago where estado='pagado'";
        $this->objCon->Execute($sql);
    }

}
