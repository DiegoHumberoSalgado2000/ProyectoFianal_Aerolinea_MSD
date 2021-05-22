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
    public function CargarDatos(DTOPasajeroReserva $obj) {
        $sql = "select (select s.precio from silla s join reserva res on s.id=res.id_silla join Pasajero p on p.id=res.id_pasajero_principal where p.cedula='" . $obj->getCedula() . "')as precioSilla, p.nombres,p.apellidos,p.cedula,p.correo,p.telefono_celular,res.id,it.precio from pasajero p join reserva res on p.id=res.id_pasajero_principal join silla s on res.id_silla=s.id join itinerario_vuelo it on s.id_itinerario_vuelo=it.id where p.cedula='" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }

}
