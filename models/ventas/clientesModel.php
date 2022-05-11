<?php
    require_once "models/Model.php";

    class clientesModel extends Model {
        public $Id_Clientes;
        public $Razon_social;
        public $Nombre;
        public $Telefono;
        public $Correo;
        public $Direccion;

        public function __construct() {
            parent::__construct();
        }

        public function setId_Clientes($Id_Clientes): void {
            $this->Id_Clientes = $Id_Clientes;
        }

        public function setRazon_social($Razon_social): void {
            $this->Razon_social = $Razon_social;
        }

        public function setNombre($Nombre): void {
            $this->Nombre = $Nombre;
        }

        public function setTelefono($Telefono): void
        {
            $this->Telefono = $Telefono;
        }

        public function setCorreo($Correo): void
        {
            $this->Correo = $Correo;
        }

        public function setDireccion($Direccion): void
        {
            $this->Direccion = $Direccion;
        }

        public function insertarCliente()
        {
            $tabla = 't_clientes';
            $parametros = 'Id_Clientes,Razon_social,Nombre,Telefono,Correo,Direccion';
            $values = "'$this->Id_Clientes','$this->Razon_social','$this->Nombre','$this->Telefono','$this->Correo','$this->Direccion'";
            $validacion = Model::insertar($tabla, $parametros, $values);
            return $validacion;
        }

        public function actualizarCliente()
        {
            $tabla = 't_clientes';
            $parametros = 'Id_Clientes,Razon_social,Nombre,Telefono,Correo,Direccion';
            $values = "'$this->Id_Clientes','$this->Razon_social','$this->Nombre','$this->Telefono','$this->Correo','$this->Direccion'";
            $validacion = Model::actualizar($tabla, $parametros, $values);
            return $validacion;
        }
    }
?>