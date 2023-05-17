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

        public static function all(){
            $query = "SELECT * FROM " . static::$tabla;
            $tabla = self::consultarSQL($query);
            return $tabla;
        }
        
        //Consultar DB
        public static function consultarSQL($query) {

            $tablas = self::$DB->query($query);

            $array = [];
            foreach($tablas as $tabla) {
                $array[] = static::crearObjeto($tabla);
            }

            $tablas->free();

            return $array;

        }

        //Crear Objetos
        protected static function crearObjeto($tabla) {
            $obj = new static;

            foreach($tabla as $key => $value){

                if(property_exists($obj, $key)){

                    $obj->$key = $value;

                }

            }

            return $obj;

        }

    }