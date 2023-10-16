<?php

    class Usuario extends Orm{
        public function __construct(PDO $conexion)
        {
            parent::__construct('id','usuarios',$conexion);
        }
    }

?>