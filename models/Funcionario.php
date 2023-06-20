<?php

    namespace Model;

    class Funcionario extends User{

        public $rut_func;
        public $nombre_func;
        public $apellido_func;
        public $password_func;
        public $email_func;
        public $admin_func;
        
        protected static $tabla = 'funcionarios';
        protected static $columnasDB = ['rut_func', 'nombre_func', 'apellido_func', 'password_func', 'email_func', 'admin_func' ];
        
        public function __construct($args = []){
            $this->tipo = $args['tipo'] ?? null;
            $this->rut_func = $args['rut_func'] ?? null;
            $this->nombre_func = $args['nombre_func'] ?? null;
            $this->apellido_func = $args['apellido_func'] ?? null;
            $this->password_func = $args['password_func'] ?? null;
            $this->email_func = $args['email_func'] ?? null;
            $this->admin_func = $args['admin_func'] ?? "0";
        }

        public function validar(){
            if(!$this->rut_func){
                self::$errores[] = 'El Rut del Funcionario es Obligatorio.';
            }
            if(!$this->nombre_func){
                self::$errores[] = 'El Nombre del Funcionario es Obligatorio.';
            }
            if(!$this->apellido_func){
                self::$errores[] = 'El Apellido del Funcionario es Obligatorio.';
            }
            if(!$this->password_func){
                self::$errores[] = 'El Password del Funcionario es Obligatorio.';
            }
            if(!$this->email_func){
                self::$errores[] = 'El Email del Funcionario es Obligatorio.';
            }
            if($this->admin_func != "0" && $this->admin_func != "1"){
                self::$errores[] = 'El Admin del Funcionario es Obligatorio.';
            }

            return self::$errores;
        }
    }