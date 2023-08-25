<?php

    namespace Model;

    class Apoderado extends User{
        
        public $rut_apoderado;
        public $nombre_apoderado;
        public $apellido_apoderado;
        public $password_apoderado;
        public $tipoInicioSesion;

        protected static $tabla = 'apoderados';
        protected static $columnasDB = ['rut_apoderado', 'password_apoderado', 'nombre_apoderado', 'apellido_apoderado' ];

        public function __construct($args = [])
        {
            $this->rut_apoderado = $args['rut_apoderado'] ?? null;
            $this->nombre_apoderado = $args['nombre_apoderado'] ?? null;
            $this->apellido_apoderado = $args['apellido_apoderado'] ?? null;
            $this->password_apoderado = $args['password_apoderado'] ?? null;
            $this->tipoInicioSesion = $args['tipoInicioSesion'] ?? null;
        }

        public function validar(){
            if(!$this->rut_apoderado){
                self::$errores[] = 'El Rut del Apoderado es Obligatorio.';
            }
            if(!$this->nombre_apoderado){
                self::$errores[] = 'El Nombre del Apoderado es Obligatorio.';
            }
            if(!$this->apellido_apoderado){
                self::$errores[] = 'El Apellido del Apoderado es Obligatorio.';
            }
            if(!$this->password_apoderado){
                self::$errores[] = 'El Password del Apoderado es Obligatorio.';
            }

            return self::$errores;
        }
    }