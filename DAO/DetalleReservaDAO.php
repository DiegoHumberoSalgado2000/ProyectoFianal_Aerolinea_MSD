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
        $sql = "select (SELECT a.placa from avion a join vuelo v on a.id=v.id_avion join itinerario_vuelo it on v.id=it.id_vuelo join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where p.cedula='" . $obj->getCedula() . "')as placa,(SELECT ub.nombre from ubicacion ub join itinerario_vuelo it on ub.id=it.id_ubicacion_llegada join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where p.cedula='" . $obj->getCedula() . "')as nombreUbicacionLlegada,(SELECT ub.nombre from ubicacion ub join itinerario_vuelo it on ub.id=it.id_ubicacion_salida join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where p.cedula='" . $obj->getCedula() . "') as nombreUbicacionSalida,(select s.precio from silla s join reserva res on s.id=res.id_silla join Pasajero p on p.id=res.id_pasajero_principal where p.cedula='" . $obj->getCedula() . "')as precioSilla,(select it.precio from itinerario_vuelo it join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where p.cedula='" . $obj->getCedula() . "')as precioTiquete,it.fecha_llegada,it.fecha_salida,p.nombres,p.apellidos,p.cedula,p.correo,p.telefono_celular from itinerario_vuelo it join silla s on it.id=s.id_itinerario_vuelo join reserva res on s.id=res.id_silla join Pasajero p on res.id_pasajero_principal=p.id where cedula='" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }

    public function buscarEnviarInformacion(DTODetalleReserva $obj) {
        $sql = "select cedula from Pasajero where cedula='" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }

}
