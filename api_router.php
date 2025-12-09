<?php
require_once "libs/router.php";
require_once "controllers/apiBandaController.php";
require_once "controllers/apiConciertoController.php";


$router = new Router();

                        #endpoint       verbo              controller                     metodoController
$router->addRoute('bandas'           , 'GET', 'BandaController', 'getBandas');
$router->addRoute('banda/:id_banda', 'GET', 'BandaController', 'getBanda');
$router->addRoute('banda'           , 'POST','BandaController', 'crearBanda');
$router->addRoute('banda/:id_banda', 'PUT', 'BandaController', 'editarBanda');

$router->addRoute('conciertos'                  , 'GET','ConciertoController',  'getConciertos');
$router->addRoute('concierto/:id_concierto'        , 'GET','ConciertoController', 'getConcierto');
$router->addRoute('concierto'           , 'POST','ConciertoController', 'crearConcierto');
$router->addRoute('concierto/:id_concierto', 'PUT', 'ConciertoController', 'editarConcierto');



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


