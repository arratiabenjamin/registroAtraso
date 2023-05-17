<?php

    //Llamando al app.php
    require_once __DIR__ . '/../includes/app.php';

    //Llamar Clases a Usar
    use MVC\Router;
    use Controllers\AtrasoController;
    use Controllers\EstudianteController;
    use Controllers\LoginController;

    //Creacion de Router
    $router = new Router();

    //Atrasos
    $router->get('/', [AtrasoController::class, 'index']);

    //Login - Autenticacion
    $router->get('/login', [LoginController::class, 'login'], true);
    $router->post('/login', [LoginController::class, 'login'], true);
    $router->get('/logout', [LoginController::class, 'logout'], true);

    $router->validarURL();