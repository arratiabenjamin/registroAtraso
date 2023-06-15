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
            $this->rut_estudiante = $args['rut_estudiante'] ?? null;
            $this->rut_apoderado = $args['rut_apoderado'] ?? null;
            $this->nombres_estudiante = $args['nombres_estudiante'] ?? null;
            $this->apellidos_estudiante = $args['apellidos_estudiante'] ?? null;
            $this->curso_estudiante = $args['curso_estudiante'] ?? null; 
        }

        public function validar(){
            if(!$this->rut_apoderado){
                self::$errores[] = 'El Rut del Alumno es Obligatorio.';
            }
            if(!$this->rut_apoderado){
                self::$errores[] = 'El Rut del Apoderado es Obligatorio.';
            }
            if(!$this->nombres_estudiante){
                self::$errores[] = 'El Nombre del Alumno es Obligatorio.';
            }
            if(!$this->apellidos_estudiante){
                self::$errores[] = 'El Apellido del Alumno es Obligatorio.';
            }
            if(!$this->curso_estudiante){
                self::$errores[] = 'El Curso del Alumno es Obligatorio.';
            }
            if(!Apoderado::findRecord($this->rut_apoderado)){
                self::$errores[] = 'Rut Inexistente.';
            }

            return self::$errores;
        }
    }
