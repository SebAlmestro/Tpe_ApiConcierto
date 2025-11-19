<?php

class BandaModel
{
    private $db;

    function __construct() {
     // 1. abro conexión con la DB
     $this->db = new PDO('mysql:host=localhost;dbname=conciertos;charset=utf8', 'root', '');
    }
    public function getBandas()
    {

        $query = $this->db->prepare('SELECT * FROM banda');
        $query->execute();


        $bandas = $query->fetchAll(PDO::FETCH_OBJ);

        return $bandas;
    }
    public function getBanda($id) {
        $query = $this->db->prepare('SELECT * FROM banda WHERE id = ?');
        $query->execute([$id]);
        $banda = $query->fetch(PDO::FETCH_OBJ);

        return $banda;
    }

    
}