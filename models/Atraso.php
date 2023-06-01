<?php

    namespace Model;

    class Atraso extends ActiveRecord{
        
        public $id_atraso;
        public $fecha_atraso;
        public $hora_atraso;
        public $rut_estudiante;
        public $rut_func;

        protected static $tabla = 'atrasos';
        protected static $columnasDB = ['id_atraso', 'fecha_atraso', 'hora_atraso', 'rut_estudiante', 'rut_func'];
        
    }