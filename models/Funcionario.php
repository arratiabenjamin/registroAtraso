<?php

    namespace Model;

    class Funcionario extends User{
        
        protected static $tabla = 'funcionarios';
        protected static $columnas = ['rut_func', 'password_func', 'email_func','nombre_func', 'apellido_func' ];
        
    }