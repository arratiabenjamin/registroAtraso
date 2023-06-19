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
                    $rut = $user['rut'];
                    $password = $user['password'];
                    $user = [];
                    $user['tipo'] = 'funcionario';
                    $user['rut_func'] = $rut;
                    $user['nombre_func'] = ' ';
                    $user['apellido_func'] = ' ';
                    $user['password_func'] = $password;
                    $user['email_func'] = ' ';
                    $user['admin_func'] = ' ';
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
                    
                    $resultado = $auth->existeUsuario($user['rut_func'] ?? $user['rut_apoderado']);

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
                            $_SESSION['admin'] = Funcionario::findRecord($user['rut_func'])->admin_func;
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
