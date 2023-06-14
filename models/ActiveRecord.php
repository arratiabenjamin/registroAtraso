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

        //CRUD
        public function guardar(){
            //Si no hay id o mejor dicho es Nulo significa que se actualiza
            if(is_null($this->id_atraso) || is_null($this->rut_apoderado) || is_null($this->rut_estudiante) || is_null($this->rut_func)){
                $this->crear();
            } else {
                $this->actualizar();
            }
        }
        public function crear(){
            $atributos = $this->sanitizarAtributos();
            $keys = join(', ', array_keys($atributos));
            $values = join("', '", array_values($atributos));

            $query = "INSERT INTO " . static::$tabla . " ( " . $keys . " ) VALUES ( ' " . $values . " ' )";
            $resultado = self::$DB->query($query);
            if($resultado){
                header('Location: /');
            }
        }
        public function actualizar(){
            //Sanitizar
            $atributos = $this->sanitizarAtributos();
            $values = [];

            foreach($atributos as $key => $value){
                $values[] = "$key = '$value'";
            }
            $query = "UPDATE " . static::$tabla . " SET " . join(' ,', $values) . " WHERE id = $this->id LIMIT 1";
            $resultado = self::$DB->query($query);

            if($resultado){
                header('Location: /');
            }

        }
        public function eliminar(){
            $query = "DELETE FROM" . static::$tabla . "WHERE id = " . self::$DB->escape_string($this->id) . " LIMIT 1";
            $resultado = self::$DB->query($query);

            if($resultado){
                header('Location: /');
            }
        }

        //Obtener Atributos
        public function atributos(){
            $atributos = [];
            foreach( static::$columnasDB as $columna ){
                if($columna === 'id_atraso')continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }
        //Sanitizar Datos
        public function sanitizarAtributos(){
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$DB->escape_string($value);
            }
            return $sanitizado;
        }

        //Recolectar Todos los Registros
        public static function all(){
            $query = "SELECT * FROM " . static::$tabla;
            $tabla = self::consultarSQL($query);
            return $tabla;
        }
        //Recolectar Cantidad Especifica de Registros
        public static function getLimit($limit){
            $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limit;
            $tabla = self::consultarSQL($query);
            return $tabla;
        }
        //Buscar un Registro Especifico
        public static function findRecord($id){
            $query = "SELECT * FROM " . static::$tabla . " WHERE " . static::$columnasDB[0] . " = '" . $id . "';";
            $tabla = self::consultarSQL($query);
            return array_shift($tabla);
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

        public function sincronizar($args = []) {
            foreach($args as $key => $value){
                //Si las propiedades Existen y valor no es nulo - El atributo tendra como valor "$value".
                if(property_exists($this, $key) && !is_null($value)) {
                    $this->$key = $value;
                }
            }
        }
    }