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
    
}
