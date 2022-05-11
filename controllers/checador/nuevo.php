<?php
    require_once "models/Model.php";
    require_once "routes/web.php";
    require_once "models/checador/nuevoModel.php";

    class nuevo{
        public $model;
        public $web;
        public $nuevoModel;

        public function __construct()
        {
            $this->nuevoModel = new nuevoModel();
            $this->model= new Model();
            $this->web = new Web();
        }

        public function obtener()
        {
            $result = $this->model->mostrar('t_incidencias');
            echo json_encode($result);
        }
    }