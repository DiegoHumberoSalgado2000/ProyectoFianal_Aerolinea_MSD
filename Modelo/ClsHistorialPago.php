<?php 
class ClsHistorialPago{
 
    private $id;
    private $id_Reserva;
    private $total_Pagos;
    private $estado;
    private $tarjeta_credito;
    private $mes_vencimiento;
    private $opcion_pago;
    private $Avencimiento;
    private $numero_tarjeta;
    private $numero_verificacion;
    private $descripcion;
    
    function __construct($id, $id_Reserva, $total_Pagos, $estado, $tarjeta_credito, $mes_vencimiento, $opcion_pago, $Avencimiento, $numero_tarjeta, $numero_verificacion, $descripcion) {
        $this->id = $id;
        $this->id_Reserva = $id_Reserva;
        $this->total_Pagos = $total_Pagos;
        $this->estado = $estado;
        $this->tarjeta_credito = $tarjeta_credito;
        $this->mes_vencimiento = $mes_vencimiento;
        $this->opcion_pago = $opcion_pago;
        $this->Avencimiento = $Avencimiento;
        $this->numero_tarjeta = $numero_tarjeta;
        $this->numero_verificacion = $numero_verificacion;
        $this->descripcion = $descripcion;
    }

    function getId() {
        return $this->id;
    }

    function getId_Reserva() {
        return $this->id_Reserva;
    }

    function getTotal_Pagos() {
        return $this->total_Pagos;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTarjeta_credito() {
        return $this->tarjeta_credito;
    }

    function getMes_vencimiento() {
        return $this->mes_vencimiento;
    }

    function getOpcion_pago() {
        return $this->opcion_pago;
    }

    function getAvencimiento() {
        return $this->Avencimiento;
    }

    function getNumero_tarjeta() {
        return $this->numero_tarjeta;
    }

    function getNumero_verificacion() {
        return $this->numero_verificacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id){
        $this->id = $id;
    }

    function setId_Reserva($id_Reserva){
        $this->id_Reserva = $id_Reserva;
    }

    function setTotal_Pagos($total_Pagos){
        $this->total_Pagos = $total_Pagos;
    }

    function setEstado($estado){
        $this->estado = $estado;
    }

    function setTarjeta_credito($tarjeta_credito){
        $this->tarjeta_credito = $tarjeta_credito;
    }

    function setMes_vencimiento($mes_vencimiento){
        $this->mes_vencimiento = $mes_vencimiento;
    }

    function setOpcion_pago($opcion_pago){
        $this->opcion_pago = $opcion_pago;
    }

    function setAvencimiento($Avencimiento){
        $this->Avencimiento = $Avencimiento;
    }

    function setNumero_tarjeta($numero_tarjeta){
        $this->numero_tarjeta = $numero_tarjeta;
    }

    function setNumero_verificacion($numero_verificacion){
        $this->numero_verificacion = $numero_verificacion;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }


}
