<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;

    class AtrasoController{
        public static function index(Router $router){   
            $atrasos = Atraso::all();

            $router->show( '/admin/atrasos', [
                "atrasos" => $atrasos
            ], '../css/admin' );
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
            ], '../../css/formularioAtraso' );

        }

        public static function actualizar(Router $router){

            $atraso = Atraso::findRecord($_GET['id']) ?? Atraso::findRecord($_POST['id']);
            $errores = Atraso::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $args = $_POST['atraso'];
                $atraso->sincronizar($args);
                $errores = $atraso->validar();

                if (empty($errores)) {
                    $atraso->guardar($_POST['id']);
                }

            }
            
            $router->show('admin/atrasos/actualizar', [
                'atraso' => $atraso,
                'errores' => $errores
            ], '../../css/formularioAtraso');

        }

        public static function eliminar(Router $router){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $idEntidad = $_POST['id'];
                //Validar ID

                if($idEntidad){
                    $entidad = $_POST['entidad'];
                    if(validarEntidad($entidad)){
                        $entidad = Atraso::findRecord($idEntidad);
                        $entidad->eliminar($entidad->id_atraso);
                    }
                }
            }
        }
    }
