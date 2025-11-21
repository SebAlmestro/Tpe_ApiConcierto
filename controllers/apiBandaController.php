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
    public function crearBanda($req, $res){
        
        
        $nombre = $req->body['nombre'];
        $pais = $req->body['pais'];
        $genero = $req->body['genero'];
        $imagen = $req->body['imagen'];
        

        if (empty($nombre) || empty($pais) || empty($genero) || empty($imagen)){
            $this->view->response("Faltan datos para crear la banda", 404);
        }else{
            $newBanda= $this->model->crearBanda($nombre, $pais, $genero, $imagen);
            if(!empty($newBanda)){
            $this->view->response("La Banda fue creada con exito", 201);
            }
        }
    }
    
    public function editarBanda($req, $res){
        $id = $req -> params->id_banda;
        
        $banda = $this->model->getBanda($id);
        if(!$banda){
            return $this->view->response("La banda con el id=$id no existe", 404);
        }

        if (empty($req->body['nombre']) || empty($req->body['pais'])  || empty($req->body['genero']) || empty($req->body['imagen'])){
            return $this->view->response('Faltan completar datos', 400);
        }

        $nombre = $req->body['nombre'];
        $pais = $req->body['pais'];
        $genero = $req->body['genero'];
        $imagen = $req->body['imagen'];

        $this->model-> editarBanda($id, $nombre, $pais, $genero, $imagen);
        
        $banda = $this->model->getBanda($id);

        $this->view->response($banda, 200);
    }
    
    
}
