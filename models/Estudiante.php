<?php

    namespace Model;

    class Estudiante extends ActiveRecord{
        
        public $rut_estudiante;
        public $nombres_estudiante;
        public $apellidos_estudiante;
        public $curso_estudiante;
        public $rut_apoderado;

        protected static $tabla = 'estudiantes';
        protected static $columnasDB = ['rut_estudiante', 'nombres_estudiante', 'apellidos_estudiante', 'curso_estudiante', 'rut_apoderado'];

        public function __construct($args = []){
            $this->rut_apoderado = $args['rut_apoderado'] ?? null;
            $this->nombres_estudiante = $args['nombres_estudiante'] ?? null;
            $this->apellidos_estudiante = $args['apellidos_estudiante'] ?? null;
            $this->curso_estudiante; 
        }

    }
