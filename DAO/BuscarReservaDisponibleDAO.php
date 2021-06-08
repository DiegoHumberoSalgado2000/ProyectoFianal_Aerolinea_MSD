<?php

class BuscarReservaDisponibleDAO{

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
    public function BuscarReservaDisponible($codigoReser) {
        $sql = "select (select nombre from ubicacion where id=iv.id_ubicacion_salida) as nombreUbicacionSalida, (select nombre from ubicacion where id=iv.id_ubicacion_llegada) as nombreUbicacionLlegada, iv.fecha_salida as fecha_salida,iv.fecha_llegada as fecha_llegada,p.nombres,p.apellidos,p.telefono_celular,p.correo,p.cedula,s.numero_silla,hp.estado,hp.descripcion,v.tipo_vuelo from historial_pago hp join reserva r on hp.id_reserva=r.id join pasajero p on r.id_pasajero_principal=p.id join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo join vuelo v on v.id=iv.id_vuelo join avion a on a.id=v.id_avion where r.codigo=$codigoReser and hp.estado='pagado'";
        $this->objCon->Execute($sql);
    }
}

?>