<?php 
    require_once 'models/Model.php';
    class usuario extends Model
    {
     public $id;
     public $nombre;
     public $apellidoP;
     public $apellidoM;
     public $fechaNacimiento;
     public $telefono;
     public $correo;
     public $fechaIngreso;
     public $curp;
     public $rfc;
     public $nss;
     public $estado;
     public $foto;
     public $usuario;
     public $contrasena;
     public $nombrePuesto;
     public $nombreRol;
     public $nombreDepartamento;


    public function getNombre(){return $this->nombre;}
    public function setNombre ($nombre): void{$this->nombre = $nombre;}
    public function getApellidoP(){return $this->apellidoP;}
    public function setApellidoP($apellidoP): void{$this->apellidoP = $apellidoP;}
    public function getApellidoM(){return $this->apellidoM;}
    public function setApellidoM($apellidoM): void{$this->apellidoM = $apellidoM;}
    public function getFechaNacimiento(){return $this->fechaNacimiento;}
    public function setFechaNacimiento ($fechaNacimiento): void{$this->fechaNacimiento = $fechaNacimiento;}
    public function getTelefono(){return $this->telefono;}
    public function setTelefono ($telefono): void{$this->telefono = $telefono;}
    public function getCorreo(){return $this->correo;}
    public function setCorreo ($correo): void{$this->correo = $correo;}
    public function getFechaIngreso() {return $this->fechaIngreso;}
    public function setFechaIngreso ($fechaIngreso): void{$this->fechaIngreso = $fechaIngreso;}
    public function getCurp(){return $this->curp;}
    public function setCurp ($curp): void{$this->curp = $curp;}
    public function getRfc(){return $this->rfc;}
    public function setRfc ($rfc): void{$this->rfc = $rfc;}
    public function getNss(){return $this->nss;}
    public function setNss ($nss): void{$this->nss = $nss;}
    public function getEstado(){return $this->estado;}
    public function setEstado ($estado): void{$this->estado = $estado;}
    public function getUsuario(){return $this->usuario;}
    public function setUsuario($usuario): void{$this->usuario = $usuario;}
    public function getContrasena(){return $this->contrasena;}
    public function setContrasena($contrasena): void{$this->contrasena = $contrasena;}
    public function getNombrePuesto(){return $this->nombrePuesto;}
    public function setNombrePuesto ($nombrePuesto): void{$this->nombrePuesto = $nombrePuesto;}
    public function getNombreRol(){return $this->nombreRol;}
    public function setNombreRol ($nombreRol): void{$this->nombreRol = $nombreRol;}
    public function getNombreDepartamento(){return $this->nombreDepartamento;}
    public function setNombreDepartamento($nombreDepartamento): void{$this->nombreDepartamento = $nombreDepartamento;}
    public function getFoto(){return $this->foto;}
    public function setFoto($foto) :void{$this->foto = $foto;}

    public function insertarEmpleado()
    {
        $tabla = 't_empleados';
        $parametros = 'nombre,apellidoP,apellidoM,fechaNacimiento,telefono,correo,fechaIngreso,curp,rfc,nss,estado,id_puesto_1,foto,id_departamento_2'; 
        $values = "'$this->nombre','$this->apellidoP','$this->apellidoM','$this->fechaNacimiento','$this->telefono','$this->correo','$this->fechaIngreso','$this->curp','$this->rfc','$this->nss','$this->estado','$this->nombrePuesto','$this->foto','$this->nombreDepartamento'";
        $validar_curp = Model::buscar_personalizado($tabla,'curp',"curp = '$this->curp'");
        if (!empty($validar_curp[0]['curp'])) {
            echo 'el empleado ya esta registrado';
            }else {
                $validacion = self::insertar($tabla,$parametros,$values);
                if ($validacion) {
                $campo = 'id_empleados';
                $nombre = "curp = '$this->curp'";
                $consulta = self::buscar_personalizado($tabla,$campo,$nombre);
                if(!empty($consulta)) {
                    $id = $consulta[0]['id_empleados'];
                    $condicion = "id_empleados = '$id'";
                    return self::insertarUsuario($tabla,$campo,$condicion);
                        } else{
                            echo 'No se inserto';
                        }
            
                        }else{
                            echo 'consulta fallida';
                        }
            }    
        }

    public function insertarUsuario($tabla,$campo,$condicion){
        $id_empleado = Model::buscar_personalizado($tabla,$campo,$condicion);
        if (!empty($id_empleado)) {
            $id = $id_empleado[0]['id_empleados'];
            $condicion = "id_empleado_1 = '$this->id'";
            $validacion = Model::buscar_personalizado('t_usuario','id_empleado_1',$condicion);
                if(!empty($validacion['id_empleado_1'])) {
                    echo 'El id ya esta relacionado con otro';
                    
                }else {
                    $tabla = 't_usuario';
                    $parametros = 'usuario,id_empleado_2,id_rol_1,contrasena';
                    $password = password_hash($this->contrasena, PASSWORD_DEFAULT, ['cost'=>10] );
                    $values = "'$this->usuario','$id','$this->nombreRol','$this->nombreDepartamento'";
                    return Model::insertar($tabla,$parametros,$values);
                }
        } else {
            echo 'No se inserto 2';
        }
        
    }
    

    public function insertar_soloUsuario()
    {
            $empleado = 't_empleados';
            $condicion = "curp = '$this->curp'";
            $campo = 'id_empleados';
            $consulta = Model::buscar_personalizado($empleado,$campo,$condicion);
            $id_empleado = $consulta[0]['id_empleados'];
            $usuario = Model::buscar_personalizado('t_usuario','id_empleado_2',"id_empleado_1 = '$id_empleado'");
            if (!empty($usuario[0]['id_empleado_1'])) {
                echo 'el usuario ya se registro';
            }else {
                    if(!empty($consulta)){
                        $id = $consulta[0]['id_empleado_1'];
                        $tabla = 't_usuario';
                        $columnas = 'id_empleado_2,usuario,contrasena,id_rol';
                        $password = password_hash($this->contrasena, PASSWORD_DEFAULT,['cost'=>10]);
                        $valores = "'$id','$this->usuario','$password','$this->nombreRol'";
            return Model::insertar($tabla,$columnas,$valores);
            }else {
            echo 'No se inserto 3';
        }  
    }
    }


}
    

?>