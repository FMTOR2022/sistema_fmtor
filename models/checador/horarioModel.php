<?php
    //04-11-2021
    require_once "models/Model.php";
    class horarioModel extends Model{
        public $db;
        public $id_horario; //variables tabla horario
        public $usuario;
        public $entrada;
        public $almuerzoS;
        public $almuerzoR;
        public $salida;
        public $nombre;
        public $apellidoP;
        public $apellidoM;

        //Mandamos a llamar la clase Conexion de conexion.php
        public function __construct(){
           parent::__construct();
        }

        //se comunica con el controlador
        public function setIdHorario($id){
            $this->id_horario=$id;
        }
        public function setUsuario($usuario){
            $this->usuario=$usuario;
        }
       
        public function setEntrada($entrada){
            $this->entrada=$entrada;
        }
        public function setAlmuerzoS($almuerzoS){
            $this->almuerzoS=$almuerzoS;
        }
        public function setAlmuerzoR($almuerzoR){
            $this->almuerzoR=$almuerzoR;
        }
        public function setSalida($salida){
            $this->salida=$salida;
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
        //retorna el valor igualado
        public function getIdHorario(){
            return $this->id_horario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getEntrada(){
            return $this->entrada;
        }
        public function getAlmuerzoS(){
            return $this->almuerzoS;
        }
        public function getAlmuerzoR(){
            return $this->almuerzoR;
        }
        public function getSalida(){
            return $this->salida;
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
        //Este metodo ayudara a cargar la tabla de las listas
        public function get_registro(){
                //Selecciona la tabla a utilizar 
            $sql = "SELECT * FROM t_registro where id_registro='$this->id_registro'";

            $resultado = $this->db->query($sql);
           // while($row = $resultado->fetch_assoc())
           // {   
                //$this->id_registro[] = $row;
           // }
            //return $this->id_registro;
            return $resultado; 
        }

        public function insertarHorario(){
            $tabla = 't_horario';
            $parametros = 'usuario,entrada,almuerzoS,almuerzoR,salida';
            $values = "'$this->usuario','$this->entrada','$this->almuerzoS','$this->almuerzoR','$this->salida'";
            $validacion = Model::insertar($tabla,$parametros,$values);
            return $validacion;
            
        }

        public function actualizarHorario(){
            $tabla = 't_horario';
            $valores = "entrada = '$this->entrada',almuerzoS = '$this->almuerzoS',almuerzoR = '$this->almuerzoR',salida = '$this->salida'";
            $condicion = "id_horario = '$this->id_horario', usuario = '$this->usuario'";
            $validacion = Model::actualizar($tabla,$valores,$condicion);
            return $validacion;
        }
 
    }
?>