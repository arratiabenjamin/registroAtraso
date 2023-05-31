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

    }