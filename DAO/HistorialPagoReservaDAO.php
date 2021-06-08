<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HistorialPagoReservaDAO
 *
 * @author Diego
 */
class HistorialPagoReservaDAO {
    //put your code here
    
     private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

     public function listar(){
         $sql="SELECT r.codigo,p.nombres,p.apellidos,p.telefono_celular,p.correo,hp.estado,hp.descripcion,s.precio as precioSilla,iv.precio as precioVuelo,hp.total_pagar,hp.targeta_credito,v.tipo_vuelo from historial_pago hp join reserva r on hp.id_reserva=r.id join pasajero p on r.id_pasajero_principal=p.id join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo join vuelo v on v.id=iv.id_vuelo join avion a on a.id=v.id_avion where hp.estado='pagado'";
         $this->objCon->Execute($sql);
     }
}
