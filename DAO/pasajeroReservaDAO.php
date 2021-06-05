<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pasajeroReservaDAO {

    private $con;
    private $objCon;

    function __construct() {
        require '../Infraestructura/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    /**
     * Función utilizada para buscar un Pasajero,
     * entra como parametro un objeto de tipo Pasajero
     */
    public function CargarDatos($codigoRese) {
        $sql = "SELECT r.id,p.nombres,p.apellidos,p.cedula,p.correo,p.telefono_celular,iv.precio,s.precio as precioSilla , SUM(iv.precio+s.precio) as TotalPagar from reserva r join pasajero p on r.id_pasajero_principal=p.id join silla s on s.id=r.id_silla join itinerario_vuelo iv on iv.id=s.id_itinerario_vuelo where r.codigo=$codigoRese";
        $this->objCon->Execute($sql);
    }

}
