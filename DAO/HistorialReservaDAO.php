<?php

class HistorialReservaDAO {



    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }



/**
 *función utiliada para listar todas las reservas echas por un pasajero


 */
    public function ListarHistorialReserva($correo) {
        $sql = "SELECT iv.precio as precioVuelo,v.tipo_vuelo as tipoVuelo,a.placa as placa,(select nombre from ubicacion where id=iv.id_ubicacion_salida)as ubicacionSalida,iv.fecha_salida,(select nombre from ubicacion where id=iv.id_ubicacion_llegada)as ubicacionLlegada,iv.fecha_llegada, r.codigo as codigoReserva,r.estado as estadoReserva,s.numero_silla as numeroSilla,s.precio as precioSilla,s.tipo as tipoSilla from reserva r join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo join vuelo v on  iv.id_vuelo=v.id join avion a on a.id=v.id_avion where r.id_pasajero_principal=(Select id from pasajero where correo='$correo') ";
        $this->objCon->Execute($sql);
    }

}
