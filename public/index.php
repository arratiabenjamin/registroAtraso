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
    $router->get('/atraso', [AtrasoController::class, 'index']);
    $router->post('/atraso', [AtrasoController::class, 'eliminar']);
    $router->get('/atraso/crear', [AtrasoController::class, 'crear']);
    $router->post('/atraso/crear', [AtrasoController::class, 'crear']);
    $router->get('/atraso/actualizar', [AtrasoController::class, 'actualizar']);
    $router->post('/atraso/actualizar', [AtrasoController::class, 'actualizar']);

    //Login - Autenticacion
    $router->get('/', [LoginController::class, 'login'], true);
    $router->post('/', [LoginController::class, 'login'], true);
    $router->get('/logout', [LoginController::class, 'logout'], true);

    $router->validarURL();