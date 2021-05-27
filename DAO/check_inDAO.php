<?php

class check_inDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function BuscarCheck_in(DTOCheck_in $obj){
        $sql ="select p.nombres,p.apellidos,p.cedula,p.telefono_celular,p.correo,rp.id_reserva,(SELECT r.codigo from reserva r join reserva_pasajero rp on r.id=rp.id_reserva)as codigoreserva,s.numero_silla,(SELECT u.nombre from ubicacion u join itinerario_vuelo it on u.id=it.id_ubicacion_salida join silla s on it.id=s.id_itinerario_vuelo join reserva r on r.id_silla=s.id join reserva_pasajero rp on rp.id_reserva = r.id where r.codigo='" . $obj->getCodigoReserva() . "')as origen,(SELECT u.nombre from ubicacion u join itinerario_vuelo it on u.id=it.id_ubicacion_llegada join silla s on it.id=s.id_itinerario_vuelo join reserva r on r.id_silla=s.id join reserva_pasajero rp on rp.id_reserva = r.id where r.codigo='" . $obj->getCodigoReserva() . "')as destino,(SELECT it.fecha_salida from itinerario_vuelo it join silla s on it.id=s.id_itinerario_vuelo join reserva r on s.id=r.id_silla join reserva_pasajero rp on r.id=rp.id_reserva where r.codigo='" . $obj->getCodigoReserva() . "')as fecha_salida,(SELECT it.fecha_llegada from itinerario_vuelo it join silla s on it.id=s.id_itinerario_vuelo join reserva r on s.id=r.id_silla join reserva_pasajero rp on r.id=rp.id_reserva where r.codigo='" . $obj->getCodigoReserva() . "')as fecha_llegada,r.estado,(Select v.tipo_vuelo from vuelo v join itinerario_vuelo it on v.id=it.id_vuelo join silla s on it.id=s.id_itinerario_vuelo join reserva r on s.id=r.id_silla join reserva_pasajero rp on r.id=rp.id_reserva where r.codigo='" . $obj->getCodigoReserva() . "')as tipo_Vuelo,it.id_vuelo,(Select v.estado from vuelo v join itinerario_vuelo it on v.id=it.id_vuelo join silla s on it.id=s.id_itinerario_vuelo join reserva r on s.id=r.id_silla join reserva_pasajero rp on r.id=rp.id_reserva where r.codigo='" . $obj->getCodigoReserva() . "')as estado_vuelo,(Select a.placa from avion a join vuelo v on v.id_avion=a.id join itinerario_vuelo it on v.id=it.id_vuelo join silla s on it.id=s.id_itinerario_vuelo join reserva r on s.id=r.id_silla join reserva_pasajero rp on r.id=rp.id_reserva where r.codigo='" .$obj->getCodigoReserva() . "')as placa from reserva_pasajero rp join pasajero p on rp.id_pasajero=p.id join reserva r on r.id=rp.id_reserva join silla s on r.id_silla=s.id join itinerario_vuelo it on s.id_itinerario_vuelo=it.id where p.cedula='" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }
}

