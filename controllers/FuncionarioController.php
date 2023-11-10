<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Atraso;
    use Model\Estudiante;
    use Model\Apoderado;
    use Model\Funcionario;
    use Model\Curso;

    class FuncionarioController{

        public static function index(Router $router){
            
            $atrasos = Atraso::getLimit(5) ?? null;
            $estudiantes = Estudiante::getLimit(5) ?? null;
            $estudiantesAll = Estudiante::all() ?? null;
            $apoderados = Apoderado::getLimit(5) ?? null;
            $apoderadosAll = Apoderado::all() ?? null;
            $funcionarios = Funcionario::getLimit(5) ?? null;
            $cursos = Curso::all();
            
            $resultado = $_GET['resultado'] ?? null;
            
            $router->show( '/admin/index', [
                'atrasos' => $atrasos,
                'estudiantes' => $estudiantes,
                'estudiantesAll' => $estudiantesAll,
                'apoderados' => $apoderados,
                'apoderadosAll' => $apoderadosAll,
                'funcionarios' => $funcionarios,
                'cursos' => $cursos,
                'resultado' => $resultado
            ], '../css/funcionario' );
        }

        public static function crear(Router $router){

            $funcionario = new Funcionario();
            $errores = Funcionario::getErrores();
            
            $atrasos = Atraso::getLimit(5) ?? null;
            $estudiantes = Estudiante::getLimit(5) ?? null;
            $estudiantesAll = Estudiante::all() ?? null;
            $apoderados = Apoderado::getLimit(5) ?? null;
            $apoderadosAll = Apoderado::all() ?? null;
            $funcionarios = Funcionario::getLimit(5) ?? null;
            $cursos = Curso::all();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $_POST['funcionario']['password_func'] = password_hash($_POST['password_func'], PASSWORD_DEFAULT);
                $funcionario = new Funcionario($_POST['funcionario']);
                $errores = $funcionario->validar();
                if(empty($errores)){
                    $funcionario->guardar();
                }

            }

            $router->show( '/admin/index', [
                'funcionario' => $funcionario,
                'errores' => $errores,
                'atrasos' => $atrasos,
                'estudiantes' => $estudiantes,
                'estudiantesAll' => $estudiantesAll,
                'apoderados' => $apoderados,
                'apoderadosAll' => $apoderadosAll,
                'funcionarios' => $funcionarios,
                'cursos' => $cursos
            ], '../../css/funcionario' );

        }

        public static function actualizar(Router $router){

            $funcionario = Funcionario::findRecordColumnEspecific($_GET['id']) ?? Funcionario::findRecordColumnEspecific($_POST['id']);
            $errores = Funcionario::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST['funcionario']['password_func'] = password_hash($_POST['password_func'], PASSWORD_DEFAULT);
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
            ], '../../css/funcionario');

        }
        public static function actualizar1(Router $router){

            $funcionario = Funcionario::findRecord($_GET['id']) ?? Funcionario::findRecord($_POST['id']);
            $errores = Funcionario::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $_POST['funcionario']['password_func'] = password_hash($_POST['password_func'], PASSWORD_DEFAULT);
                $args = $_POST['funcionario'];
                $funcionario->sincronizar($args);
                $errores = $funcionario->validar();

                if (empty($errores)) {
                    $funcionario->guardar($_POST['id']);
                }

            }
            
            $router->show('admin/funcionarios/actualizar1', [
                'funcionario' => $funcionario,
                'errores' => $errores
            ], '../../css/funcionario');

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
            $estudiantes = Estudiante::all();
            $cursos = Curso::all();

            $router->show( 'admin/atrasos/index', [
                'atrasos' => $atrasos,
                'estudiantes' => $estudiantes,
                'cursos' => $cursos
            ], "../../css/funcionario" );
        }
        public static function estudiantes(Router $router){
            $estudiantes = Estudiante::all();
            $cursos = Curso::all();

            $router->show( 'admin/estudiantes/index', [
                'estudiantes' => $estudiantes,
                'cursos' => $cursos
            ], "../../css/funcionario" );
        }
        public static function cursos(Router $router){
            $cursos = Curso::all();

            $router->show( 'admin/cursos/index', [
                'cursos' => $cursos,
            ], "../../css/funcionario" );
        }
        public static function apoderados(Router $router){
            $apoderados = Apoderado::all();
            
            $router->show( 'admin/apoderados/index', [
                'apoderados' => $apoderados
            ], "../../css/funcionario" );
        }
        public static function funcionarios(Router $router){
            $funcionarios = Funcionario::all();

            $router->show( 'admin/funcionarios/index', [
                'funcionarios' => $funcionarios
            ], "../../css/funcionario" );
        }

    }