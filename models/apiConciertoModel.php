<?php 
class ConciertoModel{
    private $PDO;

    public function __construct()
    {
        include_once 'config/conex.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getConciertos()
    {
        $query = $this->PDO->prepare("SELECT * FROM concierto");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getConcierto($id)
    {
        $query = $this->PDO->prepare("SELECT * FROM concierto WHERE id_concierto = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    

}