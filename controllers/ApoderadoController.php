<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Apoderado;
use Model\Atraso;
use Model\Estudiante;

    class ApoderadoController{
        public static function index(Router $router){
            $estudiantes = Estudiante::findRecordColumnEspecific('rut_apoderado', $_SESSION['usuario']);
            $atrasos = [];

            foreach($estudiantes as $estudiante){
                $atrasos[] = Atraso::findRecordColumnEspecific('rut_estudiante', $estudiante->rut_estudiante);
            }
            
            $router->show('apoderado/index', [
                'estudiantes', $estudiantes,
                'atrasos', $atrasos
            ]);
        }

        public static function crear(Router $router){

            $apoderado = new Apoderado();
            $errores = Apoderado::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $_POST['apoderado']['password_apoderado'] = password_hash($_POST['password_apoderado'], PASSWORD_DEFAULT);
                $apoderado = new Apoderado($_POST['apoderado']);
                $errores = $apoderado->validar();
                if(empty($errores)){
                    $apoderado->guardar();
                }

            }

            $router->show( '/admin/apoderados/crear', [
                'apoderado' => $apoderado,
                'errores' => $errores
            ], '../../css/' );

        }
    }
