<?php

    namespace Model;

    class Apoderado extends User{
        
        public $rut_apoderado;
        public $nombre_apoderado;
        public $apellido_apoderado;
        public $password_apoderado;

        protected static $tabla = 'apoderados';
        protected static $columnasDB = ['rut_apoderado', 'password_apoderado', 'nombre_apoderado', 'apellido_apoderado' ];

    }