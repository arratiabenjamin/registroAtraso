<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Funcionario;
    use Model\Apoderado;

    class LoginController{

        public static function login(Router $router){

            $errores = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
                $user = $_POST;
                if( $user['tipo'] === 'funcionario' ){
                    $auth = new Funcionario($user);
                }else{
                    $auth = new Apoderado($user);
                }

                $errores = $auth->validar();

                if(empty($errores)){

                    $resultado = $auth->existeUsuario($user['tipo']);

                    if(!$resultado){
                        if( $user['tipo'] === 'funcionario' ){
                            $errores = Funcionario::getErrores();
                        }else{
                            $errores = Apoderado::getErrores();
                        }
                    } else {

                        $autenticacion = $auth->comprobarPassword($resultado);

                        if($autenticacion){
                            session_start();
                            $_SESSION['admin'] = Funcionario::findRecord($user['rut'])->admin_func;
                            $auth->autenticar();
                        }else{
                            if( $user['tipo'] === 'funcionario' ){
                                $errores = Funcionario::getErrores();
                            }else{
                                $errores = Apoderado::getErrores();
                            }
                        }
                    }
                }
            }

            $router->show( 'auth/login', [
                'errores' => $errores
            ], 'login' );
        }

        public static function logout(Router $router){
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
    }
