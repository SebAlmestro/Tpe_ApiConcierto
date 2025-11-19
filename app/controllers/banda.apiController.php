<?php
require_once './app/models/banda.model.php';

class BandaController
{
    private $model;
    
    function __construct()
    {
        $this->model = new BandaModel();
    }

    function getBandas($req, $res)
    {
        // obtenemos todas las bandas
        $bandas = $this->model->getBandas();

        // si no hay bandas
        if (empty($bandas)) {
            $res->json(['message' => 'No hay bandas cargadas'], 204);
            exit;
        }

        // devolvemos el listado en formato JSON
        $res->json($bandas, 200);
        exit;
    }
    public function getBanda($req, $res) {
        // obtengo el ID que viene como parámetro del endpoint
        $idBanda = $req->params->id;

        $banda = $this->model->getBanda($idBanda);
        
        if (!$banda) {
            return $res->json("La banda con el id=$idBanda no existe", 404);
        }

        return $res->json($banda);
    }

}
    