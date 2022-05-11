<?php 
    require_once 'models/Model.php';
    class personal extends Model
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
 
        public function mostrarDatos()
        {
            
        }

    }
    
?>