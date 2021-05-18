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
     *Función utilizada para buscar un Pasajero, 
     *entra como parametro un objeto de tipo Pasajero
     */
    public function CargarDatos(DTOPasajeroReserva $obj) {
        $sql = "select p.nombres,p.apellidos,p.cedula,p.correo,p.telefono_celular,res.id from Pasajero p join reserva res on p.id=res.id_pasajero_principal where p.cedula='" . $obj->getCedula() . "'";
        $this->objCon->Execute($sql);
    }

}
