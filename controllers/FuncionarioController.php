<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;
    use Model\Estudiante;
    use Model\Apoderado;
    use Model\Funcionario;

    class FuncionarioController{

        public static function index(Router $router){
            $atrasos = Atraso::getLimit(3) ?? null;
            $estudiantes = Estudiante::getLimit(3) ?? null;
            $apoderados = Apoderado::getLimit(3) ?? null;
            $funcionarios = Funcionario::getLimit(3) ?? null;
            $resultado = $_GET['resultado'] ?? null;

            $router->show( '/admin/index', [
                'atrasos' => $atrasos,
                'estudiantes' => $estudiantes,
                'apoderados' => $apoderados,
                'funcionarios' => $funcionarios,
                'resultado' => $resultado
            ], false, 'admin' );
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