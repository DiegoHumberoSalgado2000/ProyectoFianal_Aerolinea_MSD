<?php

class check_inDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

     /**
     *funcion utilizada para listar una Lista datos de la reserva para el Check_in
     */
    public function BuscarCheck_in(DTOCheck_in $obj){
        $sql ="Select p.nombres,p.apellidos,p.cedula,p.telefono_celular,p.correo,hp.id_reserva,(Select r.codigo from reserva r JOIN historial_pago hp on r.id=hp.id_reserva where r.codigo='" . $obj->getCodigoReserva() ."')as codigoReserva,(SELECT s.numero_silla from silla s JOIN reserva r on s.id=r.id_silla JOIN pasajero p on p.id=r.id_pasajero_principal where p.cedula='" . $obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as silla,(SELECT u.nombre from ubicacion u JOIN itinerario_vuelo it on it.id_ubicacion_salida=u.id JOIN silla s on it.id=s.id_itinerario_vuelo JOIN reserva r on s.id=r.id_silla JOIN pasajero p on r.id_pasajero_principal=p.id where p.cedula='" .$obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as origen,(SELECT u.nombre from ubicacion u JOIN itinerario_vuelo it on it.id_ubicacion_llegada=u.id JOIN silla s on it.id=s.id_itinerario_vuelo JOIN reserva r on s.id=r.id_silla JOIN pasajero p on r.id_pasajero_principal=p.id where p.cedula='" .$obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as destino,(SELECT it.fecha_salida from itinerario_vuelo it JOIN silla s on s.id_itinerario_vuelo=it.id JOIN reserva r on r.id_silla=s.id JOIN pasajero p on r.id_pasajero_principal=p.id where p.cedula='" .$obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as fecha_salida,(SELECT it.fecha_llegada from itinerario_vuelo it JOIN silla s on s.id_itinerario_vuelo=it.id JOIN reserva r on r.id_silla=s.id JOIN pasajero p on r.id_pasajero_principal=p.id where p.cedula='" .$obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as fecha_llegada,r.estado,v.tipo_vuelo,v.estado as estado_vuelo,(SELECT a.placa from avion a JOIN vuelo v on a.id=v.id_avion JOIN itinerario_vuelo it on v.id=it.id_vuelo JOIN silla s on s.id_itinerario_vuelo=it.id JOIN reserva r on r.id_silla=s.id JOIN pasajero p on r.id_pasajero_principal=p.id where p.cedula='" .$obj->getCedula() . "' AND r.codigo='" . $obj->getCodigoReserva() . "' AND r.estado='disponible')as placa from historial_pago hp JOIN reserva r on  hp.id_reserva=r.id JOIN pasajero p on r.id_pasajero_principal=p.id JOIN silla s on s.id=r.id_silla JOIN itinerario_vuelo it on s.id_itinerario_vuelo=it.id JOIN vuelo v on v.id=it.id_vuelo where r.codigo='" .$obj->getCodigoReserva() . "' AND p.cedula='" .$obj->getCedula() . "' AND r.estado='disponible'";
        $this->objCon->Execute($sql);
    }

    /*
    *Funcion utilizada para realizar el check_in de la reserva
    */
    public function RealizarCheck_in(DTOCheck_in $obj){
        $sql="UPDATE reserva set estado='Check-in' where id='" . $obj->getId_Reserva() . "'";
        $this->objCon->ExecuteTransaction($sql);
    }


}

