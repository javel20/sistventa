<?php

    class Cliente extends Orm{
        public function __construct(PDO $conexion)
        {
            parent::__construct('id','clientes',$conexion);
        }
    }

?>