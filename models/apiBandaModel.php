<?php

class BandaModel
{
    private $PDO;

    public function __construct()
    {
        include_once 'config/conex.php';
        $conex = new db(); // Instacia de la clase DB
        $this->PDO = $conex->conexion(); // Metodo conexion.
    } // El constructor crea la conexion a la BD y la guarda en el PDO

    public function getBandas()
    {
        $query = $this->PDO->prepare("SELECT * FROM banda");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}
