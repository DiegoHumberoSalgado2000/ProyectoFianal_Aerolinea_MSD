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
     * Función utilizada para guardar el pago del pasagero, 
     * entra como parametro un objeto de tipo pago
     */
    public function guardar(ClsHistorialPago $obj) {
        $sql = "INSERT INTO historial_pago(id,id_reserva,total_pagar,estado,targeta_credito,mes_vencimiento,opcion_pago,Avencimiento,numero_targeta,numero_verificacion,descripcion)VALUES('" . $obj->getId() . "','" . $obj->getId_Reserva . "','" . $obj->getTotal_Pagos() . "','disponible','" . $obj->getTargeta_creditp() . "','" . $obj->getMes_vencimiento() . "','" . $obj->getOpcion_pago() . "','" . $obj->getAvencimiento() . "','" . $obj->getNumero_targeta() . "','" . $obj->getNumero_verificacion() . "','ninguno')";
        $this->objCon->ExecuteTransaction($sql);
    }

    /**
     * Funcion utilizada para listar todos los pagos del los pasageros
     * con el estado en 'disponible'
     */
    public function Lista() {
        $sql = "SELECT id,id_reserva,total_pagar,estado,descripcion from historial_pago where estado='disponible'";
        $this->objCon->Execute($sql);
    }

}
