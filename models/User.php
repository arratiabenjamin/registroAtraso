<?php

    namespace Model;

    class User extends ActiveRecord{

        public $id;
        public $tipo;
        public $rut;
        public $password;
        
        public function __construct($args = [])
        {
            $this->id = $args['id'] ?? null;
            $this->tipo = $args['tipo'] ?? null;
            $this->rut = $args['rut'] ?? null;
            $this->password = $args['password'] ?? null;
        }

        public function validar(){
            if(!$this->tipo){
                static::$errores[] = 'El Tipo de Usuario es Obligatorio';
            }
            if(!$this->rut){
                static::$errores[] = 'El Rut es Obligatorio';
            }
            if(!$this->password){
                static::$errores[] = 'El Password es Obligatorio';
            }

            return static::$errores;
        }
        public function existeUsuario($rut){
            $query = "SELECT * FROM " . static::$tabla . " WHERE " . static::$columnas[0] . " = '" . $this->rut . "' LIMIT 1";
            $resultado = static::$DB->query($query);

            if(!$resultado->num_rows){
                static::$errores[] = 'Usuario Inexistente Intente Nuevamente';
                return;
            }

            return $resultado;

        }
        public function comprobarPassword($resultado){
            $user = $resultado->fetch_object();
            $auth = password_verify($this->password, $user->password);
            debugear($auth);

            if(!$auth){
                static::$errores[] = 'Password Incorrecto Intente Nuevamente';
            }

            return $auth;
        }
        public function autenticar(){
            session_start();
            $_SESSION['usuario'] = $this->rut;
            $_SESSION['login'] = true;
        }

    }