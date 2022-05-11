<?php 

    require_once 'models/Model.php';

    class proveedorModel extends Model {
        public $id_proveedor;
        public $proveedor;
        public $direccion;
        public $ciudad;
        public $telefono;
        public $correo;

        public function setIdProveedor ($id_proveedor) : void {
            $this->id_proveedor = $id_proveedor;
        }

        public function setProveedor ($proveedor) : void {
            $this->proveedor = $proveedor;
        }

        public function setDireccion ($direccion) : void {
            $this->direccion = $direccion;
        }

        public function setCiudad ($ciudad) : void {
            $this->ciudad = $ciudad;
        }   

        public function setTelefono ($telefono) : void {
            $this->telefono = $telefono;
        }

        public function setCorreo ($correo) : void {
            $this->correo = $correo;
        }

        public function ingresar () {
            $tabla = 't_proveedores';
            $columnas = 'Proveedor,Direccion,Ciudad,Telefono,Correo';
            $valores = "'$this->proveedor','$this->direccion','$this->ciudad','$this->telefono','$this->correo'";
            $result = Model::insertar($tabla,$columnas,$valores);
            return $result;
        }

        public function modificar () {
            $tabla = 't_proveedores';
            $columnas = "Proveedor = '$this->proveedor',Direccion = '$this->direccion',Ciudad = '$this->ciudad',Telefono = '$this->telefono',Correo = '$this->correo'";
            $valores = "Id_Proveedor = '$this->id_proveedor'";
            $result = Model::actualizar($tabla,$columnas,$valores);
            return $result;
        }
    }

?>