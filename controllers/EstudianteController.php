<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Estudiante;

    class EstudianteController{
        public static function index(Router $router){   
            $estudiantes = Estudiante::all();

            $router->show( '/admin/estudiantes', [
                "estudiantes" => $estudiantes
            ], '../css/admin' );
        }
        
        public static function crear(Router $router){

            $estudiante = new Estudiante();
            $errores = Estudiante::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $estudiante = new Estudiante($_POST['estudiante']);
                $errores = $estudiante->validar();
                if(empty($errores)){
                    $estudiante->guardar();
                }

            }

            $router->show( '/admin/estudiantes/crear', [
                'estudiante' => $estudiante,
                'errores' => $errores
            ], '../../css/' );

        }
        
        public static function actualizar(Router $router){

            $estudiante = Estudiante::findRecord($_GET['id']) ?? Estudiante::findRecord($_POST['id']);
            $errores = Estudiante::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $args = $_POST['estudiante'];
                $estudiante->sincronizar($args);
                $errores = $estudiante->validar();

                if (empty($errores)) {
                    $estudiante->guardar($_POST['id']);
                }

            }
            
            $router->show('admin/estudiantes/actualizar', [
                'estudiante' => $estudiante,
                'errores' => $errores
            ], '../../css/formularioestudiante');

        }

        public static function eliminar(Router $router){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $idEntidad = $_POST['id'];
                //Validar ID

                if($idEntidad){
                    $entidad = $_POST['entidad'];
                    if(validarEntidad($entidad)){
                        $entidad = Estudiante::findRecord($idEntidad);
                        $entidad->eliminar($entidad->rut_estudiante);
                    }
                }
            }
        }
    }
