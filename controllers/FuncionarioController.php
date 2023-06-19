<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;
    use Model\Estudiante;
    use Model\Apoderado;
    use Model\Funcionario;

    class FuncionarioController{

        public static function index(Router $router){
            
            $atrasos = Atraso::getLimit(5) ?? null;
            $estudiantes = Estudiante::getLimit(5) ?? null;
            $apoderados = Apoderado::getLimit(5) ?? null;
            $funcionarios = Funcionario::getLimit(5) ?? null;
            $resultado = $_GET['resultado'] ?? null;

            $router->show( '/admin/index', [
                'atrasos' => $atrasos,
                'estudiantes' => $estudiantes,
                'apoderados' => $apoderados,
                'funcionarios' => $funcionarios,
                'resultado' => $resultado
            ], '../css/admin' );
        }

        public static function crear(Router $router){

            $funcionario = new Funcionario();
            $errores = Funcionario::getErrores();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $_POST['funcionario']['password_func'] = password_hash($_POST['password_func'], PASSWORD_DEFAULT);
                $funcionario = new Funcionario($_POST['funcionario']);
                $errores = $funcionario->validar();
                if(empty($errores)){
                    $funcionario->guardar();
                }

            }

            $router->show( '/admin/funcionarios/crear', [
                'funcionario' => $funcionario,
                'errores' => $errores
            ], '../../css/' );

        }

        public static function actualizar(Router $router){

            $funcionario = Funcionario::findRecord($_GET['id']) ?? Funcionario::findRecord($_POST['id']);
            $errores = Funcionario::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $args = $_POST['funcionario'];
                $funcionario->sincronizar($args);
                $errores = $funcionario->validar();

                if (empty($errores)) {
                    $funcionario->guardar($_POST['id']);
                }

            }
            
            $router->show('admin/funcionarios/actualizar', [
                'funcionario' => $funcionario,
                'errores' => $errores
            ], '../../css/formulariofuncionario');

        }

        public static function eliminar(){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $idEntidad = $_POST['id'];
                //Validar ID

                if($idEntidad){
                    $entidad = $_POST['entidad'];
                    if(validarEntidad($entidad)){
                        $entidad = Funcionario::findRecord($idEntidad);
                        $entidad->eliminar($entidad->rut_func);
                    }
                }
            }
        }

        public static function atrasos(Router $router){
            $atrasos = Atraso::all();

            $router->show( 'admin/atrasos/index', [
                'atrasos' => $atrasos
            ] );
        }
        public static function estudiantes(Router $router){
            $estudiantes = Estudiante::all();

            $router->show( 'admin/estudiantes/index', [
                'estudiantes' => $estudiantes
            ] );
        }
        public static function apoderados(Router $router){
            $apoderados = Apoderado::all();

            $router->show( 'admin/apoderados/index', [
                'apoderados' => $apoderados
            ] );
        }
        public static function funcionarios(Router $router){
            $funcionarios = Funcionario::all();

            $router->show( 'admin/funcionarios/index', [
                'funcionarios' => $funcionarios
            ] );
        }

    }