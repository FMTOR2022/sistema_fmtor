<?php
    require_once 'models/Model.php';
    class incidenciasModel extends Model{
        public $id_incidencias;
        public $tipo_incidencia;
        public $inicio_in;
        public $fin_in;
        public $id_empleados;
        public $nombre;
        public $apellidoP;
        public $apellidoM;

        public function __construct(){
            parent::__construct();
        }

        public function getIdIncidencia(){
            return $this->id_incidencias;
        }
    
        public function getTipoIncidencia(){
            return $this->tipo_incidencia;
        }
        public function getInicioIn(){
            return $this->inicio_in;
        }
        public function getFinIn(){
            return $this->fin_in;
        }
        public function getIdEmpleado(){
            return $this->id_empleados;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidoP(){
            return $this->apellidoP;
        }
        public function getApellidoM(){
            return $this->apellidoM;
        }
        public function setIdIncidencia($id_incidencias){
            $this->id_incidencias=$id_incidencias;
         }
       
        public function setTipoIncidencia($tipo_incidencia){
            $this->tipo_incidencia = $tipo_incidencia;
        }
        public function setInicioIn($inicio_in){
            $this->inicio_in = $inicio_in;
        } 
        public function setFinIn($fin_in){
            $this->fin_in = $fin_in;
        } 
        public function setIdEmpleados($id_empleados){
            $this->id_empleados = $id_empleados;
        } 
        public function setNombre($nombre){
            $this->nombre = $nombre;
        } 
        public function setApellidoP($apellidoP){
            $this->apellidoP = $apellidoP;
        }
        public function setApellidoM($apellidoM){
            $this->apellidoM=$apellidoM;
        }
   
        public function insertarIncidencias(){
            $tabla = 't_incidencias';
            $parametros = 'id_empleados,tipo_incidencia,inicio_in,fin_in';
            $values = "'$this->id_empleados','$this->tipo_incidencia','$this->inicio_in','$this->fin_in'";
            $validacion = Model::insertar($tabla,$parametros,$values);
            return $validacion; 
            
        } 

        public function actualizarIncidencias(){
            $tabla = 't_incidencias';
            $valores = "tipo_incidencia = '$this->tipo_incidencia',inicio_in = '$this->inicio_in',fin_in = '$this->fin_in'";
            $condicion = "id_incidencias = '$this->id_incidencias' ";
            $validacion = Model::actualizar($tabla,$valores,$condicion);
            return $validacion;
        }

        public function mostrarIncidencias(){
            $tabla = "t_incidencias,t_empleados";
            $columnas = "id_incidencias,id_empleados,apellidoP,apellidoM,tipo_incidencia,inicio_in,fin_in";
            $condicion = "t_incidencias.id_empleados = t_empleados.id_empleados = '$this->id_empleados'";

            $resultado = Model::buscar_personalizado($tabla, $columnas, $condicion);
            echo json_encode($resultado);
        }  
}