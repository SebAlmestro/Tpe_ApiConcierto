<?php
require_once './libs/router/router.php';

require_once './libs/jwt/jwt.middleware.php';

require_once './app/controllers/user.apiController.php';
require_once './app/controllers/banda.apiController.php';
require_once './app/controllers/concierto.apiController.php';


// instancio el router
$router = new Router();

$router->addMiddleware(new JWTMiddleware());

// defino los endpoints
// $router->addRoute('auth/login',     'GET',     'AuthApiController',    'login');

$router->addRoute('bandas',         'GET',      'BandaController',    'getBandas');
// $router->addRoute('tareas/:id',     'GET',      'TaskApiController',    'getTask');

// $router->addMiddleware(new GuardMiddleware());

// $router->addRoute('tareas/:id',     'DELETE',   'TaskApiController',    'deleteTask');
// $router->addRoute('tareas',         'POST',     'TaskApiController',    'insertTask');
// $router->addRoute('tareas/:id',     'PUT',      'TaskApiController',    'updateTask');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
