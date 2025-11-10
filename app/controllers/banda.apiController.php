<!-- public function deleteTask($req, $res) {
        $idTask = $req->params->id;
        $task = $this->model->get($idTask);
    
        if (!$task) {
            return $res->json("La tarea con el id=$idTask no existe", 404);
        }

        $this->model->remove($idTask);

        return $res->json("La tarea con el id=$idTask se eliminó", 204);
    } -->
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
        if(isset($req)){
        // pido las tareas al modelo
        $bandas = $this->model->getBandas();
        }
        // respondo tareas con 200 OK
        return $res->json("listado de bandas", 200);
    }
}