<?php

    namespace Controllers;

    use DateTime;
    use MVC\Router;
    use Model\Atraso;
    use Model\Estudiante;
    use Model\Apoderado;
    use Model\Funcionario;
    use Model\Curso;

    class AtrasoController{
        public static function index(Router $router){   
            $atrasos = Atraso::all();

            $router->show( '/admin/atrasos', [
                "atrasos" => $atrasos
            ], '../../css/funcionario' );
        }

        public static function crear(Router $router){

            $atraso = new Atraso();
            $errores = Atraso::getErrores();
            
            
            $atrasos = Atraso::getLimit(5) ?? null;
            $estudiantes = Estudiante::getLimit(5) ?? null;
            $estudiantesAll = Estudiante::all() ?? null;
            $apoderados = Apoderado::getLimit(5) ?? null;
            $apoderadosAll = Apoderado::all() ?? null;
            $funcionarios = Funcionario::getLimit(5) ?? null;
            $cursos = Curso::all();

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                date_default_timezone_set('America/Santiago');
                $fecha = new DateTime();
                $_POST['atraso']['fecha'] = $fecha->format("Y-m-d");
                $_POST['atraso']['hora'] = $fecha->format("H:i");
                $atraso = new Atraso($_POST['atraso']);
                $errores = $atraso->validar();
                if(empty($errores)){
                    $atraso->guardar();
                }
            }

            $router->show( '/admin/index', [
                'atraso' => $atraso,
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

        public static function crearRIFD(){

            $atraso = new Atraso();
            $errores = Atraso::getErrores();
            $valores = [];

            date_default_timezone_set('America/Santiago');
            $fecha = new DateTime();
            $valores['hora'] = $fecha->format("H:i:s");
            $valores['fecha'] = $fecha->format("Y-m-d");
            $valores['rut_func'] = "12345678-9";
            $valores['rut_estu'] = $_POST["rut_estudiante"] ?? $_GET["rut_estudiante"];
            $atraso = new Atraso($valores);
            $errores = $atraso->validar();
            $validacion = self::validarHorarioAtraso(strtotime($atraso->hora_atr));
            //var_dump($validacion);
            //var_dump($atraso);
            //echo "<pre>";
            //var_dump($_GET);
            //echo "</pre>";
            //debugear($validacion);
            if($validacion) $atraso->guardar();

        }

        public static function actualizar(Router $router){

            $atraso = Atraso::findRecordColumnEspecific($_GET['id']) ?? Atraso::findRecordColumnEspecific($_POST['id']);
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
            ], '../../css/funcionario');

        }

        public static function eliminar(Router $router){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $idEntidad = $_POST['id'];
                //Validar ID

                if($idEntidad){
                    $entidad = $_POST['entidad'];
                    if(validarEntidad($entidad)){
                        $entidad = Atraso::findRecordColumnEspecific($idEntidad);
                        $entidad->eliminar($entidad->id_atr);
                    }
                }
            }
        }

        public static function validarHorarioAtraso($hora){

            if($hora >= strtotime("08:40") && $hora <= strtotime("10:00")) return true;
            else if($hora >= strtotime("10:25") && $hora <= strtotime("11:45")) return true;
            else if($hora >= strtotime("12:05") && $hora <= strtotime("13:25")) return true;
            else if($hora >= strtotime("14:05") && $hora <= strtotime("15:25")) return true;
            else if($hora >= strtotime("15:45")) return true;
            //else if($hora >= strtotime("15:45") && $hora <= strtotime("16:20")) return true;
            else return false;
            
        }

    }
