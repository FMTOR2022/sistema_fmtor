<?php 
    require_once "models/Model.php";

    class TcontrolOp extends Model {
        public $id;
        public $no_maquina;
        public $bote;
        public $fecha_entrega;
        public $pzas;
        public $kilos;
        public $turno;
        public $observaciones;
        public $factor;
        public $op;
        public $id_estado;
        public $vista;
        
        public function __construct() {
            parent::__construct();
        }

        public function setId($id):void {
            $this->id = $id;
        }

        public function setNoMaquina($no_maquina):void {
            $this->no_maquina = $no_maquina;
        }

        public function setBote($bote):void {
            $this->bote = $bote;
        }

        public function setFechaEntrega($fecha_entrega):void {
            $this->fecha_entrega = $fecha_entrega;
        }

        public function setPzas($pzas):void {
            $this->pzas = $pzas;
        }

        public function setKilos($kilos):void {
            $this->kilos = $kilos;
        }

        public function setTurno($turno):void {
            $this->turno = $turno;
        }

        public function setObservaciones($observaciones):void {
            $this->observaciones = $observaciones;
        }
        
        public function setFactor($factor):void {
            $this->factor = $factor;
        }

        public function setOp($op):void{
            $this->op = $op;
        }

        public function setIdEstado($id_estado):void {
            $this->id_estado = $id_estado;
        }

        public function setVista ($vista):void {
            $this->vista = $vista;
        }

        public function obtener_registros () {
            $result = Model::mostrar($this->vista);
            return $result;
        }

        public function insertar_registro () {
            $obj = new Model();
            $condicion = "Id_estado_1 = '$this->id_estado' AND Id_Produccion_FK_1 = '$this->op'";
            $id_control = $obj->buscar_personalizado('t_control_produccion','id_control_produccion',$condicion);

            $obj2 = new Model();
            $campos = 'no_maquina,fecha,bote,pzas,kilos,turno,observaciones,Id_control_produccion_1';
            $values = "'$this->no_maquina','$this->fecha_entrega','$this->bote','$this->pzas','$this->kilos','$this->turno','$this->observaciones','".$id_control[0]['id_control_produccion']."'";
            $result = $obj2->insertar('t_registro_diario',$campos,$values);
            return $result;
        }

        public function insertar_registro_sin_op () {
            $campos = 'no_maquina,fecha,bote,pzas,kilos,turno,observaciones,Id_control_produccion_1';
            $values = "'$this->no_maquina','$this->fecha_entrega','$this->bote','$this->pzas','$this->kilos','$this->turno','$this->observaciones','$this->id_estado'";
            $result = Model::insertar('t_registro_diario',$campos,$values);
            return $result;
        }

        public function actualizar_registro () {
            $valores = "no_maquina = '$this->no_maquina', fecha = '$this->fecha_entrega', bote = '$this->bote', pzas = '$this->pzas', kilos = '$this->kilos', turno = '$this->turno', observaciones = '$this->observaciones'";
            $condicion = "id_registro_diario = '$this->op'";
            $result = Model::actualizar('t_registro_diario',$valores,$condicion);
            return $result;
        }

        public function actualizar_registro_e () {
            $valores = "no_maquina = '$this->no_maquina', fecha = '$this->fecha_entrega', bote = '$this->bote', pzas = '$this->pzas', kilos = '$this->kilos', turno = '$this->turno', observaciones = '$this->observaciones'";
            $condicion = "id_registro_diario = '$this->id'";
            $result = Model::actualizar('t_registro_diario',$valores,$condicion);

            if (!$result) {
                return $result;
            } else {
                $obj = new Model();
                $condicion = "Id_Produccion_FK_1 = '$this->op' AND Id_estado_1  = '$this->id_estado'";
                $result_2 = $obj->buscar_personalizado('t_control_produccion','id_control_produccion',$condicion);

                if (count($result_2) == 0) {
                    return 3;
                } else {
                    $obj_2 = new Model();
                    $valores = "Id_control_produccion_1 = '".$result_2[0]['id_control_produccion']."'";
                    $condicion = "id_registro_diario = '$this->id'";
                    $result_3 = $obj_2->actualizar('t_registro_diario',$valores,$condicion);
                    return $result_3;
                }
            }
        }

        public function eliminar_registro () {
            $result = Model::eliminar('t_registro_diario',"id_registro_diario = '$this->id'");
            return $result;
        }

        public function factor () {
            $condicion = "Id_estado_1 = '$this->id_estado' AND Id_Produccion_FK_1 = '$this->op'";
            $result = Model::buscar_personalizado('t_control_produccion','factor',$condicion);
            return $result;
        }

        public function nuevo_factor () {
            $valores = "factor = '$this->factor'";
            $condicion = "Id_estado_1 = '$this->id_estado' AND Id_Produccion_FK_1 = '$this->op'";
            $result = Model::actualizar('t_control_produccion',$valores,$condicion);
            return $result;
        }

        public function obtener_control () {
            $result = Model::buscar($this->vista, 'Id_Produccion_FK_1',$this->op);
            return $result;
        }

        public function obtener_registro_diario () {
            $result = Model::buscar('t_registro_diario','id_registro_diario',$this->id);
            return $result;
        }

        public function obtener_registro_diario_e () {
            $result = Model::buscar('v_info_registro_diario','id_registro_diario',$this->id);
            return $result;
        }
        
        public function obtener_informacion_op () {
            $result = Model::buscar('v_control','Orden_Produccion',$this->op);
            return $result;
        }
    }