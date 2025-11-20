<?php
require_once "libs/router.php";
require_once "controllers/apiBandaController.php";
require_once "controllers/apiConciertoController.php";


$router = new Router();

                        #endpoint       verbo              controller                     metodoController
$router->addRoute('bandas'           , 'GET', 'BandaController', 'getBandas');
// $router->addRoute('Canchas/sortedByPrecio', 'GET', 'ApicanchaController', 'getCanchaSortedByPrecio');
$router->addRoute('banda/:id_banda', 'GET', 'BandaController', 'getBanda');
// $router->addRoute('Canchas'           , 'POST','ApicanchaController', 'createCancha');
// $router->addRoute('Canchas/:id_cancha', 'PUT', 'ApicanchaController', 'update');

$router->addRoute('conciertos'                  , 'GET','ConciertoController',  'getConciertos');
$router->addRoute('concierto/:id_concierto'        , 'GET','ConciertoController', 'getConcierto');
// $router->addRoute('Turnos/cancha/:id_cancha', 'GET','ApiTurnoController', 'getTurnoByCancha');
// $router->addRoute('Turnos'           , 'POST','ApiTurnoController', 'createTurno');


$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


