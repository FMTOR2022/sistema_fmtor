<?php

    class Conexion {
        public static function conectar () {
            $conexion = mysqli_connect(
                'localhost',
                'root',
                '',
                'db_fmtor'
            );
            return $conexion;
        }
    }

?>