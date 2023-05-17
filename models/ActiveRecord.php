<?php

    namespace Model;

    class ActiveRecord{

        //Statics Vars

        //DB
        protected static $DB;
        protected static $columnasDB = []; //Usado para Satinizar
        protected static $tabla = '';
        //Errores
        protected static $errores = [];

        public static function setDB($db){
            self::$DB = $db;
        }

        public static function getErrores(){
            return static::$errores;
        }
    }