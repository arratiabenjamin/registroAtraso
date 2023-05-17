<?php

    namespace Model;

    class Apoderado extends User{
        
        protected static $tabla = 'apoderados';
        protected static $columnas = ['rut_apoderado', 'password_apoderado', 'nombre_apoderado', 'apellido_apoderado' ];

    }