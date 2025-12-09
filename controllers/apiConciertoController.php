<?php
require_once "models/apiConciertoModel.php";
require_once "view/json.view.php";

class ConciertoController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ConciertoModel();
        $this->view = new JSONView();
    }

    //obtiene todos los conciertos y puede traerlos ordenados asc o desc
    public function getConciertos($req, $res)
{
    // tomar query params
    $sort = $req->query->sort ?? null;      // ej: 'fecha'
    $order = $req->query->order ?? 'asc';   // si no envía order, queda ascendente

    if($sort !== null){   // si se solicita ordenar
        $conciertos = $this->model->getConciertosSorted($sort, $order);
    } else {              // sin parámetros lista normal
        $conciertos = $this->model->getConciertos();
    }

    $this->view->response($conciertos, 200);
}
    //obtiene concierto por id
    public function getConcierto($req, $res)
    {
        $id = $req->params->id_concierto;
        $concierto = $this->model->getConcierto($id);
        if ($concierto) {
            $this->view->response($concierto, 200);
        } else {
            $this->view->response("El concierto con el id= $id  no se encuentra", 404);
        }
    }
    //crear un concierto
    public function crearConcierto($req, $res)
    {
        $fecha = $req->body['fecha'];
        $horario = $req->body['horario'];
        $lugar = $req->body['lugar'];
        $ciudad = $req->body['ciudad'];
        $id_banda = $req->body['id_banda'];

        if (empty($fecha) || empty($horario) || empty($lugar) || empty($ciudad) || empty($id_banda)) {
            $this->view->response("Faltan datos para crear el concierto", 404);
        } else {
            $newConcierto = $this->model->crearConcierto($fecha, $horario, $lugar, $ciudad, $id_banda);
            if (!empty($newConcierto)) {
                $this->view->response("El concierto fue creado con exito", 201);
            } else {
                $this->view->response("El concierto no se pudo crear", 404);
            }
        }
    }
    //editar un concierto
    public function editarConcierto($req, $res)
    {
        $id = $req->params->id_concierto;

        $concierto = $this->model->getConcierto($id);
        if (!$concierto) {
            return $this->view->response("El concierto con el id=$id no existe", 404);
        }

        if (empty($req->body['fecha']) || empty($req->body['horario'])  || empty($req->body['lugar']) || empty($req->body['ciudad']) 
        || empty($req->body['id_banda'])) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $fecha = $req->body['fecha'];
        $horario = $req->body['horario'];
        $lugar = $req->body['lugar'];
        $ciudad = $req->body['ciudad'];
        $id_banda = $req->body['id_banda'];

        $this->model->editarConcierto($id, $fecha, $horario, $lugar, $ciudad, $id_banda);

        $concierto = $this->model->getConcierto($id);

        $this->view->response($concierto, 200);
    }
}
