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
                    $rut = $user['rut'];
                    $password = $user['password'];
                    $user = [];
                    $user['rut_apoderado'] = $rut;
                    $user['nombre_apoderado'] = ' ';
                    $user['apellido_apoderado'] = ' ';
                    $user['password_apoderado'] = $password;
                    $auth = new Apoderado($user);
                }

                $errores = $auth->validar();

                if(empty($errores)){
                    
                    $resultado = $auth->existeUsuario($user['rut'] ?? $user['rut_apoderado']);

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
            ], '../css/login', true );
        }

        public static function logout(Router $router){
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
    }
