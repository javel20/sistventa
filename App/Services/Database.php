<?php

    class DataBase{
        private $conexion;

        public function __construct(){
            $options = [
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->conexion = new PDO("mysql:host=localhost;dbname=ventas",'root','',$options);

            $this->conexion->exec("SET CHARACTER SET UTF8");

        }

        public function getConexion(){
            return $this->conexion;
        }

        public function closeConnection(){
            $this->conexion = null;
        }
        
            
    }
    

?>