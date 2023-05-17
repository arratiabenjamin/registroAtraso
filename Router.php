<?php 

    namespace MVC;

    class Router{
        public $rutasGET = [];
        public $rutasPOST = [];

        public function get($url, $fnAsoc){
            $this->rutasGET[$url] = $fnAsoc;
        }
        public function post($url, $fnAsoc){
            $this->rutasPOST[$url] = $fnAsoc;
        }

        //TERMINAR
        public function validarURL(){
            //Almacenar Sesion
            session_start();
            $auth = $_SESSION['login'] ?? null;

            //Rutas Protegidas
            $rutasProtegidas = ['/'];

            $urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            //Proteger Rutas
            if(in_array($urlActual, $rutasProtegidas) && !$auth){
                header('Location: /login');
            }

            //Guardar FuncAsoc
            if($metodo === 'GET'){
                //Asignar Funcion Asociada a la Ruta Actual.
                //Si no existe se asigna en null.
                $fn = $this->rutasGET[$urlActual] ?? null;
            }else{
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }

            //Verificacion
            if($fn){
                //LLamar a la Funcion Asociada
                call_user_func($fn, $this);
            } else {
                echo 'Url NO Encontrada';
            }
        }

        public function show($view, $datos, $login = false){

            foreach( $datos as $key => $value ){
                $$key = $value;
            }
            
            // ob_start(); //PRODUCE ERRORES - NO ENCONTRADA SU SOLUCION
            include_once __DIR__ . "/views/$view.php";

            // $contenido = ob_get_clean(); //PRODUCE ERRORES - NO ENCONTRADA SU SOLUCION
            if(!$login){
                include_once __DIR__ . "/views/layout.php";
            }

        }
    }