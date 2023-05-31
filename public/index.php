<?php

    //Llamando al app.php
    require_once __DIR__ . '/../includes/app.php';

    //Llamar Clases a Usar
    use MVC\Router;
    use Controllers\AtrasoController;
    use Controllers\EstudianteController;
    use Controllers\LoginController;
    use Controllers\ApoderadoController;
    use Controllers\FuncionarioController;

    //Creacion de Router
    $router = new Router();

    //Admin
    $router->get('/admin', [FuncionarioController::class, 'index']);

    //Mostrar todos los Registros de Entidades.
    $router->get('/admin/atrasos', [FuncionarioController::class, 'atrasos']);
    $router->get('/admin/estudiantes', [FuncionarioController::class, 'estudiantes']);
    $router->get('/admin/apoderados', [FuncionarioController::class, 'apoderados']);
    $router->get('/admin/funcionarios', [FuncionarioController::class, 'funcionarios']);

    //ModificarEntidades
    //Atrasos
    $router->get('/admin/atraso/crear', [AtrasoController::class, 'crear']);
    $router->post('/admin/atraso/crear', [AtrasoController::class, 'crear']);
    $router->get('/admin/atraso/actualizar', [AtrasoController::class, 'actualizar']);
    $router->post('/admin/atraso/actualizar', [AtrasoController::class, 'actualizar']);
    $router->post('/admin/atraso/eliminar', [AtrasoController::class, 'eliminar']);
    //Estudiantes
    $router->get('/admin/estudiante/crear', [EstudianteController::class, 'crear']);
    $router->post('/admin/estudiante/crear', [EstudianteController::class, 'crear']);
    $router->get('/admin/estudiante/actualizar', [EstudianteController::class, 'actualizar']);
    $router->post('/admin/estudiante/actualizar', [EstudianteController::class, 'actualizar']);
    $router->post('/admin/estudiante/eliminar', [EstudianteController::class, 'eliminar']);
    //Apoderados
    $router->get('/admin/apoderado/crear', [ApoderadoController::class, 'crear']);
    $router->post('/admin/apoderado/crear', [ApoderadoController::class, 'crear']);
    $router->get('/admin/apoderado/actualizar', [ApoderadoController::class, 'actualizar']);
    $router->post('/admin/apoderado/actualizar', [ApoderadoController::class, 'actualizar']);
    $router->post('/admin/apoderado/eliminar', [ApoderadoController::class, 'eliminar']);
    //Funcionarios
    $router->get('/admin/funcionario/crear', [FuncionarioController::class, 'crear']);
    $router->post('/admin/funcionario/crear', [FuncionarioController::class, 'crear']);
    $router->get('/admin/funcionario/actualizar', [FuncionarioController::class, 'actualizar']);
    $router->post('/admin/funcionario/actualizar', [FuncionarioController::class, 'actualizar']);
    $router->post('/admin/funcionario/eliminar', [FuncionarioController::class, 'eliminar']);

    //Login - Autenticacion
    $router->get('/', [LoginController::class, 'login'], true);
    $router->post('/', [LoginController::class, 'login'], true);
    $router->get('/logout', [LoginController::class, 'logout'], true);

    $router->validarURL();