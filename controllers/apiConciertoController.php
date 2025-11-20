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

    

}
