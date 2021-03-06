<?php

    require_once "config/conexion.php";

    class Model {
        public $db;

        public function __construct(){
            $this->db= conexion::conectar();
        }

        public function mostrar ($tabla){
            $sql="SELECT * FROM $tabla";
            $mostrar = $this->db->query($sql);
            $objeto = self::getAssoc($mostrar);
            mysqli_close($this->db);
            return $objeto;
        }

        public function insertar ($tabla,$columnas,$valores){
            $sql="INSERT INTO $tabla($columnas) VALUES ($valores)";
            $insert = $this->db->query($sql);
            mysqli_close($this->db);
            return $insert;
        }

        public function actualizar ($tabla,$valores,$condicion) {
            $sql="UPDATE $tabla set $valores WHERE $condicion";
            $actualizar = $this->db->query($sql);
            mysqli_close($this->db);
            return $actualizar;
        }

        public function eliminar ($tabla,$condicion) {
            $sql="DELETE FROM $tabla WHERE $condicion";
            $eliminar = $this->db->query($sql);
            mysqli_close($this->db);
            return $eliminar;
        }
        
        public function buscar ($tabla,$campo,$valor) {
            $sql="SELECT * FROM $tabla WHERE $campo = '$valor'";
            $buscar=$this->db->query($sql);
            mysqli_close($this->db);
            $assoc = self::getAssoc($buscar);
            return $assoc;
        } 
        
        public function buscar_personalizado ($tabla,$campos,$condicion) {
            $sql = "SELECT $campos FROM $tabla WHERE $condicion";
            $buscar = $this->db->query($sql);
            mysqli_close($this->db);
            $assoc = self::getAssoc($buscar);
            return $assoc;
        }

        public function validar_password ($condicion) {
            $sql = "SELECT contrasena FROM t_usuario WHERE $condicion";
            $validar_password = $this->db->query($sql);
            mysqli_close($this->db);
            $assoc = self::getAssoc($validar_password);
            return $assoc;
        }

        public function filtrar_rango ($tabla,$campo,$d1,$d2) {
            $sql = "SELECT * FROM $tabla WHERE $campo BETWEEN '$d1' AND '$d2'";
            $filtrar = $this->db->query($sql);
            mysqli_close($this->db);
            $assoc = self::getAssoc($filtrar);
            return $assoc;
        }
        
        public function filtrar ($tabla,$campo,$valor) { 
            $sql = "SELECT * FROM $tabla WHERE $campo LIKE '%$valor%'";
            $filtrar = $this->db->query($sql);
            mysqli_close($this->db);
            $assoc = self::getAssoc($filtrar);
            return $assoc;
        }

        public function procedimiento ($procedimiento,$campos) {
            $sql="CALL $procedimiento($campos)";
            $result = $this->db->query($sql);
            mysqli_close($this->db);
            return $result;
        }

        public function getAssoc ($query) {
            $assoc = array();
            if (is_object($query)) {
                while($fila = $query->fetch_assoc()) {
                    $assoc[] = $fila;
                }
            } 
            return $assoc;
        }

        public function sesiones ($empleado,$nombre,$rol,$depto,$foto,$puesto) {
            // Sesi??n con el id del empleado
            $_SESSION['ZW1wbGVhZG8='] = $empleado;
            // Sesi??n con el nombre de usuario
            $_SESSION['bm9tYnJlX3VzdWFyaW8='] = $nombre;
            // Sesi??n con el rol del usuario
            $_SESSION['cm9s'] = $rol;
            // Sesi??n con el departamento del usuario
            $_SESSION['ZGVwdG8='] = $depto;
            // Sesi??n con la foto del usuario
            $_SESSION['Zm90bw=='] = $foto;
            // Sesi??n con el puesto del usuario
            $_SESSION['cHVlc3Rv'] = $puesto;

            $departamento = [
                "depto" => $_SESSION['ZGVwdG8=']
            ];

            return $departamento;
        }
        
        public function cerrar_sesion () {
            session_unset();
            session_reset();
            session_destroy();

            return 1;
        }
    }

?>