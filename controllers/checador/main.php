<?php

    require_once "models/Model.php";
    require_once "routes/web.php";

    class Main {
        public $model;
        public $web;

        public function __construct(){
            $this->model= new Model();
            $this->web = new Web();
        }

        public function mostrar () {
            $this->web->View('checador/nuevo','');
        }

        public function registrar () {
            $this->web->View('checador/menuAsistencia','');
        }

        public function  visualizar() {
            $this->web->View('checador/menuAdmin','');
        }

        public function  entrada() {
            $this->web->View('checador/entrada','');
        }

        public function  almuerzo() {
            $this->web->View('checador/almuerzo','');
        }
        public function  salida() {
            $this->web->View('checador/salida','');
        }
        public function  extra() {
            $this->web->View('checador/extra','');
        }
        public function  listas() {
            $this->web->View('checador/listas','');
        }
        public function  incidencias() {
            $this->web->View('checador/incidencias','');
        }
        public function excel_incidencias(){
            $data = $this->model->mostrar('v_incidencias');
            $this->web->PDF('checador/gen_exc_incidencia',$data);
        }
        public function excel_horario(){
            $this->web->View('checador/gen_exc_horario','');
        }
    }
?>