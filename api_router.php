<?php
require_once "libs/router.php";
require_once "controllers/apiBandaController.php";
require_once "controllers/apiConciertoController.php";


$router = new Router();

                        #endpoint       verbo              controller                     metodoController
$router->addRoute('bandas'           , 'GET', 'BandaController', 'getBandas');
$router->addRoute('bandas/:id_banda', 'GET', 'BandaController', 'getBanda');
$router->addRoute('bandas'           , 'POST','BandaController', 'crearBanda');
$router->addRoute('bandas/:id_banda', 'PUT', 'BandaController', 'editarBanda');

$router->addRoute('conciertos'                  , 'GET','ConciertoController',  'getConciertos');
$router->addRoute('conciertos/:id_concierto'        , 'GET','ConciertoController', 'getConcierto');
$router->addRoute('conciertos'           , 'POST','ConciertoController', 'crearConcierto');
$router->addRoute('conciertos/:id_concierto', 'PUT', 'ConciertoController', 'editarConcierto');



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


