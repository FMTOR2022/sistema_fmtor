<?php

    class Conexion {
        public static function conectar () {
            $conexion = mysqli_connect(
                'localhost',
                'root',
                '',
                'db_rdg_fmtor'
            );
            return $conexion;
        }
    }

?>