<?php

class clsConexion {

    private $userbd;
    private $passworddb;
    private $database;
    private $port;
    private $host;
    private $connect;

    public function conectar() {
        $this->userbd = "root";
        $this->passworddb = "";
        $this->database = "aerolinea_ingenieria_software_uno";
        $this->host = "localhost";

        try {
            /* Ultima linea de UTF8 es para evitar problemas con las acentuaciones y las Ñ */
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->database", $this->userbd, $this->passworddb, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // set the PDO error mode to exception
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnect() {
        return $this->connect;
    }

    public function ExecuteTransaction($query) {
        try {
            /* Le asigno la consulta SQL a la conexion de la base de datos */
            $resultado = $this->getConnect()->prepare($query);
            /* Executo la consulta */
            $resultado->execute();
            /* Si obtuvo resultados, entonces paselos a un vector */

            if ($resultado->rowCount() > 0) {
                echo(json_encode(['res' => 'Success', "msj" => "Operacion exitosa"
                ]));
            } else {
                echo(json_encode(['res' => 'Error', "msj" => "Error en la operacion"]));
            }
        } catch (PDOException $exception) {
            echo(json_encode(['res' => 'Error', "msj" => "Error en la operacion",
                'development' => $exception->getMessage(), 'sql' => $query]));
        }
    }

    public function Execute($query) {
        try {
            /* Le asigno la consulta SQL a la conexion de la base de datos */
            $resultado = $this->getConnect()->prepare($query);
            /* Executo la consulta */
            $resultado->execute();
            /* Si obtuvo resultados, entonces paselos a un vector */
            if ($resultado->rowCount() > 0) {
                $vec = $resultado->fetchAll(PDO::FETCH_ASSOC);
            }

            if (isset($vec)) {
                echo(json_encode(['msj' => 'Success',
                    'data' => json_encode($vec)]));
                //echo(json_encode($vec));
            } else {
                echo '{"res" : "NotInfo","msg":"No se encontro informacion","data":"{}"}';
            }
        } catch (PDOException $exception) {
            /* Se captura el error de ejecucion SQL */
            echo ' {
                "res" : "' . $exception . '"
            }';
        }
    }


}
