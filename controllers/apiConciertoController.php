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

    //obtiene todos los conciertos
    public function getConciertos($req, $res)
    {
        $conciertos =  $this->model->getConciertos();
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
    //Json para copiar en body raw en postman y chequear
    // {
    //     "fecha": "2025-12-10",
    //     "horario": "21:00",
    //     "lugar": "Luna Park",
    //     "ciudad": "Buenos Aires",
    //     "id_banda": 1
    // }



}
