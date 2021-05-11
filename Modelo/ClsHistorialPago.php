<?php 
class ClsHistorialPago{
 
    private $id;
    private $id_Reserva;
    private $total_Pagos;
    private $estado;
    private $descripcion;
    
    function __construct($id, $id_Reserva, $total_Pagos, $estado, $descripcion) {
        $this->id = $id;
        $this->id_Reserva = $id_Reserva;
        $this->total_Pagos = $total_Pagos;
        $this->estado = $estado;
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

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }


}
