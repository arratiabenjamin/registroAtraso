<?php

    namespace Model;

use DateTime;

    class Atraso extends ActiveRecord{
        
        public $id_atraso;
        public $fecha_atraso;
        public $hora_atraso;
        public $rut_estudiante;
        public $rut_func;

        protected static $tabla = 'atrasos';
        protected static $columnasDB = ['id_atraso', 'fecha_atraso', 'hora_atraso', 'rut_estudiante', 'rut_func'];
        
        public function __construct($args = [])
        {
            $this->id_atraso = $args['id'] ?? null;
            $this->fecha_atraso = $args['fecha'] ?? null;
            $this->hora_atraso = $args['hora'] ?? null;
            $this->rut_estudiante = $args['rut_estudiante'] ?? null;
            $this->rut_func = $args['rut_func'] ?? null;
        }

        public function validar(){
            if(!$this->rut_estudiante){
                self::$errores[] = 'El rut del Alumno es Obligatorio.';
            }
            if(!Estudiante::findRecord($this->rut_estudiante)){
                self::$errores[] = 'Rut Inexistente.';
            }

            return self::$errores;
        }

    }
