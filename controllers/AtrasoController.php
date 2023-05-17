<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;

    class AtrasoController{
        public static function index( Router $router ){

            // $atrasos = Atraso::all();

            $router->show( 'atraso/index', [
                // 'atrasos' => $atrasos
            ] );

        }
    }
