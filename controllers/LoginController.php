<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Funcionario;
    use Model\Apoderado;

    class LoginController{

        public static function login(Router $router){
            $errores = [];

            if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
                $user = $_POST['login'];
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
            ] );
        }
    }
