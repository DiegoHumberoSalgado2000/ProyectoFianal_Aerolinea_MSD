<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleReservaDAO
 *
 * @author Diego
 */
class DetalleReservaDAO {

    //put your code here

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     * Función utilizada para buscar el detalle de la reserva del pasajero,
     * entra como parametro un objeto tipo DetalleReserva
     */
    public function BuscarDetalleReserva(DTODetalleReserva $obj) {
        $sql = "select (SELECT a.placa from vuelo v join avion a on v.id_avion=a.id where v.id=id_vuelo)as placa,(SELECT nombre from ubicacion where id=id_ubicacion_llegada)as nombreUbicacionLlegada,(SELECT nombre from ubicacion where id=id_ubicacion_salida) as nombreUbicacionSalida,it.fecha_llegada,it.fecha_salida,p.nombres,p.apellidos,p.cedula,p.correo,p.telefono_celular from itinerario_vuelo it join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where cedula=" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }

}
