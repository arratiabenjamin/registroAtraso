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
        
    }