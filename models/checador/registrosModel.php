<?php 
    require_once "models/Model.php";
    class registrosModel extends Model{
     public $id_registro;
     public $usuario;
     public $feha;
     public $tipo_registro;
    
    //Mandamos a llamar la clase Conexion de conexion.php
     public function __construct(){
         parent::__construct();
     }
      //en las funciones el getIdUsario se manda a llamar de la base de datos
    //retorna el valor igualado
    public function getIdRegistro(){
        return $this->id_registro;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getTipoRegistro(){
        return $this->tipo_registro;
    }
     public function setIdRegistro($id_registro){
        $this->id_registro=$id_registro;
     }
     public function setUsuario($usuario):void{
         $this->usuario = $usuario;
     }
    //El Set se manda a traer de la interfaz
    public function setfecha($fecha):void{
        $this->fecha =$fecha;
    }
    public function setTipoRegistro($tipo_registro):void{
        $this->tipo_registro = $tipo_registro;
    }
    
    public function insertar1(){
        $tabla = "t_usuario";
        $columnas = "usuario";
        $condicion = "id_empleado_1 = '$this->usuario'";
        $resultado = Model::buscar_personalizado($tabla, $columnas, $condicion);

        $usuario = $resultado[0]['usuario'];
        $obj = new Model();


        $tabla1="t_registro";
        $columnas1="usuario,fecha,tipo_registro";
        $valores="'$usuario', '$this->fecha','$this->tipo_registro'";

        $resultado= $obj->insertar($tabla1,$columnas1,$valores);


        if ($resultado) {
            return 1;
        }else {
            return 0;
        }
    }

    public function consultar(){
        $tabla = "t_horario, t_usuario, t_empleados";
        $columnas = "entrada";
        $condicion = "t_horario.usuario = t_usuario.usuario AND t_usuario.id_empleado_1 = t_empleados.id_empleados AND t_empleados.id_empleados = '$this->usuario'";

        $resultado = Model::buscar_personalizado($tabla, $columnas, $condicion);
        return json_encode($resultado);
    }

    public function consultar_entrada_empleado () {
        $tabla = 'v_listaentrada';
        $columnas = 'count(*) AS total';
        $condicion = "id_empleados = '$this->usuario' AND fecha LIKE '%".$this->fecha."%'";

        $resultado = Model::buscar_personalizado($tabla,$columnas,$condicion);
        return json_encode($resultado);
    }
/*
    public function filtrar(){
        //SELECT entrada, fecha FROM t_horario, t_registro WHERE t_horario.usuario = '17f0d6043a62d19fb96e8ec73086372a'
        $query = $this->db->query("SELECT entrada, fecha, t_horario.usuario FROM t_horario, t_registro, t_usuario WHERE t_usuario.id_empleado_1 = 43 AND t_usuario.usuario = t_registro.usuario AND t_registro.usuario = t_horario.usuario;
        ");
        return $query;
        const valor = {
            entada :  
            fecha : 
            usuario : 
        }
        const json = JSON.stringify(valor);
        const respuesta = fetchAPI('', '' +json, '')
        respuesta.then(json => {
            console.log(json);
        })
    }*/
    
}
?>