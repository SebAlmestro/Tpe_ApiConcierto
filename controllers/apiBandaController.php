<?php
require_once "models/apiBandaModel.php";
require_once "view/json.view.php";

class BandaController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new BandaModel();
        $this->view = new JSONView();
    }

    public function getBandas($req, $res)
    {
        $bandas =  $this->model->getBandas();
        $this->view->response($bandas, 200);
    }

    public function getBanda($req, $res)
    {
        $id = $req->params->id_banda;
        $banda = $this->model->getBanda($id);
        if ($banda) {
            $this->view->response($banda, 200);
        } else {
            $this->view->response("La banda con el id= $id  no se encuentra", 404);
        }
    }

    
}
