<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;

    class AtrasoController{
        public static function index(Router $router){   
            $atrasos = Atraso::all();

            $router->show( '/admin/atrasos', [
                "atrasos" => $atrasos
            ] );
        }

        public static function crear(Router $router){

            $atraso = new Atraso();
            $errores = Atraso::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $atraso = new Atraso($_POST['atraso']);
                $errores = $atraso->validar();
                if(empty($errores)){
                    $atraso->guardar();
                }

            }

            $router->show( '/admin/atrasos/crear', [
                'atraso' => $atraso,
                'errores' => $errores
            ] );

        }
    }
