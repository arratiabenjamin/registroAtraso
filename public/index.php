<?php

    //Llamando al app.php
    require_once __DIR__ . '/../includes/app.php';

    //Llamar Clases a Usar
    use MVC\Router;
    use Controllers\ApoderadoController;
    use Controllers\AtrasoController;
    use Controllers\EstudianteController;
    use Controllers\FuncionarioController;
    use Controllers\LoginController;

    //Creacion de Router
    $router = new Router();

    //Login - Autenticacion
    $router->get('/login', [LoginController::class, 'login'], true);
    $router->post('/login', [LoginController::class, 'login'], true);
    $router->get('/logout', [LoginController::class, 'logout'], true);

    $router->validarURL();