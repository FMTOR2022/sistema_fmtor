<?php
    require_once "models/Model.php";

    class reporteModel extends Model
    {
        public $Id_reporte;
        public $Mes_de_creacion;
        public $ReportePDF;

        public function __construct()
        {
            parent::__construct();
        }

        public function getId_reporte()
        {
            return $this->Id_reporte;
        }

        public function getMes_de_creacion()
        {
            return $this->Mes_de_creacion;
        }

        public function getReportePDF()
        {
            return $this->ReportePDF;
        }

        public function setId_reporte($Id_reporte): void
        {
            $this->Id_reporte = $Id_reporte;
        }

        public function setMes_de_creacion($Mes_de_creacion): void
        {
            $this->Mes_de_creacion = $Mes_de_creacion;
        }

        public function setReportePDF($ReportePDF): void
        {
            $this->ReportePDF = $ReportePDF;
        }

        public function insertarreporte()
        {
            $tabla = 't_reporte';
            $parametros = 'Id_reporte,Mes_de_creacion,PDF';
            $values = "'$this->Id_reporte','$this->Mes_de_creacion','$this->ReportePDF'";
            $validacion = Model::insertar($tabla, $parametros, $values);
            return $validacion;
        }

        public function actualizarreporte()
        {
            $tabla = 't_reporte';
            $parametros = 'Id_reporte,Mes_de_creacion,Cliente,PDF';
            $values = "'$this->Id_reporte','$this->Mes_de_creacion','$this->ReportePDF'";
            $validacion = Model::actualizar($tabla, $parametros, $values);
            return $validacion;
        }
    }
